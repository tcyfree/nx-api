<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/2
 * Time: 2:15
 */

namespace app\lib\exception;


use app\lib\enum\AllowJoinStatusEnum;

class UpdateNumException extends BaseException
{
    public $code = 403;
    public $msg = '本月修改次数已达'.AllowJoinStatusEnum::ALLOW_EDIT_TIME.'次！,下个月再编辑吧';
    public $errorCode = 10000;
}