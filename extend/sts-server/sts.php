<?php

    require_once  'aliyun-php-sdk-core/Config.php';
    use Sts\Request\V20150401 as Sts;
    function read_file($fname)
    {
        $content = '';
        if (!file_exists($fname)) {
           echo "The file $fname does not exist\n";
           exit (0);
        }
        $handle = fopen($fname, "rb");
        while (!feof($handle)) {
            $content .= fread($handle, 10000);
        }
        fclose($handle);
        return $content;
    }

    /**
     * 获取STS凭证
     */
    function sts(){
        $conf = __DIR__.'/config.json';

        $content = read_file($conf);
        $myjsonarray = json_decode($content);

        $accessKeyID = $myjsonarray->AccessKeyID;
        $accessKeySecret = $myjsonarray->AccessKeySecret;
        $roleArn = $myjsonarray->RoleArn;
        $tokenExpire = $myjsonarray->TokenExpireTime;
        $policy = read_file(__DIR__.'/'.($myjsonarray->PolicyFile));

        $iClientProfile = DefaultProfile::getProfile("cn-hangzhou", $accessKeyID, $accessKeySecret);
        $client = new DefaultAcsClient($iClientProfile);

        $request = new Sts\AssumeRoleRequest();
        $request->setRoleSessionName("client_name");
        $request->setRoleArn($roleArn);
        $request->setPolicy($policy);
        $request->setDurationSeconds($tokenExpire);
        $response = $client->doAction($request);

        $rows = array();
        $body = $response->getBody();
        $content = json_decode($body);

        $rows['status'] = $response->getStatus();
        if ($response->getStatus() == 200)
        {
//            $rows['AccessKeyId'] = $content->Credentials->AccessKeyId;
//            $rows['AccessKeySecret'] = $content->Credentials->AccessKeySecret;
            $rows['Expiration'] = date('Y-m-d H:m:s',strtotime('+8 hour',time($content->Credentials->Expiration)));
            $rows['SecurityToken'] = $content->Credentials->SecurityToken;
        }
        else
        {
            $rows['AccessKeyId'] = "";
            $rows['AccessKeySecret'] = "";
            $rows['Expiration'] = "";
            $rows['SecurityToken'] = "";
        }
//        echo json_encode($rows);
        return $rows;
    }
?>