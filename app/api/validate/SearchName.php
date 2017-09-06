<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/6
 * Time: 5:05
 */

namespace app\api\validate;


class SearchName extends BaseValidate
{
    protected $rule = [
        'name' => 'require'
    ];

}