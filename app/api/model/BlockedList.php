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
// | DateTime: 2017/9/11/9:36
// +----------------------------------------------------------------------

namespace app\api\model;

use app\api\model\User as UserModel;
use app\lib\exception\ParameterException;

class BlockedList extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 加入黑名单
     * @param $uid
     * @param $blocked_user_id
     */
    public static function blockUser($uid, $blocked_user_id)
    {
        UserModel::checkUserExists($blocked_user_id);
        self::checkRecordExists($uid, $blocked_user_id);
        self::create(['user_id' => $uid, 'blocked_user_id' => $blocked_user_id]);

    }

    /**
     * 1. 自己不能把自己加入黑名单
     * 2. 检查是否重复添加
     * @param $uid
     * @param $blocked_user_id
     * @throws ParameterException
     */
    public static function checkRecordExists($uid, $blocked_user_id)
    {
        if($uid == $blocked_user_id){
            throw new ParameterException([
                'msg' => '自己不能把自己加入黑名单！'
            ]);
        }

        $res = self::get(['user_id' => $uid, 'blocked_user_id' => $blocked_user_id]);
        if ($res){
            throw new ParameterException([
                'msg' => '该用户已经被加入黑名单了'
            ]);
        }
    }

}