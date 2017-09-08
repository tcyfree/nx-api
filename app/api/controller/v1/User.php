<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\model\UserInfo as UserInfoModel;
use app\api\model\UserInfo;
use app\api\service\Token as TokenService;
use app\api\controller\BaseController;
use app\api\validate\Advice;
use app\lib\exception\UserException;
use app\api\validate\UerInfo as UserInfoValidate;
use app\lib\exception\SuccessMessage;
use app\api\model\User as UserModel;
use app\api\model\UserProperty as UserPropertyModel;
use app\api\model\Advice as AdviceModel;

class User extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getUserInfo,editUserInfo']
    ];

    /**
     * 获取用户信息
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getUserInfo(){
        return UserInfoModel::userInfo();
    }

    /**
     * 编辑用户信息
     * @return \think\response\Json
     * @throws UserException
     */
    public function editUserInfo(){
        $validate = new UserInfoValidate();
        $validate->goCheck();

        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);

        if (!$user)
        {
            throw new UserException();
        }

        $dataArray = $validate->getDataByRule(input('put.'));
        $dataArray['from'] = 1;

        $userInfo = new UserInfoModel();
        $userInfo->save($dataArray,['user_id' => $uid]);

//        return $userInfo;
        return json(new SuccessMessage(), 201);
    }

    /**
     * 1. 查找当前用户行动力排名
     * 2. 全局前5名用户
     * @return mixed
     */
    public function getExecutionRankByUser()
    {
        $uid = TokenService::getCurrentUid();
        $data = UserPropertyModel::executionRankByUser($uid);
        return $data;
    }

    /**
     * 意见与建议
     * @param $content
     * @return \think\response\Json
     */
    public function addAdvice($content)
    {
        (new Advice())->goCheck();
        $uid = TokenService::getCurrentUid();
        $user = UserInfoModel::get(['user_id' => $uid]);
        AdviceModel::create([
            'user_id' => $uid,
            'content' => $content,
            'nickname' => $user->nickname
        ]);

        return json(new SuccessMessage(),201);
    }


}