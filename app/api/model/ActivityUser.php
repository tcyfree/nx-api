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
// | DateTime: 2018/1/9/10:27
// +----------------------------------------------------------------------

namespace app\api\model;

use app\lib\exception\ParameterException;
use app\api\model\Community as CommunityModel;
use app\api\model\Activity as ActivityModel;

class ActivityUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];

    public function user()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }
    public static function checkActivityBelongsToUser($uid,$activity_id)
    {
        $res = self::get(['activity_id' => $activity_id,'user_id' => $uid]);
        if($res){
            throw new ParameterException([
                'msg' => '你已报名该活动了，选择其它活动吧'
            ]);
        }
        return $res;
    }

    /**
     * 记录参加
     *
     * @param $uid
     * @param $data
     */
    public static function postActivityUser($uid, $data)
    {
        $data['user_id'] = $uid;
        (new ActivityUser())->allowField(true)->save($data);

        //更新参加人数
        ActivityModel::where('uuid',$data['activity_id'])->setInc('join_count');
    }

    public static function getList($activity_id,$page,$size)
    {
        ActivityModel::checkActivityExists($activity_id);
        $where['activity_id'] = $activity_id;
        $res = self::with('user')
            ->where($where)
            ->order('create_time DESC')
            ->paginate($size,false,['page' => $page]);
        return $res;
    }

    /**
     * 获取最近参加人数信息
     *
     * @param $activity_id
     * @param int $limit
     * @return mixed
     */
    public static function getTheLastJoin($activity_id, $limit = 5)
    {
        $where['activity_id'] = $activity_id;

        $res = self::with('user')
            ->where($where)
            ->limit($limit)
            ->order('id DESC')
            ->select()
            ->visible(['user.nickname','user.avatar']);

        return $res;
    }


}