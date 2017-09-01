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
// | DateTime: 2017/9/1/16:05
// +----------------------------------------------------------------------

namespace app\api\validate;


class Expenses extends BaseValidate
{
    protected $rule = [
        'act_plan_id' => 'require|length:36',
        'mode' => 'require|in:0,1',
        'fee' => 'require|between:1,49',
        'name' => 'require'
    ];
}