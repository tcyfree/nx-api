<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:01
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        'code'=> 'require|isNotEmpty',
        'state' => 'require|isNotEmpty|isPositiveInteger'
    ];

    protected $message = [
        'code'=> '没有code还想获取Token！'
    ];

}