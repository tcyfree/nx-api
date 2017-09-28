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
use OSS\Core\OssException;
use OSS\OssClient;
use think\Loader;

Loader::import('OSS.sts-server.sts', EXTEND_PATH, '.php');
Loader::import('OSS.oss-h5-upload-js-php.php.get', EXTEND_PATH, '.php');

class OSSManager extends BaseController
{
    protected $beforeActionList = [
      'checkPrimaryScope' => ['only' => 'getSecurityToken,getPolicySignature']
    ];

    /**
     * 获取STS上传凭证
     * @return array
     */
    public function getSecurityToken()
    {
        return sts();
    }

    /**
     * 获取Policy及签名
     */
    public function getPolicySignature()
    {
        return policy();
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
     * @return mixed
     */
    function uploadFile($ossClient, $bucket, $object)
    {
        $filePath = $_SERVER['DOCUMENT_ROOT'].'/static/audio/'.$object;

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
     * 上传文件到OSS
     */
    public function uploadOSS()
    {
        $ossClient = $this->getOssClient();
        $bucket = config('oss.Bucket');
        $object = '2.mp3';
        $res = $this->uploadFile($ossClient,$bucket,$object);

        return $res;
    }


}