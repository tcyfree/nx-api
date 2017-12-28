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
use app\api\model\TaskAccelerate as TaskAccelerateModel;

class TaskUser extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function task()
    {
        return $this->hasOne('Task','id','task_id');
    }

    public function taskUser(){
        return $this->hasOne('TaskUser','task_id','id');
    }

    public function feedback()
    {
        return $this->hasMany('TaskFeedback','task_id','id');
    }

    public function userProperty()
    {
        return $this->hasOne('UserProperty','user_id','user_id');
    }

    /**
     * 1.是否被自己点击加速的
     * 2.检查用户任务是否已经结束
     *
     * @param $from_user_id
     * @param $uid
     * @param $task_id
     * @throws ParameterException
     */
    public static function checkTaskUserFinish($from_user_id,$uid,$task_id)
    {
        $result = TaskAccelerateModel::get(['user_id' => $uid, 'from_user_id' => $from_user_id, 'task_id' => $task_id]);
        $log = LOG_PATH.'task_accelerate.log';
        file_put_contents($log,TaskAccelerateModel::getLastSql().date('Y-m-d H:i:s')."\r\n",FILE_APPEND);
        if ($result){
            throw new ParameterException([
                'msg' => '您已经加速过！'
            ]);
        }
        $res = self::get(['user_id' => $uid, 'task_id' => $task_id, 'finish' => 1]);
        if($res){
            throw new ParameterException([
                'msg' => '您的好友已完成该任务'
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
        self::update(['finish' => 1, 'update_time' => time()],['user_id' => $uid, 'task_id' => $task_id]);
    }

    /**
     * 判断用户是否GO了
     *
     * @param $task_id
     * @param $uid
     * @throws ParameterException
     */
    public static function checkExistGO($task_id, $uid)
    {
        $res = self::get(['task_id' => $task_id,'user_id' => $uid]);
        if (!$res){
            throw new ParameterException([
                'msg' => '还未GO哦！'
            ]);
        }
    }
}