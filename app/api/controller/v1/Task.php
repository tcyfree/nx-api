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
// | DateTime: 2017/8/29/13:34
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanUser;
use app\api\model\Task as TaskModel;
use app\api\model\TaskAccelerate as TaskAccelerateModel;
use app\api\model\TaskFeedback as TaskFeedbackModel;
use app\api\model\TaskRecord as TaskRecordModel;
use app\api\model\TaskUser;
use app\api\service\Community as CommunityService;
use app\api\service\Task as TaskService;
use app\api\service\Token as TokenService;
use app\api\validate\AccelerateTask;
use app\api\validate\Feedback;
use app\api\validate\FeedbackFailReason;
use app\api\validate\FeedbackPassOrFail;
use app\api\validate\GetFeedback;
use app\api\validate\TaskList;
use app\api\validate\TaskNew;
use app\api\validate\TaskUpdate;
use app\api\validate\UUID;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;
use think\Db;
use think\Exception;
use app\api\service\Execution as ExecutionService;
use app\api\service\Execution as Es;
use app\api\model\Callback as CallbackModel;
use app\api\model\TaskUser as TaskUserModel;
use app\api\service\TaskFeedback as TaskFeedbackService;
use app\api\model\TaskFeedbackUsers;

class Task extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'feedbackDetail']
    ];
    /**
     * 创建任务
     * 1.鉴权
     * @return \think\response\Json
     * @throws Exception
     */
    public function createTask()
    {
        (new TaskNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data['user_id'] = $uid;
        $id = uuid();

        $dataArray = input('post.');
        ActPlanModel::checkActPlanExists($dataArray['act_plan_id']);
        $dataArray['id'] = $id;

        $ts = new TaskService();
        $ts->checkAuthority($uid,$dataArray['act_plan_id']);

        Db::startTrans();
        try {
            TaskModel::create($dataArray);
            //更新任务数
            $where['id'] = $dataArray['act_plan_id'];
            ActPlanModel::where($where)->setInc('task_num');

            $data['task_id'] = $id;
            $data['type'] = 0;
            TaskRecordModel::create($data);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 编辑任务
     * 1.鉴权
     */
    public function updateTask()
    {
        $validate = new TaskUpdate();
        $validate->goCheck();
        $uid = TokenService::getCurrentUid();
        $data['user_id'] = $uid;

        $dataArray = $validate->getDataByRule(input('put.'));
        $t_obj = TaskModel::get(['id' => $dataArray['id']]);
        if (!$t_obj){
           throw new ParameterException([
               'msg' => '任务不存在，ID错误！'
           ]);
        }else{
            $ts = new TaskService();
            $ts->checkAuthority($uid,$t_obj->act_plan_id);
        }

        TaskModel::update($dataArray,['id' => $dataArray['id']]);
        $data['task_id'] = $dataArray['id'];
        $data['type'] = 1;
        TaskRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 任务列表
     * 1.返回草稿
     *
     * @param $id
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getSummaryList($id,$page = 1, $size = 15)
    {
        (new TaskList())->goCheck();

        $uid = TokenService::getCurrentUid();
        CommunityService::checkJoinCommunityByUser($uid,$id);
        $pagingData = TaskModel::getSummaryList($id, $page, $size);
        $pagingArray = $pagingData->visible(['id','name','requirement','content','reference_time', 'release'])
            ->toArray();
        $task_obj = new TaskService();
        $data['task'] = $task_obj->checkTaskFinish($pagingArray,$uid);
        $res = ActPlanUser::get(['act_plan_id' => $id, 'user_id' => $uid]);
        $data['user_join_mode'] = null;
        if ($res){
            $data['user_join_mode'] = $res['mode'];
        }
        $res_data = ActPlanModel::checkActPlanExists($id);
        $data['mode'] = $res_data['mode'];
        $data['fee']  = $res_data['fee'];
         return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 任务详情
     * @param $id
     * @return mixed
     */
    public function getTaskDetail($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        TaskModel::checkTaskExists($id);
        TaskService::checkTaskByUser($uid,$id);
        $return_data['task'] = TaskModel::get(['id' => $id]);
        $return_data['task_user'] = TaskUserModel::get(['task_id' => $id,'user_id' => $uid]);
        $return_data['task_feedback'] = TaskFeedbackModel::with('toUserInfo')
            ->where(['task_id' => $id,'user_id' => $uid,'status' => ['in','0,1,2']])
            ->order('create_time ASC')
            ->select();
//        $return_data['task_feedback'] = TaskFeedbackModel::all(['task_id' => $id,'user_id' => $uid,'status' => [['eq',0],['eq',1],['eq',2],'or']]);
//        $data = TaskUserModel::with('taskUser,feedback')->where(['task_id' => $id,'user_id' => $uid])->find();
//        $return_data = $data->visible(['id','name','requirement','content','reference_time','task_user.user_id',
//                                        'task_user.finish','task_user.create_time',
//                                        'feedback.content','feedback.create_time','feedback.status','feedback.reason'])->toArray();

        return $return_data;
    }

    /**
     * GO任务
     * 1 添加定时任务
     *
     * @return array
     * @throws Exception
     */
    public function goTask(){
        (new UUID())->goCheck();
        $task_id = input('post.id');
        $uid = TokenService::getCurrentUid();

        $res = TaskModel::goTask($uid, $task_id);

        $res = $res->toArray();
        return [
            'task_user' => $res
        ];
    }

    /**
     * 普通任务加速
     * 1. 自己不能给自己加速
     * @throws ParameterException
     */
    public function accelerateTask(){
        (new AccelerateTask())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        $log = LOG_PATH.'task_accelerate.log';
        file_put_contents($log,$uid."\r\n".$data['user_id']."\r\n".date('Y-m-d H:i:s')."\r\n",FILE_APPEND);
        if ($uid == $data['user_id']){
            throw new ParameterException([
                'msg' => '小样儿，自己不能给自己加速哦'
            ]);
        }
        TaskAccelerateModel::accelerateTask($uid,$data);

        return json(new SuccessMessage(),201);
    }

    /**
     * 获取挑战模式下的状态
     * @return array
     * @throws ParameterException
     */
    public function getFeedbackStatus(){
        (new UUID())->goCheck();
        $task_id = input('get.id');
        $uid = TokenService::getCurrentUid();
        $mode = TaskModel::getTaskMode($task_id,$uid);
        if ($mode == 0){
            throw new ParameterException([
                'msg' => '此任务为普通模式参加'
            ]);
        }
        $res = TaskFeedbackModel::get(['user_id' => $uid, 'task_id' => $task_id]);
        if (!$res){
            return ['status' => null];
        }else{
            return ['status' => $res['status']];
        }

    }

    /**
     * 用户提交任务反馈
     *
     * 1 如果to_user_id为空，则随机选择一个备选人审核
     * 2 设置反馈有效时间为24小时内有效
     * 3 在随机选管理员时，判断是否有审核权限
     *
     * @return \think\response\Json
     * @throws Exception
     * @throws ParameterException
     */
    public function feedback()
    {
        $validate = new Feedback();
        $validate->goCheck();
        $dataRules = input('post.');
        $log = LOG_PATH.'feedback_user_id.log';
        file_put_contents($log,json_encode($dataRules).date('Y-m-d H:i:s')."\r\n",FILE_APPEND);
        $uid = TokenService::getCurrentUid();
        if (isset($dataRules['status'])){
            unset($dataRules['status']);
        }
        if (!isset($dataRules['to_user_id']) || empty($dataRules['to_user_id'])){
            unset($dataRules['to_user_id']);
            $task_service = new TaskService();
            $res = false;
            $feedback_user_id = '';
            while (!$res){
                $feedback_user_id = $task_service->getRandManagerID($dataRules['task_id']);
                $log = LOG_PATH.'feedback.log';
                file_put_contents($log, $feedback_user_id.' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
                $res = $task_service->checkFeedbackAuthority($feedback_user_id,$dataRules['task_id']);
            }
            $dataRules['to_user_id'] = $feedback_user_id;
        }
        $dataRules['user_id'] = $uid;
        $feedback_service = new TaskFeedbackService();
        TaskFeedbackModel::checkTaskFeedbackParams($dataRules,$uid);
        $feedback_service->referTaskFeedback($dataRules,$uid);

        return json(new SuccessMessage(),201);

    }

    /**
     * 其他用户给我的反馈
     * 1 待反馈或反馈失效
     * 2 更新to_look = 1
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function feedbackByOthers($page = 1, $size = 15)
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $pageData = TaskFeedbackModel::with('task,userInfo,task.actPlan,task.actPlan.community')
            ->where($where)
            ->where(function($query){
                $query->where('status',['=',0],['=',1],'or');
            })
            ->paginate($size,true,['page' => $page]);

        $data = $pageData->visible(['id','content','status','to_look','create_time','task.id','task.name','task.requirement','user_info.nickname','user_info.avatar','task.act_plan'])->toArray();
        TaskFeedbackModel::update(['to_look' => 1,'update_time' => time()],['to_user_id' => $uid]);
        return[
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }

    /**
     * 反馈详情
     * @return null|static
     * @throws ParameterException
     */
    public function feedbackDetail()
    {
        (new UUID())->goCheck();
        $id = input('get.id');
        $res = TaskFeedbackModel::checkTaskFeedbackStatus($id);

        return $res;

    }

    /**
     * 审核任务通过或不通过
     * 1 注销24小时回调
     * 2 处理待审核或未通过审核反馈
     *
     * @return \think\response\Json
     * @throws Exception
     */
    public function feedbackPassOrFail()
    {
        (new FeedbackPassOrFail())->goCheck();
        $data = input('put.');
        $uid = TokenService::getCurrentUid();
        $res = TaskFeedbackModel::get(['to_user_id' => $uid,'id' => $data['id'],'status' => ['in',[0,1]]]);
        if (!$res){
            throw new ParameterException();
        }
        Db::startTrans();
        try{
            TaskFeedbackModel::checkTaskFeedbackStatus($data['id']);
            if ($data['pass']){
                TaskFeedbackModel::update(['status' => 2,'update_time' => time()],['id' => $data['id'],'to_user_id' => $uid]);
                $execution = new ExecutionService();
                $execution->addExecution($res['task_id'],$res['user_id'],1);
            }else{
                (new FeedbackFailReason())->goCheck();
                TaskFeedbackModel::update(['reason' => $data['reason'],'status' => 1,'update_time' => time()],['id' => $data['id'],'to_user_id' => $uid]);
            }
            CallbackModel::update(['status' => 1,'update_time' => time()],['key_id' => $data['id']]);
            Db::commit();
            return json(new SuccessMessage(),201);
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }

    }

    /**
     * 是否有新私信
     *
     * @return array
     */
    public function getNotLook()
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $where['status'] = ['in','0,1'];
        $where['to_look'] = 0;
        $res = TaskFeedbackModel::where($where)
            ->field('to_look')
            ->find();
        if (!$res){
            return [
                'look' => false
            ];
        }else{
            return [
                'look' => true
            ];
        }
    }

    public function test()
    {
//        $t = new Es();
//        $t->checkActPlanUserFinish('8b47815b-0f9c-0811-3a6a-accc9e4acdbd','b9d25df4-8e9e-f917-f559-4872db0b9ea6');
//        $dataRules = input('post.');
//        $dataRules['id'] = uuid();
//        $dataRules['user_id'] = '0a9064ba-711f-5049-9300-c0cc88e1edf7';
//        print_r($dataRules);
//        $result = TaskFeedbackModel::create($dataRules);
//        $uid = TokenService::getCurrentUid();
//        $id = uuid();
//        $dataRules['id'] = $id;
//        Db::startTrans();
//        try{
//            $result = TaskFeedbackModel::create($dataRules);
//            $deadline = $result['create_time'] + 86400;
//            CallbackModel::create(['key_id' => $id, 'user_id' => $uid, 'deadline' => $deadline, 'key_type' => 1]);
//            Db::commit();
//        }catch (Exception $ex){
//            Db::rollback();
//            throw $ex;
//        }
        $where['community_id'] = '3f18ccf9-11bd-7484-549e-6b0396329e61';


        $data = TaskFeedbackUsers::where($where)
            ->field('user_id,tag')
            ->order('tag ASC')
            ->select()
            ->toArray();
        var_dump($data);
        $sqlStr = "SELECT * FROM qxd_task_feedback_users WHERE tag = 
                  (SELECT min(tag) FROM qxd_task_feedback_users  WHERE 
                  community_id = '3f18ccf9-11bd-7484-549e-6b0396329e61')";
        $data = Db::query($sqlStr);
        var_dump($data);

    }

}