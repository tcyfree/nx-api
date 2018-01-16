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
use app\api\model\Community as CommunityModel;

class Course extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];

    public static function checkCourseExists($course_id)
    {
        $res = self::get(['uuid' => $course_id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '课程不存在，请检查ID: '.$course_id
            ]);
        }
        return $res;
    }

    public static function getList($community_id,$page,$size)
    {
        CommunityModel::checkCommunityExists($community_id);
        $where['community_id'] = $community_id;
        $where['delete_time'] = 0;
        $res = self::where($where)
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);
        return $res;
    }
}