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
use app\api\service\MiniProgramService;
use app\api\service\WXAccessToken;
use app\api\validate\MiniQRCodeValidate;
use app\api\model\Community as CommunityModel;

class MiniProgram extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getMiniQRCode']
    ];

    /**
     * 获取小程序码
     * 0. 判断是否已经存在
     * 1.下载
     * 2. 上传到oss
     * 3. 删除下载
     *
     * @param string $path
     * @param int $width
     * @param bool $auto_color
     * @param array $line_color
     * @return array
     */
    public function getMiniQRCode($path = '', $width = 430, $auto_color = true, $line_color = array("r" => "0","g" => "0","b"=>"0"))
    {
        (new MiniQRCodeValidate())->goCheck();
        $community_id = input('post.community_id');
        $post_data['path'] = input('post.path');
        $post_data['width'] = $width;
        $post_data['auto_color'] = $auto_color;
        if (!$auto_color){
            $post_data['line_color'] = $line_color;
        }
//        CommunityModel::checkCommunityExists($community_id);
//        $res = CommunityModel::where(['id' => $community_id])->field('mini_qr_code')->find();
//        if (!empty($res['mini_qr_code'])){
//            $mini_qrcode_uri= $res['mini_qr_code'];
//        }else{
//            $access_token = (new WXAccessToken())->getMiniAccessToken();
//            $uri = sprintf(
//                config('wx.mini_program_qrcode'),
//                $access_token);
//            $mini_service = new MiniProgramService();
//            $file_name = $mini_service->downImagesFile($uri,$post_data);
//            $mini_service->uploadOSS($file_name);
//            $mini_qrcode_uri= config('oss.host').'/images/'.$file_name;
//            CommunityModel::update(['mini_qr_code' => $mini_qrcode_uri],['id' => $community_id]);
//        }

        $access_token = (new WXAccessToken())->getMiniAccessToken();
        $uri = sprintf(
            config('wx.mini_program_qrcode'),
            $access_token);
        $mini_service = new MiniProgramService();
        $file_name = $mini_service->downImagesFile($uri,$post_data);
        $mini_service->uploadOSS($file_name);
        $mini_qrcode_uri= config('oss.host').'/images/'.$file_name;
        CommunityModel::update(['mini_qr_code' => $mini_qrcode_uri],['id' => $community_id]);

        return [
            'post_data' => $post_data,
            'mini_qrcode_uri' => $mini_qrcode_uri
        ];


    }


}