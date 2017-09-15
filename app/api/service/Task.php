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
// | DateTime: 2017/9/8/18:27
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\Task as TaskModel;
use app\api\model\TaskUser as TaskUserModel;
use app\api\service\Community as CommunityService;
use app\lib\exception\AcceleateTaskException;
use app\lib\exception\ParameterException;

class Task
{

    /**
     * 判断该任务是否为此用户的
     * @param $uid
     * @param $id
     * @throws ParameterException
     */
    public static function checkTaskByUser($uid,$id)
    {
        $act_plan_user = new ActPlanUserModel();
        $res = $act_plan_user->where('act_plan_id','eq',function ($query) use ($id){
            $query->table('xds_task')->where('id',$id)->field('act_plan_id');
        })
            ->where('user_id',$uid)
            ->find();
        if(!$res){
            throw new ParameterException([
                'msg' =>'该任务不是你的！！！！'
            ]);
        }
    }

    /**
     * 判断是否有操作任务权限
     * @param $uid
     * @param $act_plan_id
     * @throws ParameterException
     */
    public function checkAuthority($uid,$act_plan_id)
    {
        $ap_obj = ActPlanModel::get(['id' => $act_plan_id]);
        if (!$ap_obj){
            throw new ParameterException();
        }else{
            $auth_array[0] = 2;
            $c_obj = new CommunityService();
            $c_obj->checkManagerAuthority($uid,$ap_obj->community_id,$auth_array);
        }
    }

    /**
     * 检查加速任务
     * @param $data
     * @throws AcceleateTaskException
     * @throws ParameterException
     */
    public function checkAccelerateTask($data){

        $task = TaskModel::get($data['task_id']);
        if (!$task){
            throw new ParameterException([
                'msg' => '该任务不存在，请检查ID'
            ]);
        }
        TaskUserModel::checkTaskUserFinish($data['user_id'],$data['task_id']);

        $where['user_id'] = $data['user_id'];
        $where['act_plan_id'] = $task['act_plan_id'];
        $act_plan_user = ActPlanUserModel::where($where)->field('mode')->find();
        if (!$act_plan_user){
            throw new ParameterException([
                'msg' => '该用户还未参加加速行动计划'
            ]);
        }
        if ($act_plan_user['mode'] == 1){
            throw new ParameterException([
                'msg' => '挑战者模式不能被加速！'
            ]);
        }
    }

    /**
     * 判断用户是否完成该任务
     * @param $data
     * @param $uid
     * @return mixed
     */
    public function checkTaskFinish($data, $uid){
        $res = TaskUserModel::where(['user_id' => $uid])->field('task_id')->select()->toArray();
        $patternArray = [];
        foreach ($res as $v) {
            $patternArray[] = $v['task_id'];
        }
        foreach ($data as &$v) {
            $v['finish'] = 0;
            if (in_array($v['id'],$patternArray)){
                $v['finish'] = 1;
            }
        }
        return $data;
    }
}