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
use think\Db;
use think\Exception;
use app\api\model\TaskUser as TaskUserModel;

class TaskAccelerate extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    /**
     * 用户的普通任务加速
     * @param $uid
     * @param $data
     * @throws Exception
     */
    public static function accelerateTask($uid,$data){
        $ts_obj = new TaskService();

        Db::startTrans();
        try{
            $ts_obj->checkAccelerateTask($data);
            $dataArray['from_user_id'] = $uid;
            $dataArray['user_id'] = $data['user_id'];
            $dataArray['task_id'] = $data['task_id'];
            self::create($dataArray);
            TaskUserModel::newTaskUser($data['user_id'],  $data['task_id']);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

    }
}