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

    public function test()
    {
        $access_token = (new WXAccessToken())->getAccessToken();
        $open_id = input('get.id');
        $uri = sprintf(
            config('wx.user_info_unionid'),
            $access_token, $open_id);
        $wx_res = curl_get($uri);
        $utf8 = utf8_decode($wx_res);
        print_r($utf8);
        $res = json_decode($wx_res,true);
        print_r($res);
        echo (new Pinyin())->getCharIndexPinyin($res['nickname']);
    }
}