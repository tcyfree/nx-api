<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/18
 * Time: 3:11
 */

namespace app\api\validate;


class UserID extends BaseValidate
{
    protected $rule = [
        'user_id' => 'require|length:36',
    ];

    protected $message = [
        'id.length' => 'user_id长度不符合要求 36'
    ];

}