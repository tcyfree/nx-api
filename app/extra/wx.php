<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/22
 * Time: 9:17
 */

return [
    'app_id' => 'wx21128d939f7e9487',
    'app_secret' => 'bdd010cd89ed5c743e45e234b51691ea',
    'qr_code' => 'https://open.weixin.qq.com/connect/qrconnect?'.
        'appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_login&state=%s#wechat_redirect',
    'qr_access_token' => "https://api.weixin.qq.com/sns/oauth2/access_token?".
        "appid=%s&secret=%s&code=%s&grant_type=authorization_code",
    'qr_userinfo' => 'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s'

];