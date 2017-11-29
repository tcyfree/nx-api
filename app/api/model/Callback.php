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
// | DateTime: 2017/10/16/11:09
// +----------------------------------------------------------------------

namespace app\api\model;


class Callback extends BaseModel
{
    protected $autoWriteTimestamp =true;

    /**
     * 注册定时器
     *
     * @param $key_id
     * @param $user_id
     * @param $key_type
     * @param $deadline
     */
    public static function registerCallback($key_id,$user_id,$key_type,$deadline)
    {
        self::create(['key_id' => $key_id,'user_id' => $user_id, 'key_type' => $key_type, 'deadline' => $deadline]);
    }

    /**
     * 注销回调
     *
     * @param $key_id
     * @param $user_id
     * @param $key_type
     */
    public static function unRegisterCallback($key_id, $user_id, $key_type)
    {
        self::update(['status' => 1, 'update_time' => time()],
            ['key_id' => $key_id,'user_id' => $user_id, 'key_type' => $key_type, 'status' => 0]);
    }

    /**
     * 注销回调
     *
     * @param $id
     */
    public static function cancelCallback($id = '')
    {
        self::update(['status' => 1, 'update_time' => time()],
            ['id' => $id]);
    }

}