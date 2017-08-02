<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/23
 * Time: 15:42
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden=['product_id', 'delete_time', 'id'];
}