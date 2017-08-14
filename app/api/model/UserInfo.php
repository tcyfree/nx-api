<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:24
 */

namespace app\api\model;


class UserInfo extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public static function getByOpenID($unionid)
    {
        $user = self::where('unionid', '=', $unionid)
            ->find();
        return $user;
    }
}