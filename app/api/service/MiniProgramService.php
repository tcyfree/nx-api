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
// | DateTime: 2018/3/30/15:06
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\controller\v1\OSSManager;
use app\api\service\WXOauth as WXOauthService;

class MiniProgramService
{
    /**
     * 下载小程序码
     *
     * @param $uri
     * @param $post_data
     * @return string
     */
    public function downImagesFile($uri, $post_data)
    {
        $image_data = curl_post($uri, $post_data);
        (new WXOauthService())->checkMiniQRCode($image_data);
//        $image_data_base = "data:image/png;base64,". base64_encode ($image_data);
//        echo '<img src="' . $image_data_base  . '" />';
        $path = "static/oss/images/";
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
        $file_name = 'mini_' . time() . ".jpg";

        file_put_contents($path . $file_name, $image_data);

        return $file_name;
    }

    public function uploadOSS($file_name)
    {
        $oss_manager = new OSSManager();
        $filename_path = 'images/'.$file_name;
        $res = $oss_manager->uploadOSS($filename_path);
        $oss_manager->deleteDownloadFile('images/'.$file_name);
        return $res;
    }


    /**
     * 1.图片合拼
     * 2.文字
     *
     * @param $path_1
     * @param $path_2
     * @param $text
     * @return string
     */
    public function hebingImg($path_1,$path_2,$text){//加文字
        $image_1 = imagecreatefromjpeg($path_1);

        $textcolor = imagecolorallocate($image_1, 0, 0,0); //设置水印字体颜色
        $font = 'static/font/simfang.ttf'; //定义字体
        imagettftext($image_1,
            20, //字体大小
            0,
            330, //向右
            200, //向下
            $textcolor, $font, $text);//将文字写到图片中

        imagettftext($image_1,
            20, //字体大小
            0,
            420, //向右
            900, //向下
            $textcolor, $font, '趣行动');//将文字写到图片中

        $image_2 = imagecreatefromjpeg($path_2);
        $image_3 = imagecreatetruecolor(imagesx($image_1),imagesy($image_1));
        imagecopymerge($image_3,$image_1,0,0,0,0,imagesx($image_1),imagesy($image_1),100);

        list($width,$height) = getimagesize($path_2); // 二维码的高与宽

        imagecopyresampled($image_3,$image_2,
            250, //二维码向右移动
            400, //二维码向下移动
            0,
            0,
            $width, //二维码图片的宽度(按比例缩放)
            $height, //二维码图片的高度(按比例缩放)
            $width, //二维码图片的宽度
            $height //二维码图片的高度
        );

        $pic_name='./temp/'.time()."_".rand(1000,9999).".jpg";
        imagejpeg($image_3,$pic_name,50);
        imagedestroy($image_3);
        $path=$pic_name;
        return $path;
    }
}