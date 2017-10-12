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
// | DateTime: 2017/10/11/10:18
// +----------------------------------------------------------------------

namespace app\api\model;


class TaskFeedbackUsers extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * 查找该行动社已分配社长和管理员ID
     * @param $community_id
     * @return array
     */
    public static function getUserIDS($community_id)
    {
        $where['community_id'] = $community_id;
        $res = self::where($where)
            ->field('user_id')
            ->select()->toArray();
        return $res;
    }
}