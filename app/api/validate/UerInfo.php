<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/18
 * Time: 18:47
 */

namespace app\api\validate;


class UerInfo extends BaseValidate
{
    protected $rule = [
        'avatar'    => 'require|isNotEmpty',
        'nickname'  => 'require|isNotEmpty',
        'signature' => 'max:30'
    ];

    protected $message = [
        'signature.max'  => '简介不能超过30个字符！'
    ];
}