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
// | DateTime: 2017/12/19/15:35
// +----------------------------------------------------------------------

namespace app\api\controller\v2;

use app\api\controller\BaseController;
use app\api\service\Pinyin;
use app\api\service\Token as TokenService;
use app\api\service\WXAccessToken;
use app\api\validate\Profile;
use app\api\model\UserInfo as UserInfoModel;
use app\lib\exception\SuccessMessage;

class UserInfo extends BaseController
{
    /**
     * 编辑用户简介
     *
     * @return \think\response\Json
     */
    public function putUserInfoProfile()
    {
        (new Profile())->goCheck();
        $uid = TokenService::getCurrentUid();
        $profile = input('put.profile');
        UserInfoModel::update(['profile' => $profile, 'update_time' => time()],['user_id' => $uid]);
        return json(new SuccessMessage(),201);
    }

    function test2($redis, $pattern, $channel, $msg) {
        echo "Pattern: $pattern\n";
        echo "Channel: $channel\n";
        echo "Payload: $msg\n";
    }

    public function test()
    {
       return error_log('错误信息'.' '.date('Y-m-d H:i:s')."\r\n",3,LOG_PATH.'advice.log');
    }
}