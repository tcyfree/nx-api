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
// | DateTime: 2017/12/29/11:21
// +----------------------------------------------------------------------

namespace app\api\controller\v2;

use app\api\controller\BaseController;
use app\api\validate\ActPlanNew;
use app\api\service\Token as TokenService;
use app\api\service\Community as CommunityService;
use app\api\model\Community as CommunityModel;
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanRecord as ActPlanRecordModel;
use app\lib\exception\SuccessMessage;

class ActPlan extends BaseController
{
    /**
     * 创建行动计划
     * 1.鉴权
     * @return \think\response\Json
     */
    public function createActPlan()
    {
        (new ActPlanNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $id = uuid();
        $dataArray = input('post.');
        $dataArray['id'] = $id;

        $c_obj = new CommunityService();
        $auth_array[0] = 1;
        $c_obj->checkManagerAuthority($uid,$dataArray['community_id'],$auth_array);

        CommunityModel::checkCommunityExists($dataArray['community_id']);
        ActPlanModel::create($dataArray);

        $data['act_plan_id'] = $id;
        $data['user_id'] = $uid;
        $data['type']    = 0;
        ActPlanRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

}