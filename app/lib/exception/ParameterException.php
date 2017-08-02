<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/2
 * Time: 2:15
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}