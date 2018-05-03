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
// | DateTime: 2017/8/29/9:23
// +----------------------------------------------------------------------

namespace app\api\validate;

use app\lib\RexExp;

class EnterprisePaymentPost extends BaseValidate
{
    protected $rule = [
        'amount'       => 'require|feeRexExp',
        're_user_name' => 'require'
    ];

    protected $message = [
        'amount.feeRexExp' => '金额只能是正整数或小数1位和2位，不能为0或0.0和0.00'
    ];

    /**
     * 金额仅匹配正整数或小数1位和2位，不能为0或0.0和0.00
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