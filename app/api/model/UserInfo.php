<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:24
 */

namespace app\api\model;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;

class UserInfo extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','unionid',];

    public function community()
    {
        return $this->hasMany('CommunityUser','user_id','user_id');
    }

    /**
     * 读取器自动拼接图片URL
     * @param $value
     * @return string
     */
    public function getAvatarAttr($value){
        return config('setting.img_prefix').$value;
    }

    /**
     * 根据unionid查找用户是否存在
     * @param $unionid
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function getByOpenID($unionid)
    {
        $user = self::where('unionid', '=', $unionid)
            ->find();
        return $user;
    }

    /**
     * 用户中心首页
     * @return mixed
     */
    public static function userCenter()
    {
        $uid = TokenService::getCurrentUid();
        $userInfo = self::where('user_id', $uid)->find();
        if(!$userInfo){
            throw new UserException([
                'msg' => '用户不存在',
                'errorCode' => 60001
            ]);
        }

        $user_last_time = UserModel::last_login_time($uid);

        $CU = new CommunityUser();
        //所拥有的社群
        $where['user_id'] = $uid;
        $where['type']    = 0;
        $comIdOwnArray = $CU->where($where)->field('community_id')->select()->toArray();
        //新增用户
        $newUserNum = 0;
        foreach ($comIdOwnArray as $value){
            $newUserNum += $CU->where('community_id',$value['community_id'])
                             ->whereTime('create_time','>=', $user_last_time)
                             ->count('user_id');
        }
        echo $newUserNum;
        //总用户数
        $totalUserNum = 0;
        foreach ($comIdOwnArray as $value){
            $totalUserNum += $CU->where('community_id',$value['community_id'])
                ->count('user_id');
        }

        echo $totalUserNum;

//        echo $CU->getLastSql();
//        echo $newUserNum;
        //总用户数
        exit(1);
        return $userInfo->hidden(['wallet','email']);
    }

}