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

use app\api\model\ActPlanUser as ActPlanUserModel;
use app\lib\exception\ParameterException;
use app\api\model\ActPlan as ActPlanModel;
use app\api\service\Community as CommunityService;
use app\api\model\Task as TaskModel;

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
     * @throws ParameterException
     */
    public function checkAccelerateTaskMode($data){
        $task = TaskModel::get(['id' => $data['task_id']]);
        if (!$task){
            throw new ParameterException([
                'msg' => '任务不存在！'
            ]);
        }
        if ($task['finish'] == 1){
            throw new ParameterException([
                'msg' => '该任务已经结束啦'
            ]);
        }
        $where['user_id'] = $data['user_id'];
        $where['act_plan_id'] = $task['act_plan_id'];
        $act_plan_user = ActPlanUserModel::where($where)->field('mode')->find();
        if (!$act_plan_user){
            throw new ParameterException();
        }
        if ($act_plan_user['mode'] == 1){
            throw new ParameterException([
                'msg' => '挑战者模式不能被加速！'
            ]);
        }
    }
}