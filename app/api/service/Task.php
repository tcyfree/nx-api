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
}