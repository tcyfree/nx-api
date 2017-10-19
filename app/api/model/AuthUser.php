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

    /**
     * 创建或更新用户权限
     * @param $data
     */
    public static function createOrUpdate($data)
    {
        $res = self::get(['to_user_id' => $data['to_user_id'],'community_id' => $data['community_id']]);
        $res = $res->toArray();
        if(!$res){
            self::create($data);
        }else{
            self::update($data,['to_user_id' => $data['to_user_id'],'community_id' => $data['community_id']]);
        }
    }

}