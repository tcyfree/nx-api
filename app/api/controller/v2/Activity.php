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
use app\api\validate\ActivityJoinValidate;
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
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\ActivityUser as ActivityUserModel;
use app\api\model\IncomeExpenses as IncomeExpensesModel;
use app\api\model\IncomeExpensesUser as IncomeExpensesUserModel;
use think\Db;
use think\Exception;

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
        $join_user = ActivityUserModel::get(['activity_id' => $activity_id, 'user_id' => $uid]);
        $the_last_join = ActivityUserModel::getTheLastJoin($activity_id);

        $data['id'] = $res['community_id'];
        $community_data = CommunityService::getUserStatus($data);

        return [
            'detail' => $detail,
            'auth' => $auth,
            'join_user' => $join_user,
            'the_last_join' => $the_last_join,
            'community' => $community_data
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
        $data = $pagingData->visible(['uuid','name', 'description', 'cover_image', 'community_id', 'end_time', 'join_count'])
            ->toArray();
        $data = (new CommunityUserService())->getType($data);

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 参加活动。
     * 1. 是否参加社群
     * 2. 是否已经参加该活动
     * 3. 不要用客户端传过来的community_id，可能不是相关的community_id，这样就检查不到了
     * 4. 判断是否达到用户设置参加活动人数上限
     * ....
     *
     * @return \think\response\Json
     * @throws Exception
     */
    public function deleteWalletByJoinActivity()
    {
        (new ActivityJoinValidate())->goCheck();
        $data = input('delete.');
        $uid = TokenService::getCurrentUid();
        Db::startTrans();
        try{
            ActivityModel::checkEndTimeValidate($data['activity_id']);
            ActivityModel::checkAllowNum($data['activity_id']);
            $res = ActivityModel::checkActivityExists($data['activity_id']);
            $data['community_id'] = $res['community_id'];
            CommunityUserModel::checkCommunityBelongsToUser($uid,$data['community_id']);
            //避免name被覆盖
            ActivityUserModel::checkActivityBelongsToUser($uid,$data['activity_id']);
            ActivityUserModel::postActivityUser($uid,$data);
            $res = ActivityModel::checkActivityExists($data['activity_id']);
            $data['fee'] = $res['fee'];
            $data['name'] = $res['name'];
            $data['key_id'] = $data['activity_id'];

            //参加活动类型
            $data['type'] = 1;
            $ie_id = IncomeExpensesModel::purchase($uid,$data);
            //记录对应交易明细和更新钱包
            IncomeExpensesUserModel::postIncomeExpensesUser($uid,$ie_id,$data['fee'],$data['community_id']);
            CommunityUserModel::updateUserPay($uid,$data['community_id']);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 已报名列表
     *
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public function getActivityJoinList($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new UUIDValidate())->goCheck();
        $uuid = input('get.uuid');
        $data = ActivityUserModel::getList($uuid,$page,$size);
        return $data;
    }

}