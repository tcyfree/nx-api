<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/22
 * Time: 16:56
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = 'token已过期或无效token';
    public $errorCode = 10001;
}