<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/19
 * Time: 18:24
 */

namespace app\api\model;
use app\lib\exception\UserException;

class User extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['username','password','update_time'];

    public function info()
    {
        return $this->hasOne('UserInfo','user_id','id');
    }
    public static function last_login_time($uid)
    {
        $arr = (self::where('id',$uid)->field('last_login_time')->find()->toArray());
        return $arr['last_login_time'];
    }

    /**
     * 根据用户编号ID判断用户是否存在
     * 返回用户模型
     * @param $number
     * @return null|static
     * @throws UserException
     */
    public static function userInfo($number)
    {
        $user = self::get(['number' => $number]);
        if(!$user){
            throw new UserException([
                'msg' => '用户不存在',
                'errorCode' => 60001
            ]);
        }

        return $user;
    }

    /**
     * 根据用户ID判断是否存在
     * @param $id
     * @return null|static
     * @throws UserException
     */
    public static function checkUserExists($id)
    {
        $user = self::get(['id' => $id]);

        if(!$user){
            throw new UserException([
                'msg' => '用户不存在',
                'errorCode' => 60001
            ]);
        }

        return $user;
    }

    public static function getSum()
    {
        return self::count();
    }

    /**
     * 用户列表
     *
     * @param $page
     * @param $size
     * @return \think\Paginator
     */
    public static function getList($page,$size)
    {
        $pageData = self::with('info')
            ->order('create_time ASC')
            ->field('id,number,status,reg_ip,create_time')
            ->paginate($size, false, ['page' => $page]);

        return $pageData;
    }

}