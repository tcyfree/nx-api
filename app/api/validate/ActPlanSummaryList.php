<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/6
 * Time: 5:05
 */

namespace app\api\validate;


class ActPlanSummaryList extends BaseValidate
{
    protected $rule = [
        'community_id' => 'require|length:36',
        'page' => 'require|isPositiveInteger',
        'size' => 'require|isPositiveInteger'
    ];

    protected $message = [
        'page' => '分页参数必须是正整数',
        'size' => '分页参数必须是正整数'
    ];
}