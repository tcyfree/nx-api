<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['id', 'from', 'delete_time','update_time'];

    //读取器自动拼接图片URL
    public function getUrlAttr($value, $data){
        return $this->prefixImgUrl($value, $data);
    }
    //
}
