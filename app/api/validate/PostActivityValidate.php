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
// | DateTime: 2018/1/9/10:32
// +----------------------------------------------------------------------

namespace app\api\validate;


class PostActivityValidate extends BaseValidate
{
    protected $rule = [
        'community_id' => 'require|length:36',
        'name' => 'require|length:1,50',
        'cover_image' => 'require|url',
        'content' => 'require',
        'fee' => 'require|between:0,99|isNaturalNumber',
        'end_time' => 'require|date',
        'tel' => 'require',
        'allow_num' => 'require|isPositiveInteger',
        'display'      => 'in:0,1'
    ];
}