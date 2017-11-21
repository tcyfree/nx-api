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
// | DateTime: 2017/10/26/10:42
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\TaskFeedback as TaskFeedbackModel;
use app\api\model\Callback as CallbackModel;
use app\lib\exception\SuccessMessage;
use think\Db;
use think\Exception;
use app\lib\exception\ParameterException;

class TaskFeedback
{
    /**
     * 提交反馈
     * 1 未给当前反馈人提交过反馈
     * 2 未通过审核提交反馈
     * 3 设置反馈有效时间为24小时内有效
     * 4 坑：需要将TP自带时间戳转换功能再转换成时间戳格式
     * 5.再次反馈更新审核者to_look = 0
     *
     * @param $dataRules
     * @param $uid
     * @return \think\response\Json
     * @throws Exception
     * @throws ParameterException
     */
    public function referTaskFeedback($dataRules,$uid)
    {
        $res = TaskFeedbackModel::checkTaskFeedback($uid, $dataRules['task_id']);
        if ($res == false){
            $id = uuid();
            $dataRules['id'] = $id;
            Db::startTrans();
            try{
                $result = TaskFeedbackModel::create($dataRules);
                $deadline = (int)strtotime($result['create_time']) + 86400;
                CallbackModel::create(['key_id' => $id, 'user_id' => $uid, 'deadline' => $deadline, 'key_type' => 1]);
                Db::commit();
            }catch (Exception $ex){
                Db::rollback();
                throw $ex;
            }
            return true;
//            return json(new SuccessMessage(),201);
        }elseif ($res['status'] == 1){
            if (isset($dataRules['location'])){
                TaskFeedbackModel::update(['content' => $dataRules['content'],'location' => $dataRules['location'],'status' => 0, 'update_time' => time()],
                    ['user_id' => $uid,'task_id' => $dataRules['task_id'],'status' => 1, 'to_look' => 0]);
            }else{
                TaskFeedbackModel::update(['content' => $dataRules['content'],'status' => 0, 'update_time' => time()],
                    ['user_id' => $uid,'task_id' => $dataRules['task_id'],'status' => 1, 'to_look' => 0]);
            }

//            return json(new SuccessMessage(),201);
            return true;
        }else{
            throw new ParameterException([
                'msg' => '任务待审核或审核通过了'
            ]);
        }
    }
}