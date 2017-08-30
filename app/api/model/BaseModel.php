<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //PSR-4,PSR-0 自动加载规范，所以不需要显示的去require 某一个.php文件，只有use它的命名空间就可以了。

    protected function prefixImgUrl ($value,$data){
        $finalUrl = $value;
        if($data['from'] == 0){
            $finalUrl = config('setting.img_prefix').$value;
        }
        return $finalUrl;
    }
}
