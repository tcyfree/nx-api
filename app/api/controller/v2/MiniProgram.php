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

class MiniProgram extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getMiniQRCode']
    ];

    /**
     * 获取小程序码
     *
     * @return mixed
     */
    public function getMiniQRCode()
    {
        (new MiniQRCodeValidate())->goCheck();
        $access_token = (new WXAccessToken())->getMiniAccessToken();
        $uri = sprintf(config('wx.mini_program_qrcode'), $access_token);

        return [
            'mini_qrcode' => $uri
        ];


    }


}