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
// | DateTime: 2017/9/25/9:58
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\WeiXin as WeiXinService;
use app\api\validate\Media_ID;

class WeiXin extends BaseController
{

    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getDownloadMediaUri']
    ];

    /**
     * media_id:媒体文件ID
     * 1 从微信服务器下载音频文件amr到服务器
     * 2 上传amr文件到OSS输入媒体Bucket
     * 3 OSS提交转码作业，等待转码uri
     * 4 删除本地下载的amr文件
     * @return mixed
     */
    public function getDownloadMediaUri()
    {
        (new Media_ID())->goCheck();
        $media_id = input('get.media_id');
        $prefix_filename = "wx_download_".date("YmdHis") . uniqid();
        $filename = $prefix_filename.".amr";

        $this->WXDownloadByUri($media_id, $filename);
        $wx = new WeiXinService();
        $oss_upload = new OSSManager();
        $res = $oss_upload->uploadOSSMtsInput($filename);
        $oss_manager = new OSSManager();
        $url = $oss_manager->OSSAmrTransCodingMp3($prefix_filename);
        $wx->deleteDownloadFile($filename);
        $process_time = sys_processTime();

        return [
            'msg' => 'OK!',
            'info' => $url,
            'process_time' => $process_time
        ];
    }

    /**
     * 从微信下载音频素材
     *
     * @param $media_id
     * @param $filename
     */
    private function WXDownloadByUri($media_id, $filename)
    {
        $access_token = $this->getAccessToken();
        //保存路径，相对站点路径public，非当前文件的路径
        $path = "./static/audio";
        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        //微信下载媒体文件amr
        $url = sprintf(config('wx.temporary_material'),$access_token,$media_id);
        $wx_download = new WeiXinService();
        $wx_download->downAndSaveFile($url,$path."/".$filename);
    }

}