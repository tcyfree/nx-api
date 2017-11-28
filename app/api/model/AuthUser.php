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
     * 1.第一次设置即创建管理权限auth若未空，则直接返回
     * 2.更新用户如果auth为空,则将auth_user == time(),同时更新用户身份为2
     *
     * @param $data
     * @throws Exception
     */
    public static function createOrUpdate($data)
    {
        $res = self::get(['to_user_id' => $data['to_user_id'],'community_id' => $data['community_id'],'delete_time' => 0]);
        Db::startTrans();
        try{
            if(!$res){
                if (!$data['auth']){
                    return;
                }
                self::create($data);
                CommunityUserModel::update(['type' => 1],
                    ['user_id' => $data['to_user_id'],'community_id'=> $data['community_id']]);

            }else{
                if (!$data['auth']){
                    CommunityUserModel::update(['type' => 2],
                        ['user_id' => $data['to_user_id'],'community_id'=> $data['community_id']]);
                    self::update(['delete_time' => time()],['id' => $res->id]);
                }

                self::update($data,['id' => $res->id]);

            }
            Db::commit();
        }catch (Exception $ex) {
            Db::rollback();
            throw $ex;
        }

    }

    /**
     * 获取授权管理用户权限
     * 对应身份
     *
     * @param $uid
     * @param $community_id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function getAuthUserWithCommunity($uid,$community_id)
    {
        $auth = self::where(['to_user_id' => $uid, 'community_id' => $community_id, 'delete_time' => 0])
            ->field('auth')->find();
        if ($auth) $auth = $auth->toArray();
        $community_user = CommunityUserModel::where(['user_id' => $uid, 'community_id' => $community_id, 'delete_time' => 0])
            ->field('type')->find();
        if ($community_user) $community_user = $community_user->toArray();

        if (is_array($auth) && is_array($community_user)){
            return  array_merge($auth,$community_user);
        }elseif (is_array($community_user)){
            $community_user['auth'] = null;
            return  $community_user;
        }
    }

}