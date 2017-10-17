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
// | DateTime: 2017/9/1/17:49
// +----------------------------------------------------------------------

namespace app\api\model;

use app\lib\exception\ParameterException;

class ActPlanUser extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function actPlan()
    {
        return $this->hasOne('ActPlan','id','act_plan_id');
    }

    /**
     * 获取用户参加的行动社
     * @param $uid
     * @param $page
     * @param $size
     * @return \think\Paginator
     */
    public static function actPlanByUser($uid ,$page, $size)
    {
        $where['user_id'] = $uid;

        $pagingData = self::with('actPlan')
            ->where($where)
            ->order('create_time asc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 获取用户参加行动计划模式
     * @param $uid
     * @param $act_plan_id
     * @return mixed
     * @throws ParameterException
     */
    public static function getActPlanUserMode($uid,$act_plan_id){
        $res = self::where(['user_id' => $uid, 'act_plan_id' => $act_plan_id])->field('mode')->toArray();
        if (!$res){
            throw new ParameterException([
                'msg' => '该用户未参加此行动计划'
            ]);
        }
        return $res['mode'];
    }
}