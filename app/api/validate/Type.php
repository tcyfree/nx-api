<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\validate;


class Type extends  BaseValidate
{
    protected $rule = [
        'type' => 'require|isNotEmpty|in:1,2',
    ];

    protected $message = [
        'type.isNotEmpty'=> 'type不能为空！',
    ];
}