<?php
//    ������demo�������������ٷ�https://www.liminghulian.com</a>������Դ����ʹ���
$channel = $_POST['ch'];
$msg = $_POST['msg'];

$url = "http://api.go-qxd.com:8080/pub?id=" . $channel;


if ($channel && $msg)
{
	curlRequest($url,$msg);
   
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