<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/27
 * Time: 16:07
 */

namespace app\lib\exception;


class CommunityException extends BaseException
{
    public $code = 403;
    public $msg = '社群不存在，请检查ID';
    public $errorCode = 80001;
}