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
// | DateTime: 2017/10/18/16:03
// +----------------------------------------------------------------------
/**
 * PHP 根据URL将图片下载到本地
 * @param $url
 * @return string
 */
function downloadImage($url) {
    $header = array("Connection: Keep-Alive", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", "Pragma: no-cache", "Accept-Language: zh-Hans-CN,zh-Hans;q=0.8,en-US;q=0.5,en;q=0.3", "User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:29.0) Gecko/20100101 Firefox/29.0");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    //    curl_setopt($ch, CURLOPT_HEADER, $v);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');

    $content = curl_exec($ch);
    $curlinfo = curl_getinfo($ch);

//    print_r(json_encode($curlinfo));
    //关闭连接
    curl_close($ch);

    if ($curlinfo['http_code'] == 200) {
        if ($curlinfo['content_type'] == 'image/jpeg') {
            $exf = '.jpg';
        } else if ($curlinfo['content_type'] == 'image/png') {
            $exf = '.png';
        } else if ($curlinfo['content_type'] == 'image/gif') {
            $exf = '.gif';
        }
        //存放图片的路径及图片名称  *****这里注意 你的文件夹是否有创建文件的权限 chomd -R 777 mywenjian
        $filename = date("YmdHis") . uniqid() . $exf;//这里默认是当前文件夹，可以加路径的 可以改为$filepath = '../'.$filename
        $filepath = $filename;
        $res = file_put_contents($filepath, $content);//同样这里就可以改为$res = file_put_contents($filepath, $content);

        return $filepath;
    }
}
/**
 * 社区二维码链接
 * @param string $url
 * @return string
 */
function qr_code($url){
    //引入核心库文件
    include '../../extend/phpqrcode/phpqrcode.php';
//    \think\Loader::import('phpqrcode/phpqrcode',EXTEND_PATH,'.php');
    //二维码内容
    $text = $url;
    //容错级别
    $errorCorrectionLevel = 'L';
    //生成图片大小
    $matrixPointSize = 6;
    //生成二维码图片
    $QR = QRcode::png($text, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);

    $logo = '2017101901222159e7fe4de77f0.jpg';//准备好的logo图片
    $QR = 'qrcode.png';//已经生成的原始二维码图

    if ($logo !== FALSE) {
        $QR = imagecreatefromstring(file_get_contents($QR));
        $logo = imagecreatefromstring(file_get_contents($logo));
        $QR_width = imagesx($QR);//二维码图片宽度
        $QR_height = imagesy($QR);//二维码图片高度
        $logo_width = imagesx($logo);//logo图片宽度
        $logo_height = imagesy($logo);//logo图片高度
        $logo_qr_width = $QR_width / 5;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
            $logo_qr_height, $logo_width, $logo_height);
    }
    $filename = md5(microtime(true));
    //输出图片
    imagepng($QR, $filename.'.png');
//    echo "<img src=".$filename.".png >";
    //返回生产图片的文件名
    return $filename.'.png';
}
$url = 'http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/n80dkGitBWXVb3sieQBKHRxxhdJTgLEX.png';
echo downloadImage($url);
echo qr_code('http://www.nuan-x.com/');
