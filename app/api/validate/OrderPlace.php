<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/27
 * Time: 12:26
 */

namespace app\api\validate;


use app\lib\RexExp;

class OrderPlace extends BaseValidate
{

    protected $rule = [
        'amount' => 'require|amountRexExp'
    ];

    protected $singleRule = [
        'amount.amountRexExp' => '充值金额只能是正整数或小数1位和2位，不能为0或0.0和0.00'
    ];

    /**
     * 充值金额仅匹配正整数或小数1位和2位，不能为0或0.0和0.00
     * @param $value
     * @return bool
     */
    protected function amountRexExp($value)
    {
        $res = RexExp::justIntegerOrDecimalNotZero($value);
        if($res == 1) {
            return true;
        }else {
            return false;
        }
    }
}