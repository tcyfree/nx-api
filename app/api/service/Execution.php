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
// | DateTime: 2017/10/17/14:34
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\Task as TaskModel;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\UserProperty as UserPropertyModel;

class Execution
{
    /**
     * 根据参加行动计划的模式不同增加不同的行动力值
     *
     * @param $task_id
     * @param $user_id
     */
    public function addExecution($task_id, $user_id)
    {
        $task = TaskModel::where('id', $task_id)->field('act_plan_id')->find();
        $act_plan_user_mode = ActPlanUserModel::where('act_plan_id',$task['act_plan_id'])->field('mode')->find();
        if ($act_plan_user_mode['mode'] == 1){
            UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',2);
        }else{
            UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',1);
        }

    }
}