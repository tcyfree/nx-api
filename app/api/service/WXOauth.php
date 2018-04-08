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
use app\lib\exception\WeChatException;
use think\Session;
use think\Exception;


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
        // 赋值（当前作用域）
        $state = $type.mt_rand(1000,9999);
        Session::set('state',$state);
        //回调uri
        $redirect_uri = urlencode('http://auth.go-qxd.com/api/v1/user/token');

        switch ($type){
            case 1:
                $wxAppID = config('wx.app_id');
                $getCode = sprintf(
                    config('wx.qr_code'),
                    $wxAppID, $redirect_uri, $state);
                break;
            case 2:
                $wxAppID = config('wx.g_app_id');
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
     * 第三步：通通过access_token和openid拉取用户信息(需scope为 snsapi_userinfo)
     * @param $access_token
     * @param $openid
     * @param $type
     * @return mixed
     * @throws ParameterException
     */
    public function getUserInfo($openid,$access_token,$type){
        switch ($type){
            case 0:
                $userinfo_url = sprintf(config('wx.qr_userinfo'), $access_token, $openid);
                break;
            case 1:
                $userinfo_url = sprintf(config('wx.g_userinfo'), $access_token, $openid);
                break;
            default:
                throw new ParameterException([
                    'msg' => '取值范围不正确！'
                ]);
        }
        $result = curl_get($userinfo_url);
        $ufResult = $this->checkWXRes($result);

        return $ufResult;

    }

    /**
     * 检查请求微信返回结果是否有错
     *
     * @param $result
     * @return mixed
     * @throws Exception
     */
    public function checkWXRes($result)
    {
        $ufResult = json_decode($result, true);

        if (empty($ufResult))
        {
            throw new Exception('微信内部错误');
        }else {
            $ufFail = array_key_exists('errcode', $ufResult);
            if ($ufFail) {
                $this->processError($ufResult);
            } else {
                return $ufResult;
            }
        }
    }

    /**
     * 检查小程序码是否参数错误
     *
     * @param $res
     * @return mixed
     * @throws Exception
     */
    public function checkMiniQRCode($res)
    {
        if (empty($res))
        {
            throw new Exception('微信内部错误');
        }else {
            $ufResult = json_decode($res, true);
            if (is_array($ufResult)){
                $ufFail = array_key_exists('errcode', $ufResult);
                if ($ufFail) {
                    $this->processError($ufResult);
                } else {
                    return $res;
                }
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