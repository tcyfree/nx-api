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
// | DateTime: 2017/8/29/9:23
// +----------------------------------------------------------------------

namespace app\api\validate;


class ActPlanUpdate extends BaseValidate
{
    protected $rule = [
        'id' => 'require|length:36',
        'name'         => 'require|length:5,25',
        'description'  => 'require|length:10,140',
        'cover_image'  => 'require|url',
        'fee'          => 'require|between:0,99',
        'display'      => 'in:0,1'

    ];
}   