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
use app\api\service\Token as TokenService;
use app\api\controller\BaseController;
use app\lib\exception\UserException;
use app\api\validate\UerInfo as UserInfoValidate;
use app\lib\exception\SuccessMessage;
use app\api\model\User as UserModel;

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
     *
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


}