<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/2
 * Time: 2:15
 */

namespace app\lib\exception;


class UpdateNumException extends BaseException
{
    public $code = 403;
    public $msg = '本月修改次数已达3次！';
    public $errorCode = 10000;
}