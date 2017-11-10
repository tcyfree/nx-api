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
// | DateTime: 2017/9/19/10:23
// +----------------------------------------------------------------------

namespace app\api\model;


use app\lib\exception\ParameterException;

class Communication extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    public function community()
    {
        return $this->hasOne('Community','id','community_id');
    }

    /**
     * 判断条目是否存在
     * 1. delete_time = 0
     *
     * @param $id
     * @return null|static
     * @throws ParameterException
     */
    public static function checkCommunicationExists($id){
        $res = self::get(['id' => $id, 'delete_time' => 0]);
        if (!$res){
            throw new ParameterException([
                'msg' => '交流内容不存在，请检查ID'
            ]);
        }else{
            return $res;
        }
    }

    /**
     * 交流区列表
     *
     * @param $page
     * @param $size
     * @param $community_id
     * @return \think\Paginator
     */
    public static function getList($page,$size,$community_id)
    {
        $where['community_id'] = $community_id;
        $where['delete_time'] = 0;
        $pageData = self::with('userInfo')
            ->where($where)
            ->order('create_time desc')
            ->paginate($size,true,['page' => $page]);
        return $pageData;
    }

    /**
     * 用户自己发布的条目列表
     *
     * @param $page
     * @param $size
     * @param $uid
     * @return \think\Paginator
     */
    public static function getListByUser($page, $size, $uid)
    {
        $where['delete_time'] = 0;
        $where['user_id'] = $uid;
        $pageData = self::with('community')
            ->where($where)
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);
        return $pageData;
    }
}