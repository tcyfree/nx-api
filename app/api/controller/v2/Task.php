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
// | DateTime: 2017/12/28/14:28
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\validate\UUID;
use app\api\service\Token as TokenService;
use app\api\model\Task as TaskModel;
use app\api\service\Task as TaskService;
use app\api\model\TaskUser as TaskUserModel;
use app\api\model\TaskFeedback as TaskFeedbackModel;

class Task extends BaseController
{
    /**
     * 任务详情
     * 1.自动点评
     * 2.增加用户信息
     *
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
        $return_data['task_user'] = TaskUserModel::with('userProperty')
            ->where(['task_id' => $id,'user_id' => $uid])
            ->find();
        $return_data['task_feedback'] = TaskFeedbackModel::with('toUserInfo')
            ->where(['task_id' => $id,'user_id' => $uid,'status' => ['in','0,1,2,4']])
            ->order('create_time ASC')
            ->select();

        return $return_data;
    }
}