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
// | DateTime: 2017/8/31/14:19
// +----------------------------------------------------------------------

namespace app\api\validate;

use app\lib\RexExp;
class RechargeWx extends BaseValidate
{
    protected $rule = [
        'total_fee' => 'require|feeRexExp'
    ];

    protected $message = [
        'total_fee.feeRexExp' => '充值金额只能是正整数或小数1位和2位，不能为0或0.0和0.00'
    ];

    /**
     * 充值金额仅匹配正整数或小数1位和2位，不能为0或0.0和0.00
     * @param $value
     * @return bool
     */
    protected function feeRexExp($value)
    {
        $res = RexExp::justIntegerOrDecimalNotZero($value);
        if($res == 1) {
            return true;
        }else {
            return false;
        }
    }
}