<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 17:57
 */

namespace app\api\controller\v1;


use app\api\service\Token as TokenService;
use app\api\service\UserToken;
use app\api\service\WXOauth;
use app\api\validate\TokenGet;
use app\api\validate\Type;
use app\lib\exception\ParameterException;
use think\Session;

class Token
{
    /**
     * 第一步：请求CODE
     * @return array
     */
    public function getCode($type){
        (new Type())->goCheck();
        $getCodeUri = new WXOauth();
        $res = $getCodeUri->getCode($type);

        return $res;
    }


    /**
     * 用户获取AppToken
     * @param string $code
     * @param string $state
     * @return array
     */
    public function getToken($code = '',$state = '')
    {
        (new TokenGet())->goCheck();
        $ut = new UserToken();
        $token = $ut->getAppToken($code,$state);
        return [
          'token'=>$token
        ];
    }
    /**
     * 用户登出
     */
    public function deleteToken()
    {
        TokenService::deleteCurrentToken();
        // 清除session（当前作用域）
        Session::clear();

        return ['result' => '登出成功！'];
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