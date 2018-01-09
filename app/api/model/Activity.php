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

class Activity extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public static function checkActivityExists($activity_id)
    {
        $res = self::get(['uuid' => $activity_id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '课程不存在，请检查ID: '.$activity_id
            ]);
        }
        return $res;
    }
}