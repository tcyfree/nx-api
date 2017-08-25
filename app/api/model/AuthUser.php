<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 15:52
 */

namespace app\api\model;


class AuthUser extends BaseModel
{
    protected $autoWriteTimestamp = true;

    protected $hidden = ['create_time','update_time','delete_time'];

}