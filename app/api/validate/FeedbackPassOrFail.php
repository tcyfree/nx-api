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
// | DateTime: 2017/9/22/11:13
// +----------------------------------------------------------------------

namespace app\api\validate;


class FeedbackPassOrFail extends BaseValidate
{
    protected $rule = [
        'id' => 'require|length:36',
        'pass' => 'require|boolean'
    ];
}