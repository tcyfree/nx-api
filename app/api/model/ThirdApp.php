<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/16
 * Time: 10:07
 */

namespace app\api\model;


use think\Model;

class ThirdApp extends BaseModel
{
    public static function check($ac, $se)
    {
        $app = self::where('app_id','=',$ac)
            ->where('app_secret', '=',$se)
            ->find();
        return $app;

    }
}