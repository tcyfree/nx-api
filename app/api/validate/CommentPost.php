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
// | DateTime: 2017/9/20/15:18
// +----------------------------------------------------------------------

namespace app\api\validate;


class CommentPost extends BaseValidate
{
    protected $rule = [
        'to_user_id'=>'length:36',
        'comment' => 'require|max:255',
        'communication_id' => 'require|length:36'
    ];
}