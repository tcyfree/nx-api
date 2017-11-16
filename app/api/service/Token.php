<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/22
 * Time: 16:16
 */

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function generateToken()
    {
        //32个字符组成一组随机字符串
        $randChars = getRandChar(32);
        //用三组字符串，进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 盐
        $salt = config('secure.token_salt');

        return md5($randChars . $timestamp . $salt);
    }

    /**
     * 根据key获取token里的数据
     * 1. || !is_array($vars) 可能会取到其它数值
     *
     * @param $key
     * @return mixed
     * @throws Exception
     * @throws TokenException
     */
    public static function getCurrentTokenVar($key)
    {
        $token = Request::instance()
            ->header('token');
        $vars = Cache::store('redis')->get($token);
        if (!$vars || !is_array($vars))
        {
            throw new TokenException();
        }
        else
        {
            if (!is_array($vars))
            {
                $vars = json_decode($vars, true);
                var_dump($vars);
            }
            if (array_key_exists($key, $vars))
            {
                return $vars[$key];
            }
            else
            {
                throw new Exception('尝试获取的Token变量并不存在');
            }
        }
    }

    public static function deleteCurrentToken()
    {
        $token = Request::instance()->header('token');
        $res = Cache::store('redis')->rm($token);
        if (!$res)
        {
            throw new TokenException();
        }
    }
    /**
     * 获取当前用户uuid
     * @return mixed
     */
    public static function getCurrentUid()
    {
        //token
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    /**
     * 游客和用户同时查看的接口返回用户uuid
     * @return int
     */
    public static function getAnyhowUid()
    {
        try{
            $uid = self::getCurrentUid();
        }catch (Exception $ex)
        {
            $uid = 0;
        }

        return $uid;
    }
    /**
     * 需要用户和CMS管理员都可以访问的权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if ($scope)
        {
            if ($scope >= ScopeEnum::User)
            {
                return true;
            }
            else
            {
                throw new ForbiddenException();
            }
        }
        else
        {
            throw new TokenException();
        }
    }

    /**
     * 只有用户才能访问的接口权限
     * @return bool
     * @throws ForbiddenException
     * @throws TokenException
     */
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentTokenVar('scope');
        if ($scope)
        {
            if ($scope == ScopeEnum::User)
            {
                return true;
            }
            else
            {
                throw new ForbiddenException();
            }
        }
        else
        {
            throw new TokenException();
        }
    }

    public static function isValidOperate($checkedUID)
    {
        if (!$checkedUID)
        {
            throw new Exception('检查UID时必须传入一个被检查的UID');
        }
        $currentOperateUID = self::getCurrentUid();
        if($currentOperateUID == $checkedUID){
            return true;
        }
        return false;
    }

    public static function verifyToken($token)
    {
        $exist = Cache::store('redis')->get($token);
        if($exist){
            return true;
        }
        else{
            return false;
        }
    }
}