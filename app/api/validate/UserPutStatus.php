<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/21
 * Time: 14:22
 */

namespace app\api\validate;

class UserPutStatus extends BaseValidate
{
    protected $rule = [
        'id' => 'require|length:36',
        'status' => 'require|in:0,1',
    ];
}