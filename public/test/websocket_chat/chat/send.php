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
   exit("ȱ�ٲ���");
}



/**
  ʹ��curl��ʽʵ��get��post����
  @param $url �����url��ַ
  @param $data ���͵�post���� ���Ϊ����Ϊget��ʽ����
  return ������ȡ��������
*/
function curlRequest($url,$data = ''){
        $ch = curl_init();
        $params[CURLOPT_URL] = $url;    //����url��ַ
        $params[CURLOPT_HEADER] = false; //�Ƿ񷵻���Ӧͷ��Ϣ
        $params[CURLOPT_RETURNTRANSFER] = true; //�Ƿ񽫽������
        $params[CURLOPT_FOLLOWLOCATION] = true; //�Ƿ��ض���
		$params[CURLOPT_TIMEOUT] = 30; //��ʱʱ��
		if(!empty($data)){
			$params[CURLOPT_POST] = true;
			$params[CURLOPT_POSTFIELDS] = $data;
        }
		$params[CURLOPT_SSL_VERIFYPEER] = false;//����httpsʱ����,���������������
		$params[CURLOPT_SSL_VERIFYHOST] = false;//����httpsʱ,���������鿴��������
        curl_setopt_array($ch, $params); //����curl����
        $content = curl_exec($ch); //ִ��
        curl_close($ch); //�ر�����
		return $content;
}