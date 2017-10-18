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
// | DateTime: 2017/10/18/9:40
// +----------------------------------------------------------------------

namespace app\api\model;

use app\api\model\TaskUser as TaskUserModel;

class Execution extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * 行动力记录
     *
     * @param $page
     * @param $size
     * @param $uid
     * @return \think\Paginator
     */
    public static function executionTrackerList($page, $size, $uid)
    {
        $where['user_id'] = $uid;
        $where['finish']  = 1;
        $where['tag']     = 1;
        $pageData = TaskUserModel::with('task,task.actPlan,task.actPlan.community')
            ->where($where)
            ->order('update_time DESC')
            ->paginate($size,true,['page' => $page]);
        return $pageData;
    }
}