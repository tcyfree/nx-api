<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/27
 * Time: 16:07
 */

namespace app\lib\exception;


class AcceleateTaskException extends BaseException
{
    public $code = 400;
    public $msg = '该任务已经被加速过哦！';
    public $errorCode = 10000;
}