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

    public static function checkCommunicationExists($id){
        $res = self::get(['id' => $id]);
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
     * @param $uid
     * @param $page
     * @param $size
     * @param $community_id
     * @return \think\Paginator
     */
    public static function getList($uid,$page,$size,$community_id)
    {
        $where['community_id'] = $community_id;
        $pageData = self::with('userInfo')
            ->where($where)
            ->order('create_time desc')
            ->paginate($size,true,['page' => $page]);

        return $pageData;
    }
}