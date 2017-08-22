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
    public $code = 404;
    public $msg = '行动社不存在，请检查ID';
    public $errorCode = 80000;
}