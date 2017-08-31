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

    /**
     * 仅匹配汉字、大小写字母和数字
     * @param $subject
     * @param $min
     * @param $max
     * @return int
     */
    public static function justChineseW($subject,$min,$max)
    {
        $pattern = '/^([\x{4e00}-\x{9fa5}]|\w){'.$min.','.$max.'}$/u';
        $res = preg_match($pattern, $subject);
        return $res;
    }

    /**
     * 仅匹配正整数或小数1位和2位，不能为0或0.0和0.00
     * preg_match:成功返回 1 ，否则返回 0
     * @param $subject
     * @return bool
     */
    public static function justIntegerOrDecimalNotZero($subject)
    {
        //判断是否为0或0.0和0.00
        $pattern_0 = '/^0+(\.0{1,2})?$/';
        //正整数或小数1位和2位
        //由于此规则包含了$pattern_0，所以上面的先判断
        $pattern_1 = '/^[0-9]+(.[0-9]{1,2})?$/';

        if (preg_match($pattern_0,$subject)){
            return false;
        }
        else if (preg_match($pattern_1, $subject)) {
            return true;
        }
        else{
            return false;
        }
    }
}