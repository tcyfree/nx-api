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
     */
    public function editUserInfo(){

    }


}