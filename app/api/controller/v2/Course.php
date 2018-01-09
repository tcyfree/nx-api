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
use app\api\model\Community as CommunityModel;
use app\api\model\Course as CourseModel;
use app\api\service\Community as CommunityService;
use app\api\service\Token as TokenService;
use app\api\validate\PostCourseValidate;
use app\api\validate\PutCourseValidate;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;

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
        $res = CourseModel::get(['uuid' => $data['uuid']]);
        if(!$res){
            throw new ParameterException([
                'msg' => '课程不存在，请检查ID:'.$data['uuid']
            ]);
        }else{
            $auth_array[0] = 1;
            (new CommunityService())->checkManagerAuthority($uid,$data['community_id'],$auth_array);
        }
        (new CourseModel())->allowField(true)->save($data,['uuid' => $data['uuid']]);

        return json(new SuccessMessage(), 201);
    }
}