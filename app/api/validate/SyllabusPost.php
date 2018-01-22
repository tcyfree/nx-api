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


class SyllabusPost extends BaseValidate
{
    protected $rule = [
        'course_id' => 'require|length:36',
        'name' => 'require|length:1,50',
        'requirement'=> 'require|length:1,1000',
        'file_uri' => 'url',
        'profile' => 'require|length:1,100000',
        'cover_image' => 'require|url',
        'type' => 'require'
    ];
}