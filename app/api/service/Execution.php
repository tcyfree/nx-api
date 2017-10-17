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

use app\api\model\TaskUser as TaskUserModel;
use app\api\model\UserProperty as UserPropertyModel;
use app\api\model\Task as TaskModel;
use app\api\model\ActPlanUser as ActPlanUserModel;

class Execution
{
    /**
     * 根据参加行动计划的模式不同增加不同的行动力值
     * 1 挑战模式判断是否参考用时是否逾期，若逾期则不增加行动力值
     *
     * @param $task_id
     * @param $user_id
     */
    public function addExecution($task_id, $user_id, $mode)
    {
        if ($mode == 1){
            $where['task_id'] = $task_id;
            $where['user_id'] = $user_id;
            $res = TaskUserModel::whereTime('deadline','<=',time())->where($where)->find();
            if ($res){
                UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',2);
            }
        }else{
            UserPropertyModel::where(['user_id' => $user_id])->setInc('execution',1);
        }

        TaskUserModel::update(['finish' => 1, 'update_time' => time()],
            ['task_id' => $task_id, 'user_id' => $user_id]);
        $this->checkActPlanUserFinish($task_id, $user_id);

    }

    /**
     * 当用户完成的任务和行动计划发布任务数相同时，更新该计划为完成状态
     *
     * @param $task_id
     * @param $user_id
     */
    public function checkActPlanUserFinish($task_id, $user_id)
    {
        $where['task_id'] = $task_id;
        $where['user_id'] = $user_id;
        $act_plan_id = TaskUserModel::where($where)->field('act_plan_id')->find();

        $whereTaskNum['act_plan_id'] = $act_plan_id['act_plan_id'];
        $whereTaskNum['release'] = 1;
        $task_num = TaskModel::where($whereTaskNum)->count('id');

        $whereTaskUserNum['act_plan_id'] = $act_plan_id['act_plan_id'];
        $whereTaskUserNum['user_id']     = $user_id;
        $whereTaskUserNum['finish']     = 1;
        $task_user_num = TaskUserModel::where($whereTaskUserNum)->count();

        if ($task_num == $task_user_num){
            ActPlanUserModel::update(['finish' => 1,'update_time' => time()],
                ['act_plan_id' => $act_plan_id['act_plan_id'],'user_id' => $user_id]);
        }
    }
}