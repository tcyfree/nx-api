<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/21
 * Time: 14:22
 */

namespace app\api\validate;

class MessageNew extends BaseValidate
{
    protected $rule = [
        'to_user_id' => 'require|length:36',
        'content' => 'require|max:255',
    ];
}