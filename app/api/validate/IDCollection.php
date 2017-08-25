<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/15
 * Time: 13:55
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule=[
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分隔的多个正整数'
    ];


}