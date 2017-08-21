<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/21
 * Time: 11:10
 */

namespace app\lib;


class RexExp
{
    /**
     * 仅匹配汉字和大小写字母
     * @param $subject
     * @param $min
     * @param $max
     * @return int
     */
    public static function justChineseAlphabet($subject,$min,$max)
    {
        $pattern = '/^([\x{4e00}-\x{9fa5}]|[a-zA-Z]){'.$min.','.$max.'}$/u';
        $res = preg_match($pattern, $subject);
        return $res;
    }

}