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
use app\api\validate\PostActivityValidate;
use app\api\service\Token as TokenService;
use app\api\model\Activity as ActivityModel;
use app\api\model\Community as CommunityModel;
use app\api\service\Community as CommunityService;
use app\api\validate\PutActivityValidate;
use app\lib\exception\SuccessMessage;
use app\lib\exception\ParameterException;

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
        CommunityModel::checkCommunityExists($data['community_id']);
        $auth_array[0] = 1;
        (new CommunityService())->checkManagerAuthority($uid,$data['community_id'],$auth_array);
        (new ActivityModel())->allowField(true)->save($data);

        return json(new SuccessMessage(), 201);
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
        $res = ActivityModel::get(['uuid' => $data['uuid']]);
        if(!$res){
            throw new ParameterException([
                'msg' => '活动不存在，请检查活动ID:'.$data['uuid']
            ]);
        }else{
            $auth_array[0] = 1;
            (new CommunityService())->checkManagerAuthority($uid,$data['community_id'],$auth_array);
        }
        (new ActivityModel())->allowField(true)->save($data,['uuid' => $data['uuid']]);

        return json(new SuccessMessage(), 201);
    }

}