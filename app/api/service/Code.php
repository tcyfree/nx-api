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

namespace app\api\service;

use think\Session;


class Code
{
    /**
     *  PC微信扫码登录
     * @return array
     */
    public function getPCCode($type){
        $wxAppID = config('wx.app_id');
        $redirect_uri = urlencode('http://auth.xingdongshe.com/api/v1/token/user');
        // 赋值（当前作用域）
        $state = $type.mt_rand(1000,9999);
        Session::set('state',$state);
        $getCode = sprintf(
            config('wx.qr_code'),
            $wxAppID, $redirect_uri, $state);
        return [
            'getCodeUri' => $getCode
        ];
    }
    /**
     * 微信App授权登录
     * @return array
     */
    public function getAppCode($type){
        $wxAppID = config('wx.g_app_id');
        $redirect_uri = urlencode('http://auth.xingdongshe.com/api/v1/token/user');
        // 赋值（当前作用域）
        $state = $type.mt_rand(1000,9999);
        Session::set('state',$state);
        $getCode = sprintf(
            config('wx.g_code'),
            $wxAppID, $redirect_uri, $state);
        return [
            'getCodeUri' => $getCode
        ];
    }
}