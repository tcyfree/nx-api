<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 15:12
 */

namespace app\api\validate;


class SetManager extends BaseValidate
{
    protected $rule = [
        'number' => 'require|length:8|isPositiveInteger',
        'auth'        => 'require|checkIDs',
        'community_id' => 'require|length:36'
    ];

    protected $message = [
        'auth.checkIDs'      => 'auth参数必须是以逗号分隔的多个正整数'
    ];

//    protected function
}