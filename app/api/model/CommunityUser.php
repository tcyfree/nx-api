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

    public static function getCommunityMemberNum($user_id){
        $where['user_id'] = $user_id;
        $where['status'] = ['neq',1];

        $result = self::with('community')->where($where)->select();
        return $result;
    }
}