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
// | DateTime: 2017/8/29/9:15
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\ActPlanNew;
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanRecord as ActPlanRecordModel;
use app\api\validate\ActPlanUpdate;
use app\lib\exception\SuccessMessage;
use app\api\service\Token as TokenService;

class ActPlan extends BaseController
{
    /**
     * 创建行动计划
     * @return \think\response\Json
     */
    public function createActPlan()
    {
        (new ActPlanNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $id = uuid();
        $dataArray = input('post.');
        $dataArray['id'] = $id;
        ActPlanModel::create($dataArray);

        $data['act_plan_id'] = $id;
        $data['user_id'] = $uid;
        $data['type']    = 0;
        ActPlanRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 编辑行动社
     * @return \think\response\Json
     */
    public function updateActPlan()
    {
        $validate = new ActPlanUpdate();
        $validate->goCheck();
        $data['user_id'] = TokenService::getCurrentUid();
        $dataArray = $validate->getDataByRule(input('put.'));
        $id = $dataArray['id'];
        ActPlanModel::update($dataArray,['id' => $id]);

        $data['act_plan_id'] = $id;
        $data['type'] = 1;
        ActPlanRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }
}