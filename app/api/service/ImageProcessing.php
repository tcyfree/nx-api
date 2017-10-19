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
// | DateTime: 2017/10/19/9:43
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\controller\v1\OSSManager;

class ImageProcessing
{
    /**
     * 1 从OSS下载图片文件
     * 2 生成二维码
     * 3 将二维码和下载图片合成图片文件上传OSS
     * 4 删除下载与带有logo合成图片
     * @param $url
     * @param $cover_image
     * @return mixed
     */
    public function getQRCodeByCoverImage($url, $cover_image)
    {
        $download_filename = downloadImage($cover_image);
        $qr_code_filename = qr_code($url,$download_filename);
        $oss_manager = new OSSManager();
        $filename_path = 'images/'.$qr_code_filename;
        $res = $oss_manager->uploadOSS($filename_path);
        $oss_manager->deleteDownloadFile('images/'.$download_filename);
        $oss_manager->deleteDownloadFile($filename_path);
        return $res;
    }
}