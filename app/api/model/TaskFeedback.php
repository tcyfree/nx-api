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
// | DateTime: 2017/9/18/11:54
// +----------------------------------------------------------------------

namespace app\api\model;


use app\api\model\Task as TaskModel;
use app\lib\exception\ParameterException;
use app\api\service\Task as TaskService;
use app\api\model\Callback as CallbackModel;
use think\Db;
use think\Exception;
use app\api\model\TaskUser as TaskUserModel;

class TaskFeedback extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function task()
    {
        return $this->hasOne('Task','id','task_id');
    }

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','to_user_id');
    }

    /**
     * 提交反馈条件判断
     * 1 检查该任务是否GO
     * 2 自己不能给自己反馈
     * 3 普通模式不能参加反馈
     *
     * @param $dataRules
     * @param $uid
     * @throws ParameterException
     */
    public static function checkTaskFeedbackParams($dataRules,$uid)
    {
        TaskUserModel::checkExistGO($dataRules['task_id'],$uid);

//        if ($uid == $dataRules['to_user_id']){
//            throw new ParameterException([
//                'msg' => '自己不能给自己反馈哦'
//            ]);
//        }
        $mode = TaskModel::getTaskMode($dataRules['task_id'],$uid);
        if ($mode == 0){
            throw new ParameterException([
                'msg' => '此任务为普通模式参加，不能反馈啦'
            ]);
        }
    }

    /**
     * @param $user_id
     * @param $task_id
     * @return bool|null|static
     */
    public static function checkTaskFeedback($user_id, $task_id){
        TaskModel::checkTaskExists($task_id);
        $res = self::get(['user_id' => $user_id, 'task_id' => $task_id, 'status' => [['eq',0],['eq',1],'or']]);
        if (!$res){
           return false;
        }else{
            return $res;
        }
    }

    public static function checkTaskFeedbackStatus($id){
        $res = self::with('task')
            ->where(['id' => $id])
            ->find();
        if (!$res){
            throw new ParameterException();
        }elseif ($res['status'] == 2 || $res['status'] == 3){
            throw new ParameterException([
                'msg' => '该反馈已审核通过或失效'
            ]);
        }

        return $res;
    }

    /**
     * 反馈24小时后回调
     * 1 随机选取审核人
     * 1.1 如果和之前审核人相同则更新status = 0，同时延长deadline + 86400
     * 1.2 否则(
     *    1 注销回调
     *    2 更新以前审核记录status = 3
     *    3 生成新的反馈记录
     *    4 生成新的回调记录
     *   )
     * @param $v
     * @param $log
     * @throws Exception
     */
    public static function withinTwentyFourHours($v,$log)
    {
        $res = self::get(['id' => $v['key_id']]);
        if (!$res){
            return;
        }
        Db::startTrans();
        try{
            $task_service = new TaskService();
            $to_user_id = $task_service->getRandManagerID($res['task_id']);
            if ($res['to_user_id'] == $to_user_id){
                self::update(['status' => 0,'update_time' => time()],['id' => $res['id']]);
                $deadline = $v['deadline'] + config('setting.feedback_expire_in');
                CallbackModel::update(['deadline' => $deadline],['id' => $v['id']]);
            }else{
                CallbackModel::cancelCallback($v['id']);
                self::update(['status' => 3],['id' => $res['id']]);
                $data['user_id'] = $res['user_id'];
                $data['to_user_id'] = $to_user_id;
                $data['task_id'] = $res['task_id'];
                $data['content'] = $res['content'];
                if (isset($res['location'])){
                    $data['location'] = $res['location'];
                }

                $id = uuid();
                $data['id'] = $id;
                $result = self::create($data);
                $deadline = $result['create_time'] + config('setting.feedback_expire_in');
                CallbackModel::create(['key_id' => $id, 'user_id' => $res['user_id'], 'deadline' => $deadline, 'key_type' => 1]);
            }
            Db::commit();
            file_put_contents($log, ''.self::getLastSql().' && '.CallbackModel::getLastSql().' '.
                date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
        }catch (Exception $ex) {
            Db::rollback();
            throw $ex;
        }
    }


}