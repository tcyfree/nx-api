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


class AccelerateTask extends BaseValidate
{
    protected $rule = [
        'user_id' => 'require|length:36',
        'task_id' => 'require|length:36'
    ];
}