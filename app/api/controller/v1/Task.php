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
// | DateTime: 2017/8/29/13:34
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\ActPlanUser;
use app\api\validate\TaskList;
use app\api\validate\TaskNew;
use app\api\service\Token as TokenService;
use app\api\model\Task as TaskModel;
use app\api\model\TaskRecord as TaskRecordModel;
use app\api\validate\TaskUpdate;
use app\lib\exception\SuccessMessage;
use app\api\model\ActPlan as ActPlanModel;
use app\api\service\Community as CommunityService;
use think\Exception;
use think\Db;

class Task extends BaseController
{
    /**
     * 创建任务
     * @return \think\response\Json
     * @throws Exception
     */
    public function createTask()
    {
        (new TaskNew())->goCheck();
        $data['user_id'] = TokenService::getCurrentUid();
        $id = uuid();

        $dataArray = input('post.');
        ActPlanModel::checkActPlanExists($dataArray['act_plan_id']);
        $dataArray['id'] = $id;

        Db::startTrans();
        try {
            TaskModel::create($dataArray);
            //更新任务数
            $where['id'] = $dataArray['act_plan_id'];
            ActPlanModel::where($where)->setInc('task_num');

            $data['task_id'] = $id;
            $data['type'] = 0;
            TaskRecordModel::create($data);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 编辑任务
     */
    public function updateTask()
    {
        $validate = new TaskUpdate();
        $validate->goCheck();
        $data['user_id'] = TokenService::getCurrentUid();

        $dataArray = $validate->getDataByRule(input('put.'));
        TaskModel::update($dataArray,['id' => $dataArray['id']]);

        $data['task_id'] = $dataArray['id'];
        $data['type'] = 1;
        TaskRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 任务列表
     * @param $id
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getSummaryList($id,$page = 1, $size = 15)
    {
        (new TaskList())->goCheck();

        $uid = TokenService::getCurrentUid();
        CommunityService::checkJoinCommunityByUser($uid,$id);
        $pagingData = TaskModel::getSummaryList($id, $page, $size);
        $data['task'] = $pagingData->visible(['id','name'])
            ->toArray();
        $res = ActPlanUser::get(['act_plan_id' => $id, 'user_id' => $uid]);
        $data['flag'] = '0';
        if ($res){
            $data['flag'] = '1';
        }
        $res_data = ActPlanModel::checkActPlanExists($id);
        $data['mode'] = $res_data['mode'];
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }
}