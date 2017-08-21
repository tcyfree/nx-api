<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/18
 * Time: 18:47
 */

namespace app\api\validate;
use app\lib\RexExp;

class UerInfo extends BaseValidate
{
    protected $rule = [
        'avatar'    => 'require|isNotEmpty',
        'nickname'  => 'require|isNotEmpty|justChineseAlphabet',
        'signature' => 'max:30'
    ];

    protected $message = [
        'signature.max'  => '简介不能超过30个字符！',
        'nickname.justChineseAlphabet' => '只能是1-20个汉字或大小写英文'
    ];
    protected function justChineseAlphabet($value)
    {
        $res = RexExp::justChineseAlphabet($value,1,20);
        if($res == 1){
            return true;
        }else{
            return false;
        }
    }

}