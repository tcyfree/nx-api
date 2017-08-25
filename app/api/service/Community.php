<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 18:05
 */

namespace app\api\service;
use app\lib\exception\ParameterException;

class Community
{
    /**
     * 过滤权限值
     * @param $auth
     * @return string
     * @throws ParameterException
     */
    public static function authFilter($auth)
    {
        $str = str_replace('，', ',', $auth);
        if(empty($str))
        {
            return false;
        }
        $subject = explode(',', $str);

        foreach ($subject as $v)
        {
            $pattern = array(1,2,3,4);
            if (!in_array($v, $pattern))
            {
                throw new ParameterException(['msg' => "'".$v."'不符合规则！"]);
            }
        }
        $res = array_unique($subject);

        return implode(",", $res);
    }
}