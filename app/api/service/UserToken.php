<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:27
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\SessionException;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use app\api\model\User as UserModel;
use app\api\model\UserInfo as UserInfoModel;
use think\Session;

class UserToken extends Token
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    function __construct($code,$state)
    {
        $session_state = Session::get('state');
        if($session_state != $state){
            throw new SessionException();
        }
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(
            config('wx.qr_access_token'),
            $this->wxAppID, $this->wxAppSecret, $this->code);
    }

    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
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
                $this->processLoginError($wxResult);
            }
            else
            {
                return $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken($wxResult){
        // 拿到openid
        // 数据库里看一下，这个unionid是不是已经存在
        // 如果存在 则不处理，如果不存在那么新增一条user记录
        // 生成令牌，准备缓存数据，写入缓存
        // 把令牌返回到客户端去
        // key: 令牌
        // value: wxResult，uid, scope
        $unionid = $wxResult['unionid'];
        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenID($unionid);
        if($user){
            $uid = $user->id;
        }
        else{
            $uid = $this->newUser($unionid,$openid);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue);
        return $token;
    }

    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = cache($key, $value, $expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

    private function prepareCachedValue($wxResult, $uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        // scope=16 代表App用户的权限数值
        $cachedValue['scope'] = ScopeEnum::User;
//        $cachedValue['scope'] = 15;

        // scope =32 代表CMS（管理员）用户的权限数值
//        $cachedValue['scope'] = 32;
        return $cachedValue;
    }


    private function newUser($unionid,$openid)
    {
        $register_ip = $_SERVER['REMOTE_ADDR'];
        $user = UserModel::create([
            'id' => uuid(),
            'number' => number()
        ]);
        $user = UserInfoModel::create([
           'openid' => $openid
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult)
    {
        throw new WeChatException(
            [
                'msg' => $wxResult['errmsg'],
                'errorCode' => $wxResult['errcode']
            ]);
    }
}