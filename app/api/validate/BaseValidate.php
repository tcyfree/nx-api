<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/18
 * Time: 5:15
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        // 获取http传入的参数
        // 对这些参数做检验
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()
            ->check($params);
        if (!$result)
        {
            $e = new ParameterException(
                [
                    'msg' => $this->error,
                ]);
//            ParameterException(
//            [
//                'msg' => $this->error,
//            ]);
            //上面这种方式更加面向对象
//            $e->msg= $this->error;
//            $e->errorCode = 10002;
            throw $e;
        }
        else
        {
            return true;
        }
    }

    /**
     * 必须是正整数
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        else
        {
            return false;
            //            return $field.'必须是正整数';
        }
    }

    /**
     * 参数必须是以逗号分隔的多个正整数 ids = id1,id2...
     * @param $value
     * @return bool
     */
    protected function checkIDs($value){

        $data = str_replace('，', ',', $value);
        $values = explode(',', $data);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }

    /**
     * 判断是否为电话号码
     * @param $value
     * @return bool
     */
    protected function isMobile($value)
    {
        $rule = '/^1(3|4|5|7|8)\d{9}$/';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 不为空，包括0
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool
     */
    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    /**
     * 过滤非法提交参数
     * @param $arrays
     * @return array
     * @throws ParameterException
     */
    public function getDataByRule($arrays)
    {
        if (array_key_exists('user_id', $arrays) |
            array_key_exists('uid', $arrays)
        )
        {
            // 不允许包含user_id或者uid，防止恶意覆盖user_id外键
            throw new ParameterException(
                [
                    'msg' => '参数中包含有非法的参数名user_id或者uid'
                ]);
        }

        $newArray = [];

        foreach ($this->rule as $key => $value)
        {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }


}