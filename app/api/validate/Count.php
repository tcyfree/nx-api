<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/17
 * Time: 12:49
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
      'count' => 'isPositiveInteger|between:1,15'
    ];
}