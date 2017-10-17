<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: probe <1946644259@qq.com>
// +----------------------------------------------------------------------
// | DateTime: 2017/10/16/11:00
// +----------------------------------------------------------------------

namespace app\api\service;


class Callback
{
    public function RegisterCallback()
    {

    }

    public function CancelCallback()
    {

    }

    	/**
         * 设定在指定时间回调某一个接口
         * @param $callback_cmd
         * @param $data_array
         * @param $seconds
         * @return mixed
         */
	public function timer_callback($callback_cmd,$data_array,$seconds){

        $url  = "http://127.0.0.1:8080/register/";
        $temp_array['callback_cmd'] = $callback_cmd;
        $temp_array['callback_data'] = $data_array;
        $temp_array['seconds'] = $seconds;
//		$data = json_encode(array('callback_cmd'=>'http://app.puncheers.com/index.php/Webservice/V102/test',
//				'callback_data'=>array('user_id'=>7,'amount'=>500), 'seconds'=>5));
        $data = json_encode($temp_array);
        $result_array = http_post_data($url, $data);
        $ret = json_decode($result_array[1]);
//		$callback_key = $ret->data->key;
//		$result = $ret->ret;
        //$ret->ret = 0 表示成功
        return $ret;
    }
	/**
     * 取消在指定时间回调某一个接口
     * @param $callback_key
     * @return mixed
     */
	public function timer_uncallback($callback_key){

        $url  = "http://127.0.0.1:8080/unregister/";
        $temp_array['key'] = $callback_key;

        $data = json_encode($temp_array);
        $result_array = http_post_data($url, $data);
        $ret = json_decode($result_array[1]);
        //$ret->ret = 0 表示成功
        return $ret;
    }
}