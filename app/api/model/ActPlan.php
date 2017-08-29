<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/22
 * Time: 14:17
 */

namespace app\api\model;


class ActPlan extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time','create_time','update_time'];
}