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
// | DateTime: 2018/1/9/10:29
// +----------------------------------------------------------------------

namespace app\api\model;

use app\api\model\Course as CourseModel;
use app\lib\exception\ParameterException;

class CourseUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];

    public function user()
    {
        return  $this->hasOne('UserInfo','user_id','user_id');
    }

    public static function checkCourseBelongsToUser($uid, $course_id)
    {
        $res = self::get(['course_id' => $course_id,'user_id' => $uid]);
        if($res){
            throw new ParameterException([
                'msg' => '你已报名该课程了，选择其它课程吧'
            ]);
        }
        return $res;
    }

    /**
     * 记录购买课程
     *
     * @param $uid
     * @param $course_id
     */
    public static function postCourseUser($uid, $course_id)
    {
        $data['user_id'] = $uid;
        $data['course_id'] = $course_id;
        self::create($data);

        //更新购买人数
        CourseModel::where('uuid',$course_id)->setInc('buy_count');
    }

    /**
     * 获取最近参加人数信息
     *
     * @param $course_id
     * @param int $limit
     * @return false|\PDOStatement|string|\think\Collection
     */
    public static function getTheLastJoin($course_id, $limit = 5)
    {
        $where['finish'] = 0;
        $where['course_id'] = $course_id;

        $res = self::with('user')
            ->where($where)
            ->limit($limit)
            ->order('id DESC')
            ->select()
            ->visible(['user.nickname','user.avatar']);

        return $res;
    }
}