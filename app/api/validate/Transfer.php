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
// | DateTime: 2017/8/28/11:06
// +----------------------------------------------------------------------

namespace app\api\validate;


class Transfer extends BaseValidate
{
    protected $rule = [
        'number' => 'require|length:8',
        'community_id' => 'require|length:36'
    ];

    protected $message = [
        'number' => '参数错误！'
    ];
}