<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/27
 * Time: 4:44
 */

namespace app\api\controller;


use think\Cache;
use think\Controller;
use app\api\service\Token as TokenService;
use think\Exception;
use app\lib\exception\ParameterException;
use app\lib\exception\TokenException;

class BaseController extends Controller
{
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }

    /**
     * {"access_token":"ACCESS_TOKEN","expires_in":7200}
     * 获取access_token
     * @return mixed
     * @throws Exception
     */
    public function getWXAccessToken()
    {
        $wxAppID = config('wx.g_app_id');
        $wxAppSecret = config('wx.g_app_secret');
        $wxAccessTokenUrl = sprintf(
            config('wx.access_token'),
            $wxAppID, $wxAppSecret);
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

        $redis = Cache::store('redis');
        $expire_in = config('setting.access_token_expire_in');
        $key = 'wx_access_token';
        $res = $redis->set($key,$wxResult['access_token'],$expire_in);
        if(!$res){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }

        return $wxResult['access_token'];
    }

    /**
     * 获取访问微信接口的access_token
     * @return mixed
     */
    public function getAccessToken()
    {
        $redis = Cache::store('redis');
        $wx_access_token = $redis->get('wx_access_token');
        if (!$wx_access_token){
            $access_token = $this->getWXAccessToken();
        }else{
            $access_token = $wx_access_token;
        }

        return $access_token;
    }

}