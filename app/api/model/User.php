<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:24
 */

namespace app\api\model;


class User extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public static function last_login_time($uid)
    {
        return (self::where('id',$uid)->field('last_login_time')->find()->toArray())['last_login_time'];
    }
}