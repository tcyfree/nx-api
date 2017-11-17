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
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\ActPlan as ActPlanModel;
use think\Db;
use app\api\model\Callback as CallbackModel;
use app\api\service\Execution as ExecutionService;

class Task extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function taskUser(){
        return $this->hasOne('TaskUser','task_id','id');
    }

    public function actPlan()
    {
        return $this->hasOne('ActPlan','id','act_plan_id');
    }

    public function feedback()
    {
        return $this->hasMany('TaskFeedback','task_id','id');
    }
    /**
     * 草稿
     *
     * @param $id
     * @param $page
     * @param $size
     * @return Paginator
     */
    public static function getSummaryList($id, $page, $size)
    {
        $where['act_plan_id'] = $id;
        $where['release'] = ['in','0,1'];
        $where['delete_time'] = 0;
        $pagingData = self::where($where)
            ->order('create_time asc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 检查任务是否存在
     * 1 若存在则返回结果
     *
     * @param $id
     * @return null|static
     * @throws ParameterException
     */
    public static function checkTaskExists($id)
    {
        $res = self::get(['id' => $id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '该任务不存在，请检查ID'.$id
            ]);
        }
        return $res;
    }

    /**
     * GO任务
     * 1 添加定时-回调任务
     * 2 记录用户参加行动计划模式
     * 3 结束时间戳
     * 4 挑战模式不回调
     *
     * @param $uid
     * @param $task_id
     * @return $this|null|static
     * @throws ParameterException
     * @throws \Exception
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
        $task = TaskModel::where('id', $task_id)->field('act_plan_id,reference_time')->find();
        $act_plan_user_mode = ActPlanUserModel::where(['act_plan_id'=>$task['act_plan_id'],'user_id' => $uid])->field('mode')->find();
        $id = uuid();
        Db::startTrans();
        try{
            $deadline = $task['reference_time'] + time();
            $res = TaskUserModel::create(['id' => $id, 'user_id' => $uid, 'finish' => 0,'task_id' => $task_id,
                'act_plan_id' => $task['act_plan_id'], 'mode' => $act_plan_user_mode['mode'], 'deadline' => $deadline]);
            if ($act_plan_user_mode['mode'] == 0){
                CallbackModel::create(['key_id' => $task_id, 'user_id' => $uid, 'deadline' => $deadline]);
            }

            Db::commit();
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
        return $res;
    }

    public static function getTaskMode($task_id,$uid){
        $res = self::where(['id' => $task_id])->field(['act_plan_id'])->find();
        if (!$res){
            throw new ParameterException([
                'msg' => '任务ID错误'
            ]);
        }
        $mode = ActPlanUserModel::get(['user_id' => $uid, 'act_plan_id' => $res['act_plan_id']]);
        if (!$mode){
            throw new ParameterException([
                'msg' => '未参加该行动计划！'
            ]);
        }

        return $mode['mode'];
    }
    public function getSumTaskDoing($act_plan_id, $task_id)
    {

    }

    /**
     *  根据任务ID查找行动社ID
     *
     * @param $task_id
     * @return mixed
     */
    public static function getCommunityIDByTaskID($task_id)
    {
        self::checkTaskExists($task_id);
        $where['id'] = $task_id;
        $res = self::where($where)
            ->field('act_plan_id')
            ->find();
        $act_plan_id = $res['act_plan_id'];

        $res = ActPlanModel::where('id',$act_plan_id)
            ->field('community_id')
            ->find();
        return $res['community_id'];
    }

    /**
     * 完成任务
     * 1 更新用户对应行动力值
     * 2 排除挑战模式
     *
     * @param $v
     * @param $log
     * @throws \Exception
     */
    public static function missionComplete($v, $log)
    {
        Db::startTrans();
        try{
            CallbackModel::cancelCallback($v['id']);
            $execution = new ExecutionService();
            $execution->addExecution($v['key_id'],$v['user_id'],0);
            Db::commit();
            file_put_contents($log, TaskUserModel::getLastSql().' && '.CallbackModel::getLastSql().' '.
                date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
        }catch (Exception $ex) {
            Db::rollback();
            throw $ex;
        }
    }
}