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
// | DateTime: 2017/9/15/11:12
// +----------------------------------------------------------------------

namespace app\api\model;


use app\lib\exception\ParameterException;
use app\api\model\Task as TaskModel;

class TaskUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 检查用户任务是否已经结束
     * @param $uid
     * @param $task_id
     * @throws ParameterException
     */
    public static function checkTaskUserFinish($uid,$task_id)
    {
        $res = self::get(['user_id' => $uid, 'task_id' => $task_id]);
        if($res){
            throw new ParameterException([
                'msg' => '任务已经结束了！'
            ]);
        }
    }

    /**
     * 结束任务
     * @param $uid
     * @param $task_id
     */
    public static function newTaskUser($uid, $task_id)
    {
        $res = TaskModel::where('id', $task_id)->field('act_plan_id')->find();
        self::create(['user_id' => $uid, 'task_id' => $task_id, 'act_plan_id' => $res['act_plan_id']]);
    }
}