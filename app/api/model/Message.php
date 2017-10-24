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
// | DateTime: 2017/10/24/14:56
// +----------------------------------------------------------------------

namespace app\api\model;


class Message extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    public function toUserInfo()
    {
        return $this->hasOne('UserInfo','user_id','to_user_id');
    }

    public static function getMessageList($page,$size,$uid,$to_uid)
    {
        $where['user_id'] = $uid;
        $where['to_user_id'] = $to_uid;
        $where['delete_time'] = ['eq',0];
        $pageData = self::with('userInfo,toUserInfo')
            ->where($where)
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);

        return $pageData;
    }
}