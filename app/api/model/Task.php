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
// | DateTime: 2017/8/29/14:08
// +----------------------------------------------------------------------

namespace app\api\model;


use app\lib\exception\ParameterException;
use think\Paginator;
use app\api\model\TaskUser as TaskUserModel;
use app\api\model\Task as TaskModel;

class Task extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * @param $id
     * @param $page
     * @param $size
     * @return Paginator
     */
    public static function getSummaryList($id, $page, $size)
    {
        $where['act_plan_id'] = $id;
        $where['release'] = 1;
        $pagingData = self::where($where)
            ->order('create_time asc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 检查任务是否存在
     * @param $id
     * @throws ParameterException
     */
    public static function checkTaskExists($id)
    {
        $res = self::get(['id' => $id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '该任务不存在，请检查ID'
            ]);
        }
    }

    /**
     * GO任务
     * @param $uid
     * @param $task_id
     * @throws ParameterException
     */
    public static function goTask($uid, $task_id)
    {
        self::checkTaskExists($task_id);
        $res = TaskUserModel::get(['user_id' => $uid, 'task_id' => $task_id]);
        if($res){
            throw new ParameterException([
                'msg' => '任务已执行或结束了！'
            ]);
        }
        $task = TaskModel::where('id', $task_id)->field('act_plan_id')->find();
        TaskUserModel::create(['user_id' => $uid, 'task_id' => $task_id, 'act_plan_id' => $task['act_plan_id']]);
    }
    public function getSumTaskDoing($act_plan_id, $task_id)
    {

    }
}