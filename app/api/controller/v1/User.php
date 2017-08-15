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

class User extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getUserInfo']
    ];
    //获取用户信息
    public function getUserInfo(){
        $uid = TokenService::getCurrentUid();
        $userInfo = UserInfoModel::where('user_id', $uid)
            ->find();
        if(!$userInfo){
            throw new UserException([
                'msg' => '用户不存在',
                'errorCode' => 60001
            ]);
        }
        return $userInfo->hidden(['wallet','email']);
    }
    //登出

}