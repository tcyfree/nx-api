<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 15:12
 */

namespace app\api\validate;


class SetManager extends BaseValidate
{
    protected $rule = [
        'number' => 'require|length:8|isPositiveInteger',
        'auth'        => 'checkIDs',
        'community_id' => 'require|length:36'
    ];

    protected $message = [
        'auth.checkIDs'      => 'auth参数必须是以逗号分隔的多个正整数'
    ];

    /**
     * 如果auth为空，则不走checkIDs校验方法
     * 参数必须是以逗号分隔的多个正整数 ids = id1,id2...
     * @param $value
     * @return bool
     */
    protected function checkIDs($value){

        $data = str_replace('，', ',', $value);
        $values = explode(',', $data);

        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}