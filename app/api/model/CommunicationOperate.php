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
// | DateTime: 2017/9/19/16:25
// +----------------------------------------------------------------------

namespace app\api\model;


class CommunicationOperate extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    /**
     * 获取交流点赞人相关信息
     *
     * @param $communication_id
     * @return mixed
     */
    public static function getFavorUser($communication_id)
    {
        $res = self::with('userInfo')
            ->where(['communication_id' => $communication_id,'type' => '1','delete_time' => 0])
            ->order('create_time DESC')
            ->select();

        return $res->hidden(['user_info.profile','user_info.email','user_info.signature','user_info.openid']);
    }



}