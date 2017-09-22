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
// | DateTime: 2017/9/19/9:55
// +----------------------------------------------------------------------

namespace app\api\validate;


use app\lib\exception\ParameterException;

class CreateCommunication extends BaseValidate
{
    protected $rule = [
        'content' => 'require',
        'community_id' => 'require|length:36',
        'location' => 'max:255',
        '@user_ids' => 'user_ids'
    ];

    protected $message = [
        '@user_ids' => '长度不符合要求 36'
    ];

    protected function user_ids($value)
    {
        if (is_array($value)){
            $res = AssociativeOrIndexArray($value);
            if ($res != 1){
                throw new ParameterException([
                    'msg' => '数组类型不对，非索引数组'
                ]);
            }
            foreach ($value as $v){
                if (strlen($v) != 36){
                    return false;
                }
            }
        }else{
            throw new ParameterException([
                'msg' => $value.'不是数组'
            ]);
        }

        return true;
    }

}