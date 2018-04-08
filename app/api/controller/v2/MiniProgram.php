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
// | DateTime: 2018/3/30/10:39
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\service\WXAccessToken;
use app\api\validate\MiniQRCodeValidate;
use app\api\service\WXOauth as WXOauthService;

class MiniProgram extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getMiniQRCode']
    ];

    /**
     * 获取小程序码并base64编码
     *
     * @param string $path
     * @param int $width
     * @param bool $auto_color
     * @param array $line_color
     * @return array
     */
    public function getMiniQRCodeBase64($path = '', $width = 430, $auto_color = true, $line_color = array("r" => "0","g" => "0","b"=>"0"))
    {
        (new MiniQRCodeValidate())->goCheck();
        $access_token = (new WXAccessToken())->getMiniAccessToken();
        $uri = sprintf(
            config('wx.mini_program_qrcode'),
            $access_token);
        $post_data['path'] = input('post.path');
        $post_data['width'] = $width;
        $post_data['auto_color'] = $auto_color;
        if (!$auto_color){
            $post_data['line_color'] = $line_color;
        }
//        var_dump($post_data);
        $wx_res = curl_post($uri,$post_data);
        (new WXOauthService())->checkMiniQRCode($wx_res);
//        $image_data_base = "data:image/png;base64,". base64_encode ($wx_res);
//        echo '<img src="' . $image_data_base  . '" />';
        $image_data_base64 = base64_encode ($wx_res);


        return [
            'post_data' => $post_data,
            'mini_qrcode_base64' => $image_data_base64
        ];


    }


}