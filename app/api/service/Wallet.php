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
    /**
     * 获取行动计划费用
     * @param $id
     * @return mixed
     */
    public static function getActPlanFee($id)
    {
        ActPlanModel::checkActPlanExists($id);
        $res = ActPlanModel::get(['id' => $id,]);

        return $res->fee;
    }

    /**
     * 收支明细按年分组
     * @param $data
     * @return mixed
     */
    public static function getDataByYear($data)
    {
        $newData = [];
        foreach ($data as $v){
            $index = date('Y',strtotime($v['create_time']));
            $newData[$index][] = $v;
        }
        krsort($newData);

        return $newData;
    }
}