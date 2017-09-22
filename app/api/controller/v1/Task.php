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
use app\api\model\ActPlanUser;
use app\api\validate\AccelerateTask;
use app\api\validate\Feedback;
use app\api\validate\FeedbackFailReason;
use app\api\validate\FeedbackPassOrFail;
use app\api\validate\GetFeedback;
use app\api\validate\TaskList;
use app\api\validate\TaskNew;
use app\api\service\Token as TokenService;
use app\api\model\Task as TaskModel;
use app\api\model\TaskRecord as TaskRecordModel;
use app\api\validate\TaskUpdate;
use app\api\validate\UUID;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;
use app\api\model\ActPlan as ActPlanModel;
use app\api\service\Community as CommunityService;
use think\Exception;
use think\Db;
use app\api\service\Task as TaskService;
use app\api\model\TaskAccelerate as TaskAccelerateModel;
use app\api\model\TaskFeedback as TaskFeedbackModel;

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
           throw new ParameterException();
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
        $pagingArray = $pagingData->visible(['id','name'])
            ->toArray();
        $task_obj = new TaskService();
        $data['task'] = $task_obj->checkTaskFinish($pagingArray,$uid);
        $res = ActPlanUser::get(['act_plan_id' => $id, 'user_id' => $uid]);
        $data['flag'] = '0';
        if ($res){
            $data['flag'] = '1';
        }
        $res_data = ActPlanModel::checkActPlanExists($id);
        $data['mode'] = $res_data['mode'];
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 任务详情
     * @param $id
     * @return $this
     */
    public function getTaskDetail($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        TaskModel::checkTaskExists($id);
        TaskService::checkTaskByUser($uid,$id);
        $data = TaskModel::with('taskUser')->where(['id' => $id])->find();
        $return_data = $data->visible(['id','name','requirement','content','reference_time','task_user.user_id','task_user.finish','task_user.create_time'])->toArray();
        $feedback = TaskFeedbackModel::where(['user_id' => $uid, 'task_id' => $id])->field('status')->find();
        if ($feedback){
            $return_data['feedback'] = $feedback['status'];
        }else{
            $return_data['feedback'] = null;
        }

        return $return_data;
    }

    /**
     * GO任务
     * @return \think\response\Json
     */
    public function goTask(){
        (new UUID())->goCheck();
        $task_id = input('post.id');
        $uid = TokenService::getCurrentUid();
        TaskModel::goTask($uid, $task_id);

        return json(new SuccessMessage(),201);
    }

    /**
     * 普通任务加速
     * 1. 自己不能给自己加速
     * @throws ParameterException
     */
    public function accelerateTask(){
        (new AccelerateTask())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        if ($uid == $data['user_id']){
            throw new ParameterException([
                'msg' => '小样儿，自己不能给自己加速哦'
            ]);
        }
        TaskAccelerateModel::accelerateTask($uid,$data);

        return json(new SuccessMessage(),201);
    }

    /**
     * 正常结束普通任务回调接口
     */
    public function overTask()
    {

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
     * 任务反馈
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function feedback()
    {
        $validate = new Feedback();
        $validate->goCheck();
        $dataRules = $validate->getDataByRules(input('post.'),'status');
        $uid = TokenService::getCurrentUid();
        $dataRules['user_id'] = $uid;
        if ($dataRules)
        if ($uid == $dataRules['to_user_id']){
            throw new ParameterException([
                'msg' => '自己不能给自己反馈哦'
            ]);
        }
        $mode = TaskModel::getTaskMode($dataRules['task_id'],$uid);
        if ($mode == 0){
            throw new ParameterException([
                'msg' => '此任务为普通模式参加，不能反馈'
            ]);
        }
        $res = TaskFeedbackModel::checkTaskFeedback($uid, $dataRules['task_id']);

        if ($res == false){
            $dataRules['id'] = uuid();
            TaskFeedbackModel::create($dataRules);
            return json(new SuccessMessage(),201);
        }elseif ($res['status'] == 1){
            TaskFeedbackModel::update(['content' => $dataRules['content'],'location' => $dataRules['location'],'status' => 0, 'update_time' => time()],
                ['user_id' => $uid,'task_id' => $dataRules['task_id']]);
            return json(new SuccessMessage(),201);
        }else{
            throw new ParameterException([
                'msg' => '任务待审核或审核通过了'
            ]);
        }

    }

    /**
     * 其他用户给我的反馈
     * @param int $page
     * @param int $size
     * @return array
     */
    public function feedbackByOthers($page = 1, $size = 15)
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $where['status'] = '0';
        $pageData = TaskFeedbackModel::with('task,userInfo,task.actPlan,task.actPlan.community')
            ->where($where)
            ->paginate($size,true,['page' => $page]);

        $data = $pageData->visible(['id','content','status','create_time','task.name','task.requirement','user_info.nickname','user_info.avatar','task.act_plan'])->toArray();
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

        return $res->visible(['id','content']);

    }

    /**
     * 审核任务通过或不通过
     * @return \think\response\Json
     * @throws Exception
     */
    public function feedbackPassOrFail()
    {
        (new FeedbackPassOrFail())->goCheck();
        $data = input('put.');
        $uid = TokenService::getCurrentUid();
        $res = TaskFeedbackModel::get(['to_user_id' => $uid,'id' => $data['id']]);
        if (!$res){
            throw new ParameterException();
        }
        Db::startTrans();
        try{
            TaskFeedbackModel::checkTaskFeedbackStatus($data['id']);
            if ($data['pass']){
                TaskFeedbackModel::update(['status' => 2,'update_time' => time()],['id' => $data['id'],'to_user_id' => $uid]);
            }else{
                (new FeedbackFailReason())->goCheck();
                TaskFeedbackModel::update(['reason' => $data['reason'],'status' => 1,'update_time' => time()],['id' => $data['id'],'to_user_id' => $uid]);
            }
            Db::commit();
            return json(new SuccessMessage(),201);
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }

    }
}