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

use app\lib\exception\ParameterException;
use think\Session;


class WXOauth
{
    /**
     * 第一步：请求CODE
     * 1 PC微信扫码登录
     * 2 微信App授权登录
     * @param $type
     * @return array
     * @throws ParameterException
     */
    public function getCode($type){
        switch ($type){
            case 1:
                $wxAppID = config('wx.app_id');
                $redirect_uri = urlencode('http://auth.xingdongshe.com/api/v1/token/user');
                // 赋值（当前作用域）
                $state = $type.mt_rand(1000,9999);
                Session::set('state',$state);
                $getCode = sprintf(
                    config('wx.qr_code'),
                    $wxAppID, $redirect_uri, $state);
                break;
            case 2:
                $wxAppID = config('wx.g_app_id');
                $redirect_uri = urlencode('http://auth.xingdongshe.com/api/v1/token/user');
                // 赋值（当前作用域）
                $state = $type.mt_rand(1000,9999);
                Session::set('state',$state);
                $getCode = sprintf(
                    config('wx.g_code'),
                    $wxAppID, $redirect_uri, $state);
                break;
            default:
                throw new ParameterException([
                    'msg' => 'type取值范围不正确！'
                ]);
        }

        return [
            'getCodeUri' => $getCode
        ];
    }

    /**
     * 第二步：通过code获取access_token
     * @param $code
     * @param $state
     * @return mixed
     * @throws ParameterException
     */
    public function getAccessToken($code,$state){
        $type = substr($state,0,1);
        switch ($type){
            case 1:
                $code = $code;
                $wxAppID = config('wx.app_id');
                $wxAppSecret = config('wx.app_secret');
                $wxLoginUrl = sprintf(
                    config('wx.qr_access_token'),
                    $wxAppID, $wxAppSecret, $code);
                break;
            case 2:
                $code = $code;
                $wxAppID = config('wx.g_app_id');
                $wxAppSecret = config('wx.g_app_secret');
                $wxLoginUrl = sprintf(
                    config('wx.g_access_token'),
                    $wxAppID, $wxAppSecret, $code);
                break;
            default:
                throw new ParameterException([
                    'msg' => '取值范围不正确！'
                ]);
        }

        $result = curl_get($wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult))
        {
            throw new Exception('微信内部错误');
        }
        else
        {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail)
            {
                $this->processError($wxResult);
            }
            else
            {
                return $wxResult;
            }
        }
    }
    /**
     * 微信接口处理异常
     * @param $wxResult
     * @throws WeChatException
     */
    private function processError($wxResult)
    {
        throw new WeChatException(
            [
                'msg' => $wxResult['errmsg'],
                'errorCode' => $wxResult['errcode']
            ]);
    }

}