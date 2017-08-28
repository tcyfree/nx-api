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
// | DateTime: 2017/8/28/15:09
// +----------------------------------------------------------------------

namespace app\api\validate;


use app\lib\exception\ParameterException;

class Report extends BaseValidate
{
    protected $rule = [
        'community_id' => 'require|length:36',
        'content' => 'require|max:255',
        'images' => 'checkUris'
    ];

    /**
     * 验证不确定数组值是否符合规范，并确定到某个具体key
     * @param $value
     * @return bool
     * @throws ParameterException
     */
    protected function checkUris($value)
    {
        foreach ($value as $k => $v)
        {
            $res = preg_match('/^(https?:\/\/){1}(\w+\.)+[a-zA-Z]+$/',$v);
            if ($res == 0){
                throw new ParameterException([
                    'msg' => $k.'不是有效的URI地址'
                ]);
            }
        }

        return true;
    }
}