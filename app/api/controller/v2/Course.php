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
// | DateTime: 2018/1/9/14:12
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\model\AuthUser;
use app\api\model\Community as CommunityModel;
use app\api\model\Course as CourseModel;
use app\api\model\IncomeExpenses;
use app\api\model\IncomeExpensesUser;
use app\api\service\Community as CommunityService;
use app\api\service\Token as TokenService;
use app\api\validate\CourseBuyValidate;
use app\api\validate\PagingParameter;
use app\api\validate\PostCourseValidate;
use app\api\validate\PutCourseValidate;
use app\api\validate\SearchName;
use app\api\validate\UUIDValidate;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;
use app\api\model\AuthUser as AuthUserModel;
use app\api\service\CommunityUser as CommunityUserService;
use think\Db;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\CourseUser as CourseUserModel;
use think\Exception;


class Course extends BaseController
{
    /**
     * 创建课程
     * 1.鉴权
     *
     * @return \think\response\Json
     */
    public function postCourse()
    {
        (new PostCourseValidate())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        $data['uuid'] = uuid();
        CommunityModel::checkCommunityExists($data['community_id']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$data['community_id'],$auth_array);
        (new CourseModel())->allowField(true)->save($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 获取课程列表
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getCourseList($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new UUIDValidate())->goCheck();
        $community_id = input('get.uuid');
        $pageData = CourseModel::getList($community_id,$page,$size);
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
     * 课程详情
     * 1.添加最近参加人信息
     *
     * @return array
     */
    public function getCourse()
    {
        (new UUIDValidate())->goCheck();
        $course_id = input('get.uuid');
        $res = CourseModel::checkCourseExists($course_id);
        $uid = TokenService::getAnyhowUid();
        $auth = AuthUser::getAuthUserWithCommunity($uid,$res['community_id']);
        $detail = CourseModel::get(['uuid' => $course_id]);
        $buy_user = CourseUserModel::get(['user_id' => $uid, 'course_id' => $course_id]);
        $the_last_join = CourseUserModel::getTheLastJoin($course_id);
        return [
            'data' => $detail,
            'auth' => $auth,
            'buy_user' => $buy_user,
            'the_last_join' => $the_last_join
        ];
    }

    /**
     * 编辑课程
     * 1.鉴权
     *
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function putCourse()
    {
        (new PutCourseValidate())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        $res = CourseModel::checkCourseExists($data['uuid']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$res['community_id'],$auth_array);
        (new CourseModel())->allowField(true)->save($data,['uuid' => $data['uuid']]);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 根据名称模糊查询
     * @param $name
     * @param $page
     * @param $size
     * @return array
     */
    public function searchCourse($name, $page = 1, $size = 15)
    {
        (new SearchName())->goCheck();
        (new PagingParameter())->goCheck();

        $pagingData = CourseModel::searchCourse($name, $page, $size);
        $data = $pagingData->visible(['uuid','name', 'profile', 'cover_image', 'community_id'])
            ->toArray();
        $data = (new CommunityUserService())->getType($data);
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 购买课程
     * 1. 不要用客户端传过来的community_id，可能不是相关的community_id，这样就检查不到了
     *
     * @return \think\response\Json
     * @throws Exception
     */
    public function deleteWalletByJoinActivity()
    {
        (new CourseBuyValidate())->goCheck();
        $data = input('delete.');
        $uid = TokenService::getCurrentUid();
        Db::startTrans();
        try{
            $res = CourseModel::checkCourseExists($data['course_id']);
            $data['community_id'] = $res['community_id'];
            CommunityUserModel::checkCommunityBelongsToUser($uid,$data['community_id']);
            $data['fee'] = $res['fee'];
            $data['name'] = $res['name'];
            $data['key_id'] = $data['course_id'];
            CourseUserModel::checkCourseBelongsToUser($uid,$data['course_id']);
            //购买课程类型
            $data['type'] = 2;
            $ie_id = IncomeExpenses::purchase($uid,$data);
            //记录对应交易明细和更新钱包
            IncomeExpensesUser::postIncomeExpensesUser($uid,$ie_id,$data['fee'],$data['community_id']);
            CourseUserModel::postCourseUser($uid,$data['course_id']);
            CommunityUserModel::updateUserPay($uid,$data['community_id']);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }
}