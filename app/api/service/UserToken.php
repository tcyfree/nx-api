<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:27
 */

namespace app\api\service;


use app\api\model\LoginHistory;
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
    /**
     * 第二步：通过code获取access_token等信息
     * @return string
     */
    public function getAppToken($code,$state)
    {
        $getAccessToken = new WXOauth();
        $wxResult = $getAccessToken->getAccessToken($code,$state);

        return $this->grantToken($wxResult);
    }

    /**
     * 给用户签发token
     * 拿到openid,unionid(注意：App授权后access_token返回不包含unionid)
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
        $exists = isset($wxResult['unionid']);
        $openid = $wxResult['openid'];
        $access_token = $wxResult['access_token'];

        if($exists){
            $unionid = $wxResult['unionid'];
            $user = UserInfoModel::getByOpenID($unionid);
            if($user){
                $uid = $user->user_id;

            }
            else{

                $uid = $this->newUser($unionid,$openid,$access_token);
                $this->updateUserInfo($openid,$access_token,$uid);
            }

            $this->updateLogin($uid,0);
        }
        else{
            $uf = new WXOauth();
            $ufResult = $uf->getUserInfo($openid,$access_token,1);
            $unionid = $ufResult['unionid'];
            $user = UserInfoModel::getByOpenID($unionid);
            if($user){
                $uid = $user->user_id;
            }
            else{
                $uid = $this->newUser($unionid,$openid,$access_token);
                //更新用户信息
                $user  = new UserInfoModel();
                // 过滤数组中的非数据表字段数据
                $user->allowField(true)->save($ufResult,['user_id' =>$uid]);
            }

            $this->updateLogin($uid,1);
        }

        $cachedValue = $this->prepareCachedValue($wxResult,$uid);
        $token = $this->saveToCache($cachedValue,$uid);
        return $token;

    }

    /**
     * 1.根据用户uid查看是否存在未过期的token，如果存在则删除旧token值，避免旧token还能操作用户信息。
     * 2.将新签发token及相关信息缓存到redis
     * @param $cachedValue
     * @param $uid
     * @return string
     * @throws TokenException
     */
    private function saveToCache($cachedValue,$uid){
        $token = self::generateToken();
        $value = json_encode($cachedValue);
        $expire_in = config('setting.token_expire_in');
        $redis = Cache::store('redis');
        $exists = $redis->has($uid);
        if($exists){
            $oldToken = $redis->get($uid);
            $redis->rm($oldToken);
        }
        $res_uid = $redis->set($uid,$token,$expire_in);
        $request = $redis->set($token,$value,$expire_in);
        if(!$request && !$res_uid){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $token;
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

        // scope =32 代表平台（管理员）用户的权限数值
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
        $uf = new WXOauth();
        $ufResult = $uf->getUserInfo($openid,$access_token,0);
        $user  = new UserInfoModel();
        // 过滤数组中的非数据表字段数据
        $user->allowField(true)->save($ufResult,['user_id' =>$id]);
    }

    /**
     * 更新用户登录信息
     * @param $uid
     */
    private function updateLogin($uid,$device_type)
    {
        UserModel::update(
            [
                'last_login_ip' => $_SERVER['REMOTE_ADDR'],
                'last_login_time' => time()
            ],
            [
                'id' => $uid
            ]
        );
        LoginHistory::create(
            [
                'user_id' => $uid,
                'device_type' => $device_type
            ]
        );
    }


}