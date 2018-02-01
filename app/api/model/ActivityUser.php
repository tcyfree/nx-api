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
     * @param $activity_id
     */
    public static function postActivityUser($uid, $activity_id)
    {
        $data['user_id'] = $uid;
        $data['activity_id'] = $activity_id;
        self::create($data);

        //更新参加人数
        ActivityModel::where('uuid',$activity_id)->setInc('join_count');
    }


}