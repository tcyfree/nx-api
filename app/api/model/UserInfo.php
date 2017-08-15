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
    protected $hidden = ['create_time','update_time','openid','unionid',];
    //读取器自动拼接图片URL
    public function getAvatarAttr($value){
//        return $this->prefixImgUrl($value, $data);
        return config('setting.img_prefix').$value;
    }
    public static function getByOpenID($unionid)
    {
        $user = self::where('unionid', '=', $unionid)
            ->find();
        return $user;
    }
}