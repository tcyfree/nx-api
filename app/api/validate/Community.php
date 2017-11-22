<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/21
 * Time: 14:22
 */

namespace app\api\validate;
use app\lib\RexExp;

class Community extends BaseValidate
{
    protected $rule = [
        'id' => 'require|length:36',
        'name' => 'require|chsAlphaNum|length:4,40',
        'description' => 'require|length:20,280',
        'cover_image'=> 'require|url',
        'qr_prefix_url'     => 'require|url'
    ];

    protected $message = [
        'name.justChinesW' => '仅接收汉字、大小写字母和数字'
    ];

    protected function justChineseW($value)
    {
        $res = RexExp::justChineseW($value,1,20);
        if($res ==1){
            return true;
        }else{
            return false;
        }
    }
}