<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 17:57
 */

namespace app\api\controller\v1;


use app\api\service\AppToken;
use app\api\service\UserToken;
use app\api\validate\AppTokenGet;
use app\api\validate\TokenGet;
use app\lib\exception\ParameterException;
use app\api\service\Token as TokenService;
use think\Session;

class Token
{
    //请求CODE
    public function getCode(){
        $wxAppID = config('wx.app_id');
        $redirect_uri = urlencode('http://auth.xingdongshe.com');
        // 赋值（当前作用域）
        $state = mt_rand(1000,9999);
        Session::set('state',$state);
        $getCode = sprintf(
            config('wx.qr_code'),
            $wxAppID, $redirect_uri, $state);
        return [
            'getCodeUri' => $getCode
        ];
    }
    public function getToken($code = '',$state = '')
    {
        (new TokenGet())->goCheck();
        $ut = new UserToken($code,$state);
        $token = $ut->get();
        return [
          'token'=>$token
        ];
    }

    /**
     * 第三方应用获取令牌
     * @url /app_token?
     * @POST ac=:ac se=:secret
     */
    public function getAppToken($ac='', $se='')
    {
        (new AppTokenGet())->goCheck();
        $app = new AppToken();
        $token = $app->get($ac, $se);
        return [
            'token' => $token
        ];
    }

    public function verifyToken($token='')
    {
        if(!$token){
            throw new ParameterException([
                'token不允许为空'
            ]);
        }
        $valid = TokenService::verifyToken($token);
        return [
            'isValid' => $valid
        ];
    }
}