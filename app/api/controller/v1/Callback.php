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
// | DateTime: 2017/10/16/11:10
// +----------------------------------------------------------------------

namespace app\api\controller\v1;
use app\api\controller\BaseController;
use app\api\model\Callback as CallbackModel;
use app\api\model\TaskUser as TaskUserModel;
use think\Db;
use think\Exception;

class Callback extends BaseController
{

    /**
     * callback.sh每秒执行此接口
     *
     */
    public function doCallback()
    {
        $this->checkIPWhiteList();
        $callback_array = CallbackModel::whereTime('deadline','<=',time())->where('status','neq',1)->select()->toArray();
        $file = $_SERVER['DOCUMENT_ROOT'].'/linux/callback.log';
        if ($callback_array){
            foreach ($callback_array as $v){
                switch ($v['key_type']){
                    case 0:
                        Db::startTrans();
                        try{
                            TaskUserModel::update(['finish' => 1, 'update_time' => time()],
                                ['task_id' => $v['key_id'], 'user_id' => $v['user_id']]);
                            CallbackModel::update(['status' => 1, 'update_time' => time()],
                                ['id' => $v['id']]);
                            Db::commit();
                            file_put_contents($file, TaskUserModel::getLastSql().' && '.CallbackModel::getLastSql().' '.
                                date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
                        }catch (Exception $ex) {
                            Db::rollback();
                            throw $ex;
                        }

                        break;
                    default:
                        continue;
                }
            }
            return;
        }
//        file_put_contents($file, 'callback_'.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
    }
}