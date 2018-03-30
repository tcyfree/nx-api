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
// | DateTime: 2018/3/30/11:39
// +----------------------------------------------------------------------

namespace app\api\service;

use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;


class WXAccessToken
{
    /**
     * {"access_token":"ACCESS_TOKEN","expires_in":7200}
     * 根据不同的app_id和app_secret获取不同的access_token
     *
     * @param $app_id
     * @param $app_secret
     * @param $cache_key
     * @return mixed
     * @throws Exception
     * @throws ParameterException
     */
    public function getWXAccessToken($app_id,$app_secret,$cache_key)
    {
        $wxAccessTokenUrl = sprintf(
            config('wx.access_token'),
            $app_id, $app_secret);
        $result = curl_get($wxAccessTokenUrl);
        $wxResult = json_decode($result, true);

        if (empty($wxResult))
        {
            throw new Exception('微信内部错误');
        }else if (isset($wxResult['errcode'])){
            throw new ParameterException([
                'msg' => $wxResult['errmsg'],
                "errrCode" => $wxResult['errcode']
            ]);
        }

        $this->saveToCache($cache_key,$wxResult['access_token']);

        return $wxResult['access_token'];
    }

    /**
     * 将access_token缓存到redis中
     *
     * @param $cache_key
     * @param $vaule
     * @throws TokenException
     */
    private function saveToCache($cache_key, $vaule){
        $redis = Cache::store('redis');
        $expire_in = config('setting.access_token_expire_in');
        $res = $redis->set($cache_key,$vaule,$expire_in);
        if(!$res){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
    }

    /**
     * 获取访问微信接口的access_token
     *
     * @return mixed
     */
    public function getAccessToken()
    {
        $redis = Cache::store('redis');
        $wx_access_token = $redis->get('wx_access_token');
        if (!$wx_access_token){
            $app_id = config('wx.g_app_id');
            $app_secret = config('wx.g_app_secret');
            $cache_key = 'wx_access_token';
            $access_token = $this->getWXAccessToken($app_id,$app_secret,$cache_key);
        }else{
            $access_token = $wx_access_token;
        }

        return $access_token;
    }

    /**
     * 获取访问小程序接口的access_token
     *
     * @return mixed
     */
    public function getMiniAccessToken()
    {
        $redis = Cache::store('redis');
        $mini_access_token = $redis->get('mini_access_token');
        if (!$mini_access_token){
            $app_id = config('wx.mini_app_id');
            $app_secret = config('wx.mini_app_secret');
            $cache_key = 'mini_access_token';
            $access_token = $this->getWXAccessToken($app_id,$app_secret,$cache_key);
        }else{
            $access_token = $mini_access_token;
        }

        return $access_token;
    }

}