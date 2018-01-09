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
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanRecord as ActPlanRecordModel;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\AuthUser;
use app\api\model\AuthUser as AuthUserModel;
use app\api\model\Community as CommunityModel;
use app\api\service\ActPlan as ActPlanService;
use app\api\service\Community as CommunityService;
use app\api\service\Token as TokenService;
use app\api\validate\ActPlanNew;
use app\api\validate\ActPlanSummaryList;
use app\api\validate\ActPlanUpdate;
use app\api\validate\PagingParameter;
use app\api\validate\SearchName;
use app\lib\exception\ParameterException;
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
        CommunityModel::checkCommunityExists($dataArray['community_id']);
        $c_obj = new CommunityService();
        $auth_array[0] = 1;
        $c_obj->checkManagerAuthority($uid,$dataArray['community_id'],$auth_array);
        ActPlanModel::create($dataArray);

        $data['act_plan_id'] = $id;
        $data['user_id'] = $uid;
        $data['type']    = 0;
        ActPlanRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 编辑行动计划
     * 1.鉴权
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function updateActPlan()
    {
        $validate = new ActPlanUpdate();
        $validate->goCheck();
        $uid = TokenService::getCurrentUid();
        $data['user_id'] = $uid;
        $dataArray = $validate->getDataRules(input('put.'));
        $id = $dataArray['id'];

        $ap_obj = ActPlanModel::get(['id' => $id]);
        if(!$ap_obj){
            throw new ParameterException();
        }else{
            $c_obj = new CommunityService();
            $auth_array[0] = 1;
            $c_obj->checkManagerAuthority($uid,$ap_obj->community_id,$auth_array);
        }

        ActPlanModel::update($dataArray,['id' => $id]);

        $data['act_plan_id'] = $id;
        $data['type'] = 1;
        ActPlanRecordModel::create($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 根据行动计划名称模糊查询
     * @param $name
     * @param $page
     * @param $size
     * @return array
     */
    public function searchActPlan($name, $page, $size)
    {
        (new SearchName())->goCheck();
        (new PagingParameter())->goCheck();

        $pagingData = ActPlanModel::searchActPlan($name, $page, $size);
        $data = $pagingData->visible(['id','name', 'description', 'cover_image', 'community_id'])
            ->toArray();

        $act_plan_service = new ActPlanService();
        $data = $act_plan_service->getType($data);

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 获取用户参加的行动社
     * @param $page
     * @param $size
     * @return array
     */
    public function joinActPlanByUser($page, $size)
    {
        (new PagingParameter())->goCheck();

        $uid = TokenService::getCurrentUid();
        $pagingData = ActPlanUserModel::actPlanByUser($uid, $page,$size);

        $data = $pagingData->visible(['finish','act_plan.id','act_plan.name','act_plan.description','act_plan.cover_image','act_plan.community_id'])
            ->toArray();
        foreach ($data as &$v){
            $community_name = CommunityModel::where(['id' => $v['act_plan']['community_id']])->field('name')->find();
            $v['act_plan']['community_name'] = $community_name['name'];
            $v['act_plan']['auth'] = AuthUserModel::getAuthUserWithCommunity($uid,$v['act_plan']['community_id']);
        }


        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 根据行动社分页查找对应行动计划列表
     * @return array
     */
    public function getSummaryListByCommunity()
    {
        (new ActPlanSummaryList())->goCheck();
        $data = input('get.');
        $pagingData = ActPlanModel::actPlanByList($data);

        $data = $pagingData->hidden(['fee','create_time','update_time','delete_time','community_id','mode'])
            ->toArray();

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }
}