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

use app\lib\exception\ParameterException;
use app\api\model\Course as CourseModel;

class CourseUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];

    public static function checkActivityBelongsToUser($uid, $course_id)
    {
        $res = self::get(['activity_id' => $course_id,'user_id' => $uid]);
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
}