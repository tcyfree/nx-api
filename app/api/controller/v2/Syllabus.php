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
// | DateTime: 2018/1/9/14:59
// +----------------------------------------------------------------------

namespace app\api\controller\v2;

use app\api\controller\BaseController;
use app\api\model\AuthUser;
use app\api\validate\PagingParameter;
use app\api\validate\SyllabusPost;
use app\api\service\Token as TokenService;
use app\api\model\Course as CourseModel;
use app\api\validate\SyllabusPut;
use app\api\validate\UUIDValidate;
use app\lib\exception\SuccessMessage;
use app\api\service\Community as CommunityService;
use app\api\model\Syllabus as SyllabusModel;
use think\Db;
use think\Exception;

class Syllabus extends BaseController
{
    /**
     * 创建课时
     * 更新课时总数
     *
     * @return \think\response\Json
     * @throws Exception
     */
    public function postSyllabus()
    {
        (new SyllabusPost())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        $res = CourseModel::checkCourseExists($data['course_id']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$res['community_id'],$auth_array);
        $data['uuid'] = uuid();
        Db::startTrans();
        try{
            (new SyllabusModel())->allowField(true)->save($data);
            CourseModel::where(['uuid' => $data['course_id']])->setInc('syllabus_count');
            Db::commit();
        }catch(Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
        return json(new SuccessMessage(),201);
    }

    /**
     * 编辑课时
     *
     * @return \think\response\Json
     */
    public function putSyllabus()
    {
        (new SyllabusPut())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        $res = SyllabusModel::getCommunity($data['uuid']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$res['community_id'],$auth_array);
        (new SyllabusModel())->allowField(true)->save($data,['uuid' => $data['uuid']]);
        return json(new SuccessMessage(),201);
    }

    /**
     * 课时列表
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getSyllabusList($page =1 ,$size = 15)
    {
        (new PagingParameter())->goCheck();
        (new UUIDValidate())->goCheck();
        $course_id = input('get.uuid');
        $res = CourseModel::checkCourseExists($course_id);
        $uid = TokenService::getAnyhowUid();
        $auth = AuthUser::getAuthUserWithCommunity($uid,$res['community_id']);
        $pageData = SyllabusModel::getList($course_id,$page,$size);
        $data = $pageData->hidden(['update_time']);
        return [
            'data' => $data,
            'auth' => $auth,
            'current_page' => $pageData->currentPage(),
            'total' => $pageData->total()
        ];
    }

    /**
     * 详情
     *
     * @return array
     */
    public function getSyllabus()
    {
        (new UUIDValidate())->goCheck();
        $syllabus_id = input('get.uuid');
        $res = SyllabusModel::getCommunity($syllabus_id);
        $uid = TokenService::getAnyhowUid();
        $auth = AuthUser::getAuthUserWithCommunity($uid,$res['community_id']);
        $detail = SyllabusModel::get(['uuid' => $syllabus_id]);
        return [
            'data' => $detail,
            'auth' => $auth
        ];
    }

}