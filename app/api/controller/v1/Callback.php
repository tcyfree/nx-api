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
use app\api\model\Task as TaskModel;
use app\api\model\TaskFeedback as TaskFeedbackModel;
use think\Exception;
use think\Log;

class Callback extends BaseController
{

    /**
     * callback.sh每秒执行此接口
     * 1 挑战模式不通过此接口结束任务
     * 2 24小时反馈回调
     * 3 去掉白名单检查
     * 4 记录错误信息
     * 5 统一日志记录位置
     *
     */
    public function doCallback()
    {
//        $this->checkIPWhiteList();
        $where['status'] = 0;
        $callback_array = CallbackModel::whereTime('deadline','<=',time())->where($where)->select()->toArray();
        $log_time = LOG_PATH.'callback_time.log';
//        file_put_contents($log_time,CallbackModel::getLastSql(). ' '.date('Y-m-d H:i:s')."\r\n",FILE_APPEND);
        $log = LOG_PATH.'callback.log';
//        file_put_contents($log,date('Y-m-d H:i:s')."\r\n",FILE_APPEND);
        try{
            if ($callback_array){
                foreach ($callback_array as $v){
                    switch ($v['key_type']){
                        case 0:
                            TaskModel::missionComplete($v,$log);
                            break;
                        case 1:
                            TaskFeedbackModel::withinTwentyFourHours($v,$log);
                            break;
                        default:
                            continue;
                    }
                }
                return;
            }
        }catch (Exception $ex){
            throw $ex;
        }

    }

}