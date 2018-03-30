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


class PutCourseValidate extends BaseValidate
{
    protected $rule = [
        'uuid' => 'require|length:36',
        'name' => 'require|length:1,50',
        'cover_image' => 'require|url',
        'profile' => 'require|length:1,140',
        'fee' => 'require|between:0,99|isNaturalNumber',
        'display'      => 'in:0,1'
    ];
}