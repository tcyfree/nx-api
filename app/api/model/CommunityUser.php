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


use app\lib\exception\ParameterException;

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
     * @param $type
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function getSummaryByUser($uid, $type, $page = 1, $size = 15)
    {
        $where['user_id'] = $uid;
        $where['status']  = ['neq',1];
        if($type == 2){
            $pagingData = self::with('community')
                ->where(function ($query){
                    $query->where('type',0)->whereOr('type',1);
                })
                ->where($where)
                ->order('create_time desc')
                ->paginate($size, true, ['page' => $page]);
        }else{
            $pagingData = self::with('community')
                ->where($where)
                ->order('create_time desc')
                ->paginate($size, true, ['page' => $page]);
        }

        return $pagingData;
    }
    /**
     * 行动社成员
     */
    public function member()
    {
        return $this->belongsTo('UserInfo','user_id','user_id')->order('user_id asc');
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

    /**
     * 判断此行动社是否是该用户
     * @param $uid
     * @param $community_id
     * @return null|static
     * @throws ParameterException
     */
    public static function checkCommunityBelongsToUser($uid,$community_id)
    {
        $res = self::get(['user_id' => $uid, 'community_id' => $community_id]);
        if (!$res){
            throw new ParameterException([
                'msg' => '此行动社不是你的！'
            ]);
        }

        return $res;
    }
}