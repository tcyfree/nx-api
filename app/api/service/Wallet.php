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
// | DateTime: 2017/9/7/10:38
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\ActPlan as ActPlanModel;
use app\lib\exception\ParameterException;

class Wallet
{
    public static function checkActPlanFee($id,$join_fee)
    {
        $res = ActPlanModel::get(['id' => $id, 'fee' => $join_fee]);
        if(!$res){
            throw new ParameterException([
                'msg' => '购买费用和行动计划费用不匹配哦！'
            ]);
        }
    }
}