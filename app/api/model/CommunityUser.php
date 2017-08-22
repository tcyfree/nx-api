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

namespace app\api\model;


class CommunityUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time'];
    public function community(){
        return $this->hasMany('Community','id','community_id');
    }

    /**
     * 根据用户获取行动社分页
     * @param $uid
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function getSummaryByUser($uid, $type, $page = 1, $size = 15)
    {
        $where['user_id'] = $uid;
        $whereOr = [];
        if($type == 2){
            $where['type']    = 0;
            $whereOr['type']    = 1;
        }

        $pagingData = self::with('community')->where($where)->whereOr($whereOr)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * @param $user_id
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getCommunityMemberNum($user_id){
        $where['user_id'] = $user_id;
        $where['status'] = ['neq',1];

        $result = self::with('community')->where($where)->select();
        return $result;
    }
}