<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/17
 * Time: 5:58
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name' => 'require|max:10',
        'email' => 'email'
    ];
}