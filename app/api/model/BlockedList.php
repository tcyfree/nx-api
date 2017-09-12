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

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','blocked_user_id');
    }

    /**
     * 加入黑名单
     * @param $uid
     * @param $blocked_user_id
     * @throws ParameterException
     */
    public static function blockUser($uid, $blocked_user_id)
    {
        UserModel::checkUserExists($blocked_user_id);
        $where['user_id'] = $uid;
        $where['blocked_user_id'] = $blocked_user_id;
        $where['delete_time'] = 0;
        $res = self::checkRecordExists($where);
        if ($res){
            throw new ParameterException([
                'msg' => '该用户已经被加入黑名单了'
            ]);
        }
        self::create(['user_id' => $uid, 'blocked_user_id' => $blocked_user_id]);

    }

    /**
     * 1. 自己不能把自己加入黑名单
     * 2. 检查是否重复添加
     * @param $where
     * @return null|static
     * @throws ParameterException
     */
    public static function checkRecordExists($where)
    {
        if($where['user_id'] == $where['blocked_user_id']){
            throw new ParameterException([
                'msg' => '自己不能把自己列入黑名单！'
            ]);
        }

        $res = self::get($where);

        return $res;
    }

    /**
     * 分页获取我的黑名单列表
     * @param $uid
     * @param $page
     * @param $size
     * @return \think\Paginator
     */
    public static function getBlockedList($uid, $page, $size)
    {
        $where['user_id'] = $uid;
        $where['delete_time'] = ['eq',0];

        $pagingData = self::with('userInfo')
            ->where($where)
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 解除黑名单
     * @param $uid
     * @param $blocked_user_id
     * @throws ParameterException
     */
    public static function deleteBlockUser($uid,$blocked_user_id)
    {
        $where['user_id'] = $uid;
        $where['blocked_user_id'] = $blocked_user_id;
        $where['delete_time'] = 0;
        $res = self::checkRecordExists($where);
        if (!$res){
            throw new ParameterException();
        }

        self::update(['delete_time' => time()],$where);
    }
}