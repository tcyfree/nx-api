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
// | DateTime: 2018/1/9/10:30
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\validate\PagingParameter;
use app\api\validate\PostActivityValidate;
use app\api\service\Token as TokenService;
use app\api\model\Activity as ActivityModel;
use app\api\model\Community as CommunityModel;
use app\api\service\Community as CommunityService;
use app\api\validate\PutActivityValidate;
use app\api\validate\SearchName;
use app\api\validate\UUIDValidate;
use app\lib\exception\SuccessMessage;
use app\lib\exception\ParameterException;
use app\api\model\AuthUser as AuthUserModel;
use app\api\service\CommunityUser as CommunityUserService;

class Activity extends BaseController
{
    /**
     * 创建活动
     * 1.鉴权
     *
     * @return \think\response\Json
     */
    public function postActivity()
    {
        (new PostActivityValidate())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        $data['uuid'] = uuid();
        $data['end_time'] = strtotime($data['end_time']);
        CommunityModel::checkCommunityExists($data['community_id']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$data['community_id'],$auth_array);
        (new ActivityModel())->allowField(true)->save($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 活动列表
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getActivityList($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new UUIDValidate())->goCheck();
        $community_id = input('get.uuid');
        $pageData = ActivityModel::getList($community_id,$page,$size);
        $uid = TokenService::getAnyhowUid();
        $auth = AuthUserModel::getAuthUserWithCommunity($uid,$community_id);
        $data = $pageData->hidden();
        return [
            'data' => $data,
            'current_page' => $pageData->currentPage(),
            'user_auth' => $auth
        ];
    }

    /**
     * 活动详情
     *
     * @return array
     */
    public function getActivity()
    {
        (new UUIDValidate())->goCheck();
        $activity_id = input('get.uuid');
        $res = ActivityModel::checkActivityExists($activity_id);
        $uid = TokenService::getAnyhowUid();
        $auth = AuthUserModel::getAuthUserWithCommunity($uid,$res['community_id']);
        $detail = ActivityModel::get(['uuid' => $activity_id]);
        return [
            'detail' => $detail,
            'auth' => $auth
        ];
    }

    /**
     * 编辑活动
     *
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function putActivity()
    {
        (new PutActivityValidate())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        $res = ActivityModel::checkActivityExists($data['uuid']);
        $auth_array[0] = 1;
        $data['end_time'] = strtotime($data['end_time']);
        (new CommunityService())->checkManagerAuthority($uid,$res['community_id'],$auth_array);
        (new ActivityModel())->allowField(true)->save($data,['uuid' => $data['uuid']]);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 根据名称模糊查询
     * @param $name
     * @param $page
     * @param $size
     * @return array
     */
    public function searchActivity($name, $page = 1, $size = 15)
    {
        (new SearchName())->goCheck();
        (new PagingParameter())->goCheck();

        $pagingData = ActivityModel::searchActivity($name, $page, $size);
        $data = $pagingData->visible(['uuid','name', 'description', 'cover_image', 'community_id'])
            ->toArray();
        $data = (new CommunityUserService())->getType($data);

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

}