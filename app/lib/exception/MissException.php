<?php
/**
 * Created by 七月.
 * User: 七月
 * Date: 2017/2/14 我去，情人节，886214
 * Time: 1:03
 */

namespace app\lib\exception;

/**
 * MISS路由，当全部路由没有匹配到时
 * 将返回资源未找到的信息
 */
class MissException extends BaseException
{
    public $code = 404;
    public $msg = 'global:your required resource are not found';
    public $errorCode = 10001;
}