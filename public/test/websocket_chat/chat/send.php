<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
session_start();
include './Mysql.class.php';


$db = new Mysql($config);



$channel = $_SESSION['channel'];
$msg = $_POST['msg'];


$data = $db->select('channel',[],"name='$channel'");

if(empty($data)){
	$ch_id = $db->insert('channel',['name' => $channel ]);	
}else{
	$ch_id = $data[0]['id'];
	
}


$url = "http://localhost:8080/pub?id=" . $channel;


if ($channel && $msg)
{
	$allMsg = [
		'user' => $_SESSION['user'],
		'time' => date('Y-m-d H:i:s'),
		'msg'  => htmlspecialchars(str_replace("'",'"',$msg)),

	];
	$allMsg = str_replace('"',"'",json_encode($allMsg));

	$data = [
		'ch_id'	=> $ch_id,
		'content' => $allMsg,
	];

	$db->insert('message',$data);
	curlRequest($url,$allMsg);
   
}
else
{
   exit("缺少参数");
}



/**
  使用curl方式实现get或post请求
  @param $url 请求的url地址
  @param $data 发送的post数据 如果为空则为get方式请求
  return 请求后获取到的数据
*/
function curlRequest($url,$data = ''){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //请求url地址
        $params[CURLOPT_HEADER] = false; //是否返回响应头信息
        $params[CURLOPT_RETURNTRANSFER] = true; //是否将结果返回
        $params[CURLOPT_FOLLOWLOCATION] = true; //是否重定向
		$params[CURLOPT_TIMEOUT] = 30; //超时时间
		if(!empty($data)){
			$params[CURLOPT_POST] = true;
			$params[CURLOPT_POSTFIELDS] = $data;
        }
		$params[CURLOPT_SSL_VERIFYPEER] = false;//请求https时设置,还有其他解决方案
		$params[CURLOPT_SSL_VERIFYHOST] = false;//请求https时,其他方案查看其他博文
        curl_setopt_array($ch, $params); //传入curl参数
        $content = curl_exec($ch); //执行
        curl_close($ch); //关闭连接
		return $content;
}