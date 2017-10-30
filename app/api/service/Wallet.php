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
     * 1 判断是否挑战模式参加普通行动计划
     *
     * @param $id
     * @param $mode
     * @return mixed
     * @throws ParameterException
     */
    public static function getActPlanFee($id,$mode)
    {
        $res = ActPlanModel::checkActPlanExists($id);
        if ($res['mode'] == 0){
            if ($mode == 1){
                throw new ParameterException([
                    'msg' => '不能以挑战模式参加该行动计划'
                ]);
            }
        }

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

    /**
     * 收入扣除10%
     * @param $data
     * @return mixed
     */
    public function withdrawalFee($data)
    {
        foreach ($data as &$v){
            if ($v['type'] == 1){
                $v['income_expenses']['fee'] = strval(($v['income_expenses']['fee'])*(1-config('fee.withdrawal_fee')));
            }
        }

        return $data;
    }
}