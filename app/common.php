<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @return mixed
 */
function curl_get($url, &$httpCode = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //不做证书校验,部署在linux环境下请改为true
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}

/**
 * @param string $url post请求地址
 * @param array $params
 * @return mixed
 */
function curl_post($url, array $params = array())
{
    $data_string = json_encode($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: app/json'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}

function curl_post_raw($url, $rawData)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $rawData);
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: text'
        )
    );
    $data = curl_exec($ch);
    curl_close($ch);
    return ($data);
}


function getRandChar($length)
{
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
    $max = strlen($strPol) - 1;

    for ($i = 0;
         $i < $length;
         $i++) {
        $str .= $strPol[rand(0, $max)];
    }

    return $str;
}

/**
 * 获取8位全局不重复的随机数
 */
function number(){
    $redis = new \redis();
    $redis->connect("127.0.0.1","6379");  //php客户端设置的ip及端口

    $rst = 0;
    while ($rst == 0){
        //随机数种子发生器:8位随机数
        $number = mt_rand(10000000, 99999999);
        //Redis 中 集合是通过哈希表实现的，所以添加，删除，查找的复杂度都是O(1)。
        $rst = $redis->sadd('number',$number); // 如果集合中已经存在uuid，返回0，否则返回1;
    }
    return $number;
}
//获取唯一序列号
function uuid(){
    $str = md5(uniqid(md5(microtime(true)), true));

    $uuid  = substr($str,0,8) . '-';
    $uuid .= substr($str,8,4) . '-';
    $uuid .= substr($str,12,4) . '-';
    $uuid .= substr($str,16,4) . '-';
    $uuid .= substr($str,20,12);
    return $uuid;
}

/**
 * PHP 根据URL将图片下载到本地
 * 1 判断URL是否有效
 * @param $url
 * @return string
 * @throws \app\lib\exception\ParameterException
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
        $filename = 'download_'.date("YmdHis") . uniqid() . $exf;//这里默认是当前文件夹，可以加路径的 可以改为$filepath = '../'.$filename
        $filepath = 'static/oss/images/'.$filename;
        $res = file_put_contents($filepath, $content);//同样这里就可以改为$res = file_put_contents($filepath, $content);

        return $filename;
    }else{
        throw new \app\lib\exception\ParameterException([
            'msg' => 'Your required '."'".$url."'".' resource are not found!'
        ]);
    }
}
/**
 *  社区二维码链接
 * 1. 生成二维码图片，！！！！！！不会被覆盖，qrcode.png用完以后记得删除
 * 2. 将圆角图片拷贝到二维码中央
 * 3.将logo拷贝到二维码中央
 *
 * @param string $url
 * @param string $logo
 * @return string
 */
function qr_code($url,$logo)
{
    //引入核心库文件
    \think\Loader::import('phpqrcode/phpqrcode', EXTEND_PATH, '.php');
    //二维码内容
    $text = $url;
//    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/static/oss/images/qr_cod.log',
//        'url: '.$url.' '.'text: '.$text.' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
    //容错级别
    $errorCorrectionLevel = 'Q';
    //生成图片大小
    $matrixPointSize = 6;
    //路径前缀
    $path_prefix = 'static/oss/images/';
    //生成二维码图片，！！！！！！不会被覆盖，qrcode.png用完以后记得删除
    $QR = QRcode::png($text, $path_prefix . 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
    $filename = $path_prefix . 'qrcode.png';
    //获取二维码
    $qrcode = file_get_contents($filename);
    $qrcode = imagecreatefromstring($qrcode);
    $qrcode_width = imagesx($qrcode);
    $qrcode_height = imagesy($qrcode);

    qr_code_add_circular_corner($qrcode_width,$qrcode);
    $final_filename = qr_code_add_logo($logo,$path_prefix,$qrcode);
    imagedestroy($qrcode);
    return $final_filename;
}

/**
 * 计算圆角图片的宽高及相对于二维码的摆放位置,将圆角图片拷贝到二维码中央
 *
 * @param $qrcode_width
 * @param $qrcode
 */
function qr_code_add_circular_corner($qrcode_width,$qrcode)
{
    //圆角图片
    $corner_path = APP_PATH.'../public/static/images/corner_1.png';
    $corner = file_get_contents($corner_path);
    $corner = imagecreatefromstring($corner);
    $corner_width = imagesx($corner);
    $corner_height = imagesy($corner);

    //计算圆角图片的宽高及相对于二维码的摆放位置,将圆角图片拷贝到二维码中央
    $corner_qr_height = $corner_qr_width = $qrcode_width/4;
    $from_width = ($qrcode_width-$corner_qr_width)/2;
    imagecopyresampled($qrcode, $corner, $from_width, $from_width, 0, 0, $corner_qr_width, $corner_qr_height, $corner_width, $corner_height);
    imagedestroy($corner);
}

/**
 * 计算logo图片的宽高及相对于二维码的摆放位置,将logo拷贝到二维码中央
 * 1 注意logo颜色失真
 *
 * @param $logo
 * @param $path_prefix
 * @return string
 */
function qr_code_add_logo($logo,$path_prefix,$QR)
{
    $logo = APP_PATH.'../public/static/oss/images/'.$logo;//准备好的logo图片
    if ($logo !== FALSE) {
        $logo = imagecreatefromstring(file_get_contents($logo));
        if (imageistruecolor($logo))
        {
            imagetruecolortopalette($logo, false, 65535);//添加这行代码来解决颜色失真问题
        }
        $QR_width = imagesx($QR);//二维码图片宽度
        $QR_height = imagesy($QR);//二维码图片高度
        $logo_width = imagesx($logo);//logo图片宽度
        $logo_height = imagesy($logo);//logo图片高度
        $logo_qr_width = $QR_width / 4 - 6;
        $scale = $logo_width/$logo_qr_width;
        $logo_qr_height = $logo_height/$scale;
        $from_width = ($QR_width - $logo_qr_width) / 2;
        //重新组合图片并调整大小
        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
            $logo_qr_height, $logo_width, $logo_height);
    }
    $filename = 'qr_code'.date("YmdHis") . uniqid();
    //输出图片
    imagepng($QR, $path_prefix.$filename.'.png');
    imagedestroy($logo);
//    echo "<img src=".$filename.".png >";
    //返回生产图片的文件名
    return $filename.'.png';
}

/**
 * 判断数组是关联数组还是索引数组
 * @param $array
 * @return bool|int
 */
function AssociativeOrIndexArray($array){
    if (!is_array($array)){
//            echo 'not array';
        return false;
    }
    $c = count($array);
    $in = array_intersect_key($array,range(0,$c-1));

    if(count($in) == $c) {
//            echo '索引数组';
        return 1;
    }else if(empty($in)) {
//            echo '关联数组';
        return 2;
    }else{
//            echo '混合数组';
        return 3;
    }
}

/**
 * 获取单个汉字拼音首字母。注意:此处不要纠结。汉字拼音是没有以U和V开头的
 * @param $s0
 * @return null|string
 */
function getFirstChar($s0){
    error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息
    $fchar = ord($s0{0});
    if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
    $s1 = iconv("utf-8","gb2312", $s0);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $s0){$s = $s1;}else{$s = $s0;}
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if($asc >= -20319 and $asc <= -20284) return "A";
    if($asc >= -20283 and $asc <= -19776) return "B";
    if($asc >= -19775 and $asc <= -19219) return "C";
    if($asc >= -19218 and $asc <= -18711) return "D";
    if($asc >= -18710 and $asc <= -18527) return "E";
    if($asc >= -18526 and $asc <= -18240) return "F";
    if($asc >= -18239 and $asc <= -17923) return "G";
    if($asc >= -17922 and $asc <= -17418) return "H";
    if($asc >= -17922 and $asc <= -17418) return "I";
    if($asc >= -17417 and $asc <= -16475) return "J";
    if($asc >= -16474 and $asc <= -16213) return "K";
    if($asc >= -16212 and $asc <= -15641) return "L";
    if($asc >= -15640 and $asc <= -15166) return "M";
    if($asc >= -15165 and $asc <= -14923) return "N";
    if($asc >= -14922 and $asc <= -14915) return "O";
    if($asc >= -14914 and $asc <= -14631) return "P";
    if($asc >= -14630 and $asc <= -14150) return "Q";
    if($asc >= -14149 and $asc <= -14091) return "R";
    if($asc >= -14090 and $asc <= -13319) return "S";
    if($asc >= -13318 and $asc <= -12839) return "T";
    if($asc >= -12838 and $asc <= -12557) return "W";
    if($asc >= -12556 and $asc <= -11848) return "X";
    if($asc >= -11847 and $asc <= -11056) return "Y";
    if($asc >= -11055 and $asc <= -10247) return "Z";
    return NULL;
}

/**
 * 获取整条字符串汉字拼音首字母，包含特殊符号和数字：0~9@#￥%等
 * @param $zh
 * @return string
 */
function getCharIndex($zh){
    error_reporting(E_ALL || ~E_NOTICE); //显示除去 E_NOTICE 之外的所有错误信息
    $ret = "";
    $s1 = iconv("UTF-8","gb2312", $zh);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $zh){$zh = $s1;}
//    for($i = 0; $i < strlen($zh); $i++){
    for($i = 0; $i < 1; $i++){
        $s1 = substr($zh,$i,1);
        $p = ord($s1);
        if($p > 160){
            $s2 = substr($zh,$i++,2);
            $ret .= getFirstChar($s2);
        }else{
            $ret .= $s1;
        }
    }
    return strtoupper($ret);
}

/**
 * 接口响应时间
 */
function sys_processTime(){
    $endTime = explode(" ", microtime());
    $endTime = $endTime[1] + $endTime[0];
    $totalTime = ($endTime - $GLOBALS['_beginTime']);
    $processTime = number_format($totalTime, 7);
    return $processTime.'s';
}

/**
 * 1 数组 ==> 对象
 * 2 对象 ==> 数组
 * 3 return $params
 *
 * @param $params
 * @return StdClass
 * @throws \app\lib\exception\ParameterException
 */
function interConvertArrayObject($params)
{
    if (is_object($params)) {
        foreach ($params as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }
    else if (is_array($params)) {
        $obj = new StdClass();
        foreach ($params as $key => $val){
            $obj->$key = $val;
        }
        return $obj;
    }
    else{
        throw new \app\lib\exception\ParameterException([
            'msg' => '参数 '.$params.' 非数组或对象'
        ]);
    }
}