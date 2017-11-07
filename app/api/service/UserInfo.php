<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: probe <1946644259@qq.com>
// +----------------------------------------------------------------------
// | DateTime: 2017/11/7/14:23
// +----------------------------------------------------------------------

namespace app\api\service;
use app\api\model\UserInfo as UserInfoModel;
use app\lib\exception\ParameterException;

class UserInfo
{
    /**
     * 编辑用户信息时，昵称不可重复
     *
     * @param $uid
     * @param $nickname
     * @return bool
     * @throws ParameterException
     */
    public function checkNicknameUpdate($uid,$nickname)
    {
        $res = UserInfoModel::get(['user_id' => $uid,'nickname' => $nickname]);
        if($res){
            return true;
        }
        $result = $this->checkUnionNickname($nickname);
        if($result){
            throw new ParameterException(
                [
                    'msg' => "'".$nickname."'已经存在了,换一个修改名称吧"
                ]);
        }
    }

    /**
     * 判断用户昵称是否唯一
     *
     * @param $nickname
     * @return bool
     */
    public function checkUnionNickname($nickname)
    {
        $result = UserInfoModel::get(['nickname' => $nickname]);
        if($result) {
            return true;
        }
        return false;
    }
}