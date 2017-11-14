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
// | DateTime: 2017/11/14/9:29
// +----------------------------------------------------------------------

namespace app\api\service;
use think\Loader;

Loader::import('ChinesePinyin.ChinesePinyin',EXTEND_PATH,'.php');

class Pinyin
{
    /**
     * 获取整条字符串汉字拼音首字母
     *
     * @param $words
     * @return string
     */
    public function getCharIndexPinyin($words = '')
    {
        $log = LOG_PATH.'pinyin.log';
        file_put_contents($log, $words.' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
        $Pinyin = new \ChinesePinyin();
        $result = $Pinyin->TransformWithoutTone($words);
        $char_index = strtoupper(substr($result,0,1));

        return $char_index;
    }

    /**
     * 移除字符串中的Emoji表情
     * @param $str
     * @return mixed
     */
    public  function removeEmoji($str) {
//        $clean_text = "";
//        // Match Emoticons
//        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
//        $clean_text = preg_replace($regexEmoticons, '', $text);
//        // Match Miscellaneous Symbols and Pictographs
//        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
//        $clean_text = preg_replace($regexSymbols, '', $clean_text);
//        // Match Transport And Map Symbols
//        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
//        $clean_text = preg_replace($regexTransport, '', $clean_text);
//        // Match Miscellaneous Symbols
//        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
//        $clean_text = preg_replace($regexMisc, '', $clean_text);
//        // Match Dingbats
//        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
//        $clean_text = preg_replace($regexDingbats, '', $clean_text);
//        return $clean_text;
        $str = preg_replace_callback(
            '/&#/u',
            function (array $match) {
                return strlen($match[0]) >= 6 ? '' : $match[0];
            },
            $str);

        return $str;
//        $value = json_encode($text);
//        $value = preg_replace("/\\\u[ed][0-9a-f]{3}\\\u[ed][0-9a-f]{3}/","*",$value);//替换成*
//        $value = json_decode($value);
//        return $value;
    }

}