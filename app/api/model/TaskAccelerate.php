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
// | DateTime: 2017/9/14/18:58
// +----------------------------------------------------------------------

namespace app\api\model;

use app\api\service\Task as TaskService;
use app\lib\exception\AcceleateTaskException;

class TaskAccelerate extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 用户的普通任务加速
     * @param $uid
     * @param $data
     * @throws AcceleateTaskException
     */
    public static function accelerateTask($uid,$data){
        $where['from_user_id'] = $uid;
        $where['user_id'] = $data['user_id'];
        $where['task_id'] = $data['task_id'];
        $res = self::get($where);
        if ($res){
            throw new AcceleateTaskException();
        }

        $ts_obj = new TaskService();
        $ts_obj->checkAccelerateTaskMode($data);

        self::create($where);
    }
}