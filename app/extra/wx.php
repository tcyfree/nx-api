<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/22
 * Time: 9:17
 */

return [
    //PC扫码登录
    'app_id'     => '',
    'app_secret' => '',
    'qr_code'    => 'https://open.weixin.qq.com/connect/qrconnect?'.
        'appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_login&state=%s#wechat_redirect',
    'qr_access_token' => "https://api.weixin.qq.com/sns/oauth2/access_token?".
        "appid=%s&secret=%s&code=%s&grant_type=authorization_code",
    'qr_userinfo'      => 'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s',

    //微信App授权登录
    'g_app_id' => '',
    'g_app_secret' => '',
    'g_code'  => 'https://open.weixin.qq.com/connect/oauth2/authorize?'.
        'appid=%s&redirect_uri=%s&response_type=code&scope=snsapi_userinfo&state=%s#wechat_redirect ',
    'g_access_token' => 'https://api.weixin.qq.com/sns/oauth2/access_token?'.
        'appid=%s&secret=%s&code=%s&grant_type=authorization_code',
    'g_userinfo' => 'https://api.weixin.qq.com/sns/userinfo?access_token=%s&openid=%s&lang=zh_CN '

];
