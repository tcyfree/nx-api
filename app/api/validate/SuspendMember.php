<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/18
 * Time: 3:11
 */

namespace app\api\validate;


class SuspendMember extends BaseValidate
{
    protected $rule = [
        'user_id' => 'require|length:36',
        'community_id' => 'require|length:36',
        'status' => 'require|in:0,2'
    ];

    protected $message = [
        'id.length' => 'UUID长度不符合要求 36'
    ];

}