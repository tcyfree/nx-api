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
// | DateTime: 2017/8/29/13:51
// +----------------------------------------------------------------------

namespace app\api\validate;


class TaskNew extends BaseValidate
{
    protected $rule = [
        'act_plan_id' => 'require|length:36',
        'name' => 'require|length:4,50',
        'requirement'=> 'require|length:20,280',
        'reference_time' => 'require|isPositiveInteger',
        'content' => 'require',
        'release' => 'require|in:0,1'
    ];
}