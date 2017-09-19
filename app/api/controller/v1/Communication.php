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
// | DateTime: 2017/9/19/9:50
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\validate\CreateCommunication;
use app\api\service\Token as TokenService;
use app\api\model\Communication as CommunicationModel;
use app\lib\exception\SuccessMessage;
use app\api\model\Community as CommunityModel;

class Communication extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => '']
    ];

    /**
     * 发布内容
     * 1.被@的用户
     * @return \think\response\Json
     */
    public function createCommunication()
    {
        (new CreateCommunication())->goCheck();
        $dataArray = input('post.');
        CommunityModel::checkCommunityExists($dataArray['community_id']);
        $uid = TokenService::getCurrentUid();
        $dataArray['user_id'] = $uid;
        $c_obj = new CommunicationModel();
        // 过滤数组中的非数据表字段数据
        $c_obj->allowField(true)->save($dataArray);
        //@用户，发消息通知
        if (isset($dataArray['@user_ids'])){
            //TODO
//            var_dump($dataArray['@user_ids']);
        }

        return json(new SuccessMessage(),201);
    }
}