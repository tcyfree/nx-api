<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/25
 * Time: 13:51
 */

namespace app\lib\exception;


class UserException extends BaseException
{
    public $code = 404;
    public $msg = '用户不存在';
    public $errorCode = 60000;
}