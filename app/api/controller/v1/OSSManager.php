<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\validate\OSSFilename;
use OSS\Core\OssException;
use OSS\OssClient;
use think\Loader;
use app\lib\exception\ParameterException;

//Loader::import('OSS.sts-server.sts', EXTEND_PATH, '.php');
Loader::import('OSS.oss-h5-upload-js-php.php.get', EXTEND_PATH, '.php');
Loader::import('OSS.Mts.main',EXTEND_PATH,'.php');

class OSSManager extends BaseController
{
    protected $beforeActionList = [
      'checkPrimaryScope' => ['only' => 'getSecurityToken,getPolicySignature,OSSTransCodingMp4']
    ];

//    /**
//     * 获取STS上传凭证
//     * @return array
//     */
//    public function getSecurityToken()
//    {
//        return sts();
//    }

    /**
     * 获取Policy及签名
     *
     * @return array
     */
    public function getPolicySignature()
    {
        return policy();
    }

    /**
     * 服务端签名直传并设置上传回调
     *
     * @return array
     */
    public function getPolicySignatureCallback()
    {
        return policy_callback();
    }

    /**
     * OSS 回调URL
     *
     * @return string
     */
    public function callbackResponse()
    {
        header("Content-Type: application/json");
        $data = array("Status"=>"Ok");
        return $data;

        // 1.获取OSS的签名header和公钥url header
        $authorizationBase64 = "";
        $pubKeyUrlBase64 = "";
        /*
         * 注意：如果要使用HTTP_AUTHORIZATION头，你需要先在apache或者nginx中设置rewrite，以apache为例，修改
         * 配置文件/etc/httpd/conf/httpd.conf(以你的apache安装路径为准)，在DirectoryIndex index.php这行下面增加以下两行
            RewriteEngine On
            RewriteRule .* - [env=HTTP_AUTHORIZATION:%{HTTP:Authorization},last]
         * */
        if (isset($_SERVER['HTTP_AUTHORIZATION']))
        {
            $authorizationBase64 = $_SERVER['HTTP_AUTHORIZATION'];
        }
        if (isset($_SERVER['HTTP_X_OSS_PUB_KEY_URL']))
        {
            $pubKeyUrlBase64 = $_SERVER['HTTP_X_OSS_PUB_KEY_URL'];
        }

        if ($authorizationBase64 == '' || $pubKeyUrlBase64 == '')
        {
            header("http/1.1 403 Forbidden");
            exit();
        }

        // 2.获取OSS的签名
        $authorization = base64_decode($authorizationBase64);

        // 3.获取公钥
        $pubKeyUrl = base64_decode($pubKeyUrlBase64);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $pubKeyUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        $pubKey = curl_exec($ch);
        if ($pubKey == "")
        {
            header("http/1.1 403 Forbidden");
            exit();
        }

        // 4.获取回调body
        $body = file_get_contents('php://input');

        // 5.拼接待签名字符串
        $authStr = '';
        $path = $_SERVER['REQUEST_URI'];
        $pos = strpos($path, '?');
        if ($pos === false)
        {
            $authStr = urldecode($path)."\n".$body;
        }
        else
        {
            $authStr = urldecode(substr($path, 0, $pos)).substr($path, $pos, strlen($path) - $pos)."\n".$body;
        }

        // 6.验证签名
        $ok = openssl_verify($authStr, $authorization, $pubKey, OPENSSL_ALGO_MD5);
        if ($ok == 1)
        {
            header("Content-Type: application/json");
            $data = array("Status"=>"Ok");
            echo json_encode($data);
        }
        else
        {
            //header("http/1.1 403 Forbidden");
            exit();
        }
    }

    /**
     * OSSClient实例
     *
     * @return OssClient
     */
    public function getOssClient()
    {
        $accessKeyId = config('oss.AccessKeyID');
        $accessKeySecret = config('oss.AccessKeySecret');
        $endpoint = config('oss.Endpoint');
        $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);

        return $ossClient;
    }

    /**
     * 上传指定的本地文件内容
     *
     * @param OssClient $ossClient OSSClient实例
     * @param string $bucket 存储空间名称
     * @param string $object 名字
     * @param string $path
     * @return mixed
     */
    function uploadFile($ossClient, $bucket, $object, $path = '')
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'].'/static/oss/'.$path.$object;

        try{
            $res = $ossClient->uploadFile($bucket, $object, $filePath);
            return $res;
        } catch(OssException $e) {
            return [
                'error' => 'FAILED',
                'msg'   => $e->getMessage()
            ];
        }
    }

    /**
     * 分片上传本地文件
     * 通过multipart上传文件
     *
     * @param OssClient $ossClient OSSClient实例
     * @param string $bucket 存储空间名称
     * @param string $object 名字
     * @return mixed
     */
    function multiUploadFile($ossClient, $bucket, $object)
    {
        $file = $_SERVER['DOCUMENT_ROOT'].'/static/oss/'.$object;
        try{
            $res = $ossClient->multiuploadFile($bucket, $object, $file);
            return $res;
        } catch(OssException $e) {
            return [
                'error' => 'FAILED',
                'msg'   => $e->getMessage()
            ];
        }
    }

    /**
     * 上传文件到OSS
     *
     * @param $object
     * @return mixed
     */
    public function uploadOSS($object)
    {
        $ossClient = $this->getOssClient();
        $bucket = config('oss.Bucket');
        $res = $this->uploadFile($ossClient,$bucket,$object);

        return $res;
    }

    /**
     * 上传文件到：输入媒体Bucket
     *
     * @param $object
     * @param $path
     * @return mixed
     */
    public function uploadOSSMtsInput($object,$path = '')
    {
        $ossClient = $this->getOssClient();
        $bucket = config('oss.input_bucket');
        $res = $this->uploadFile($ossClient,$bucket,$object,$path);

        return $res;
    }

    /**
     * 输入媒体Bucket转码，返回输出媒体uri
     *
     * @param string $inputObjectName
     * @return array
     */
    public function OSSAmrTransCodingMp3($inputObjectName)
    {
        $url = submitJobAndWaitJobComplete($inputObjectName);
        return $url;
    }

    /**
     * 删除本地文
     *
     * @param $filename
     * @return bool
     * @throws ParameterException
     */
    public function deleteDownloadFile($filename)
    {
        $filename = $_SERVER['DOCUMENT_ROOT'].'/static/oss/'.$filename;
        if (!unlink($filename))
        {
            throw new ParameterException([
                'msg' => "Error deleting $filename"
            ]);
        }
        else
        {
            return true;
        }
    }

    /**
     * 视频转码
     *
     * @return array
     */
    public function OSSTransCodingMp4()
    {
        (new OSSFilename())->goCheck();
        $filename = input('get.filename');
        $filename = config('oss.user_dir').$filename;
        $url = submitJobAndWaitJobCompleteVideo($filename);
        $process_time = sys_processTime();

        return [
            'msg' => 'OK!',
            'info' => $url,
            'process_time' => $process_time
        ];
    }
}