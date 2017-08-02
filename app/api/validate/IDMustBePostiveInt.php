<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/18
 * Time: 3:11
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];


    protected $message=[
        'id' => 'id必须是正整数'
    ];
}