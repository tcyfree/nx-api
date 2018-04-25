<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: probe <1946644259@qq.com>
// +----------------------------------------------------------------------
// | DateTime: 2017/10/26/10:42
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\TaskFeedback as TaskFeedbackModel;
use app\api\model\Callback as CallbackModel;
use app\api\model\TaskUser;
use app\lib\exception\SuccessMessage;
use think\Db;
use think\Exception;
use app\lib\exception\ParameterException;
use app\api\service\Task as TaskService;
use app\api\model\UserProperty as UserPropertyModel;
use app\api\model\Task as TaskModel;
use app\api\model\TaskUser as TaskUserModel;
use app\api\service\Execution as ExecutionService;
use app\api\model\Communication as CommunicationModel;

class TaskFeedback
{
    /**
     * 提交反馈
     * 1 未给当前反馈人提交过反馈
     * 2 未通过点评提交反馈
     * 3 设置反馈有效时间为24小时内有效
     * 4 坑：需要将TP自带时间戳转换功能再转换成时间戳格式
     * 5.再次反馈更新点评者to_look = 0
     *
     * @param $dataRules
     * @param $uid
     * @return \think\response\Json
     * @throws Exception
     * @throws ParameterException
     */
    public function referTaskFeedback($dataRules,$uid)
    {
        $res = TaskFeedbackModel::checkTaskFeedback($uid, $dataRules['task_id']);
        if ($res == false){
            $id = uuid();
            $dataRules['id'] = $id;
            if (!isset($dataRules['to_user_id']) || empty($dataRules['to_user_id'])){
                $dataRules['to_user_id'] = $this->getToUserId($dataRules);
            }
            TaskFeedbackModel::checkTaskFeedbackParams($dataRules,$dataRules['user_id']);
            Db::startTrans();
            try{
                $result = TaskFeedbackModel::create($dataRules);
                $deadline = (int)strtotime($result['create_time']) + 86400;
                CallbackModel::create(['key_id' => $id, 'user_id' => $uid, 'deadline' => $deadline, 'key_type' => 1]);
                Db::commit();
            }catch (Exception $ex){
                Db::rollback();
                throw $ex;
            }
            return true;
        }elseif ($res['status'] == 1){
            if (isset($dataRules['location'])){
                TaskFeedbackModel::update(['content' => $dataRules['content'],'location' => $dataRules['location'],'status' => 0,
                    'update_time' => time(),'to_look' => 0],
                    ['user_id' => $uid,'task_id' => $dataRules['task_id']]);
            }else{
                TaskFeedbackModel::update(['content' => $dataRules['content'],'status' => 0, 'update_time' => time(), 'to_look' => 0],
                    ['user_id' => $uid,'task_id' => $dataRules['task_id']]);
            }
            return true;
        }else{
            throw new ParameterException([
                'msg' => '任务待点评或点评通过了'
            ]);
        }
    }

    /**
     * 当用户未选择被反馈者则获取被反馈者user_id
     *
     * @param $dataRules
     * @return mixed|string
     */
    private function getToUserId($dataRules)
    {
        unset($dataRules['to_user_id']);
        $feedback_user_id = '';
        $task_service = new TaskService();
        $res = false;
        while (!$res){
            $feedback_user_id = $task_service->getRandManagerID($dataRules['task_id']);
            $log = LOG_PATH.'feedback.log';
            file_put_contents($log, $feedback_user_id.' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
            $res = $task_service->checkFeedbackAuthority($feedback_user_id,$dataRules['task_id']);
        }
        return $feedback_user_id;
    }

    /**
     * 自动点评：自动完成反馈
     * 1.将任务更新为完成
     * 2.增加用户行动力
     * 3.判断是否完成该计划
     * 4.同步反馈内容到对应交流区
     * 5.反馈表
     * 6.判断用户是否已经提交反馈了
     *
     * @param $user_id
     * @param $data
     * @throws Exception
     */
    public function autoFeedback($user_id,$data)
    {
        TaskModel::checkTaskExists($data['task_id']);
        $res = TaskFeedbackModel::get(['user_id' => $user_id,'task_id' => $data['task_id']]);
        if ($res){
            throw new ParameterException([
                'msg' => '该任务已经提交反馈了'
            ]);
        }
        Db::startTrans();
        try{
            TaskUserModel::update(['finish' => 1,'update_time' => time()],['task_id' => $data['task_id'],'user_id' => $user_id]);
            UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',2);
            (new ExecutionService())->checkActPlanUserFinish($data['task_id'],$user_id);
            $data['user_id'] = $user_id;
            $this->createCommunication($data);
            $this->feedback($data,$user_id);
            Db::commit();
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
    }

    /**
     * 其他人自动点评：自动完成反馈
     * 1.将任务更新为完成
     * 2.增加用户行动力
     * 3.判断是否完成该计划
     * 4.同步反馈内容到对应交流区
     * 5.反馈表
     * 6.判断用户是否已经提交反馈了
     *
     * @param $other_user_id
     * @param $data
     * @throws Exception
     */
    public function autoFeedbackByOther($other_user_id,$data)
    {
        $user_id = $data['feedback_user_id'];
        $res = TaskFeedbackModel::get(['user_id' => $user_id,'task_id' => $data['task_id']]);
        if ($res){
            throw new ParameterException([
                'msg' => '该任务已经提交反馈了'
            ]);
        }
        $this->checkUserStatus($user_id,$data['task_id']);
        Db::startTrans();
        try{
            TaskUserModel::update(['finish' => 1,'update_time' => time()],['task_id' => $data['task_id'],'user_id' => $user_id]);
            UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',2);
            (new ExecutionService())->checkActPlanUserFinish($data['task_id'],$user_id);
            $data['user_id'] = $user_id;
            $this->createCommunication($data);
            $this->feedback($data,$other_user_id);
            Db::commit();
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
    }

    /**
     * 查看用户是否符合条件提交任务
     * @param $uid
     * @param $task_id
     * @throws ParameterException
     */
    public function checkUserStatus($uid,$task_id)
    {
        $task_user = TaskUserModel::get(['user_id' => $uid, 'task_id' => $task_id]);
        if (empty($task_user)){
            throw new ParameterException([
                'msg' => '被点评用户还未GO'
            ]);
        }
    }

    private function createCommunication($data)
    {
        $id = uuid();
        $data['id'] = $id;
        $data['community_id'] = TaskModel::getCommunityIDByTaskID($data['task_id']);
        $data['type'] = 1;
        $c_obj = new CommunicationModel();
        // 过滤数组中的非数据表字段数据
        $c_obj->allowField(true)->save($data);
    }

    private function feedback($data,$user_id)
    {
        $id = uuid();
        $data['id'] = $id;
        $data['status'] = 4;
        $data['to_user_id'] = $user_id;
        $t_f = new TaskFeedbackModel();
        $t_f->allowField(true)->save($data);
    }


}