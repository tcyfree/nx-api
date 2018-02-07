<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\service;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\User as UserModel;
use app\lib\exception\ParameterException;
use app\lib\exception\UserException;

class User
{
    /**
     * 获取授权人并判断是否加入此社群
     * @param $number
     * @param $community_id
     * @return mixed
     * @throws ParameterException
     * @throws UserException
     */
    public static function getManagerUser($number,$community_id)
    {
        $user = UserModel::get(['number' => $number]);
        if(!$user){
            throw new UserException([
                'msg' => '用户不存在'
            ]);
        }
        $user = $user->toArray();
        $user_id = $user['id'];

        $res = CommunityUserModel::get(['user_id' => $user_id, 'community_id' => $community_id]);
        if(!$res)
        {
            throw new ParameterException([
                'msg' => '该用户还未加入本社群'
            ]);
        }
        $res = $res->toArray();
        if($res['type'] == 0)
        {
            throw new  ParameterException([
                'msg' => '自己不能将自己设置为管理员'
            ]);
        }elseif (!$res['pay']){
            throw new ParameterException([
                'msg' => '该用户不是付费用户'
            ]);
        }

        return $user_id;
    }
}