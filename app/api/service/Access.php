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
// | DateTime: 2018/3/30/12:01
// +----------------------------------------------------------------------

namespace app\api\service;

use app\lib\exception\ForbiddenException;

class Access
{
    /**
     * 检查是否是允许访问IP
     * @throws ForbiddenException
     */
    public function checkIPWhiteList()
    {
        $request_ip =  request()->ip();
        $allow = false;
        $allow_ip_array = config('secure.allow_ip');
        foreach ($allow_ip_array as $value){
            if ($request_ip == $value){
                $allow = true;
                break;
            }
        }
        if (!$allow){
            throw new ForbiddenException([
                'msg' => $request_ip.'不在白名单中'
            ]);
        }
    }
}