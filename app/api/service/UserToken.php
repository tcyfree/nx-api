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
use think\Cache;
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
    //第二步：通过code获取access_token等信息
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
                $this->processError($wxResult);
            }
            else
            {
                return $this->grantToken($wxResult);
            }
        }
    }

    /**
     * 给用户签发token
     *拿到openid,unionid
     * 数据库里看一下，这个unionid是不是已经存在
     * 如果存在 则不处理，如果不存在那么新增一条user记录
     * 生成令牌，准备缓存数据，写入缓存
     * 把令牌返回到客户端去
     * key: 令牌
     * value: wxResult，uid, scope
     * @param $wxResult
     * @return string
     */

    private function grantToken($wxResult){
        $unionid = $wxResult['unionid'];
        $openid = $wxResult['openid'];
        $access_token = $wxResult['access_token'];
        $user = UserInfoModel::getByOpenID($unionid);
        if($user){
            $uid = $user->user_id;
            $this->updateUserInfo($openid,$access_token,$uid);
        }
        else{
            $uid = $this->newUser($unionid,$openid,$access_token);
        }
        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue);
        return $token;
    }

    /**
     * 将token及相关信息缓存到redis
     * @param $cachedValue
     * @return string
     * @throws TokenException
     */
    private function saveToCache($cachedValue){
        $key = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');

        $request = Cache::store('redis')->set($key,$value,$expire_in);
        if(!$request){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $key;
    }

    /**
     * 增加缓存用户id和权限值
     * @param $wxResult
     * @param $uid
     * @return mixed
     */
    private function prepareCachedValue($wxResult, $uid){
        $cachedValue = $wxResult;
        $cachedValue['uid'] = $uid;
        // scope=16 代表App用户的权限数值
        $cachedValue['scope'] = ScopeEnum::User;
        //$cachedValue['scope'] = 16;

        // scope =32 代表CMS（管理员）用户的权限数值
        //$cachedValue['scope'] = 32;
        return $cachedValue;
    }

    /**
     * 新增用户
     * @param $unionid
     * @param $openid
     * @param $access_token
     * @return string
     */
    private function newUser($unionid,$openid,$access_token)
    {
        $register_ip = $_SERVER['REMOTE_ADDR'];
        $id = uuid();
        UserModel::create([
            'id' => $id,
            'number' => number(),
            'reg_ip' => $register_ip
        ]);
        UserInfoModel::create([
            'user_id' => $id,
            'openid'  => $openid,
            'unionid' => $unionid,
        ]);

        $this->updateUserInfo($openid,$access_token,$id);


        return $id;
    }

    /**
     * 第三步：通过access_token调用用户信息接口。更新用户相关信息
     * @param $openid
     * @param $access_token
     * @param $id
     * @throws Exception
     */
    private function updateUserInfo($openid,$access_token,$id)
    {
        $userinfo_url = sprintf(config('wx.qr_userinfo'), $access_token, $openid);
        $result = curl_get($userinfo_url);
        $ufResult = json_decode($result, true);
        if (empty($ufResult))
        {
            throw new Exception('微信内部错误');
        }
        else
        {
            $ufFail = array_key_exists('errcode', $ufResult);
            if ($ufFail)
            {
                $this->processError($ufResult);
            }
            else
            {
                //请注意，在用户修改微信头像后，旧的微信头像URL将会失效。
                //因此开发者应该自己在获取用户信息后，将头像图片保存下来，避免微信头像URL失效后的异常情况。
                $ufResult['avatar'] = downloadImage($ufResult['headimgurl']);
                $user  = new UserInfoModel();
                // 过滤数组中的非数据表字段数据
                $user->allowField(true)->save($ufResult,['user_id' =>$id]);
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