<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: probe <1946644259@qq.com>
// +----------------------------------------------------------------------
// | DateTime: 2017/9/14/18:53
// +----------------------------------------------------------------------

namespace app\api\validate;


class Feedback extends BaseValidate
{
    protected $rule = [
        'content' => 'require|max:512',
        'task_id' => 'require|length:36',
        'to_user_id' => 'length:36',
        'location' => 'max:255'
    ];
}