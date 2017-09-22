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
// | DateTime: 2017/9/18/11:54
// +----------------------------------------------------------------------

namespace app\api\model;


use app\api\model\Task as TaskModel;
use app\lib\exception\ParameterException;

class TaskFeedback extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function task()
    {
        return $this->hasOne('Task','id','task_id');
    }

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','to_user_id');
    }

    /**
     * @param $user_id
     * @param $task_id
     * @return bool|null|static
     */
    public static function checkTaskFeedback($user_id, $task_id){
        TaskModel::checkTaskExists($task_id);
        $res = self::get(['user_id' => $user_id, 'task_id' => $task_id]);
        if (!$res){
           return false;
        }else{
            return $res;
        }
    }

    public static function checkTaskFeedbackStatus($id){
        $res = self::get(['id' => $id]);
        if (!$res){
            throw new ParameterException();
        }elseif ($res['status'] == 2 || $res['status'] == 3){
            throw new ParameterException([
                'msg' => '该反馈已审核通过或失效'
            ]);
        }

        return $res;
    }


}