<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 15:52
 */

namespace app\api\model;

use app\api\model\CommunityUser as CommunityUserModel;
use think\Db;
use think\Exception;

class AuthUser extends BaseModel
{
    protected $autoWriteTimestamp = true;

    protected $hidden = ['create_time','update_time','delete_time'];

    /**
     * 创建或更新用户权限
     * 1.更新用户身份
     *
     * @param $data
     * @throws Exception
     */
    public static function createOrUpdate($data)
    {
        $res = self::get(['to_user_id' => $data['to_user_id'],'community_id' => $data['community_id']]);

        if(!$res){
            Db::startTrans();
            try{
                self::create($data);
                CommunityUserModel::update(['type' => 1],
                    ['user_id' => $data['to_user_id'],'community_id'=> $data['community_id']]);
            }catch (Exception $ex){
                throw $ex;
            }

        }else{
            self::update($data,['to_user_id' => $data['to_user_id'],'community_id' => $data['community_id']]);
        }
    }

}