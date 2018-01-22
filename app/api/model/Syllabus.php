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
// | DateTime: 2018/1/9/15:00
// +----------------------------------------------------------------------

namespace app\api\model;


use app\lib\exception\ParameterException;
use app\api\model\Course as CourseModel;

class Syllabus extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];
    public static function getList($course_id,$page,$size)
    {
        $where['course_id'] = $course_id;
        $where['delete_time'] = 0;
        $res = self::where($where)
            ->order('create_time DESC')
            ->paginate($size,false,['page' => $page]);
        return $res;
    }

    public static function checkExists($uuid)
    {
        $res = self::get(['uuid' => $uuid]);
        if (!$res){
            throw new ParameterException([
                'msg' => '该课时不存在，检查ID: '.$uuid
            ]);
        }
        return $res;
    }

    public static function getCommunity($uuid)
    {
        $res = self::checkExists($uuid);
        $data = CourseModel::checkCourseExists($res['course_id']);
        return $data;
    }
}