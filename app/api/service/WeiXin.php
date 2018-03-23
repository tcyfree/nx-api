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
// | DateTime: 2017/10/9/10:53
// +----------------------------------------------------------------------

namespace app\api\service;

use think\Exception;
use app\lib\exception\WeChatException;

class WeiXin
{
    /**
     * 根据URL地址，下载文件
     *
     * @param $url
     * @param $savePath
     */
    public function downAndSaveFile($url,$savePath)
    {
        ob_start();
        readfile($url);
        $img  = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $fp = fopen($savePath, 'a');
        fwrite($fp, $img);
        fclose($fp);
    }

    /**
     * 将amr格式转换成mp3格式
     *
     * @param $amr
     * @param $prefix_filename
     * @return mixed
     */
    public function amrTransCodingMp3($amr, $prefix_filename)
    {
        $msgId = $prefix_filename;
        $mp3 = $msgId.'.mp3';
        $dir = $_SERVER['DOCUMENT_ROOT'].'/static/audio/';

        exec("ffmpeg -y -i ".$dir.$amr." ".$dir.$mp3);
        return $mp3;
    }

    /**
     * 检查请求微信返回结果是否有错
     *
     * @param $result
     * @return mixed
     * @throws Exception
     */
    public function checkWXRes($result)
    {
        $ufResult = json_decode($result, true);

        if (empty($ufResult))
        {
            throw new Exception('微信内部错误');
        }else {
            $ufFail = array_key_exists('errcode', $ufResult);
            if ($ufFail) {
                $this->processError($ufResult);
            } else {

                return $ufResult;
            }
        }
    }

    /**
     * 微信接口处理异常
     * @param $wxResult
     * @throws WeChatException
     */
    private function processError($wxResult)
    {
        throw new WeChatException(
            [
                'msg' => '微信服务器接口调用失败：'.$wxResult['errmsg'],
                'errorCode' => $wxResult['errcode']
            ]);
    }

}