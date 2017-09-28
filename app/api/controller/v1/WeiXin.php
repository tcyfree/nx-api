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
use app\api\validate\Media_ID;
use think\Cache;

class WeiXin extends BaseController
{

    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'getDownloadMediaUri']
    ];

    /**
     * media_id为微信jssdk接口上传后返回的媒体id
     */
    public function getDownloadMediaUri(){
//        (new Media_ID())->goCheck();
        $media_id = input('get.media_id');
        $media_id = 'CE2uIlgmnnCIWkNvCgEiDgSLlKdbJRbxHP9ag-X4y72dsp19qN9IGEu0iPHCU2RH';
        $redis = Cache::store('redis');
        $wx_access_token = $redis->get('wx_access_token');
        if (!$wx_access_token){
            $access_token = $this->getAccessToken();
        }else{
            $access_token = $wx_access_token;
        }

        //保存路径，相对站点路径public，非当前文件的路径
        $path = "./static/audio";
        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        //微信上传下载媒体文件
        $url = sprintf(config('wx.HD_voice'),$access_token,$media_id);
        echo $url;
//        $url = 'https://api.weixin.qq.com/cgi-bin/media/get/jssdk?access_token=dypPaktQ2LYdr95OV1doD70Hf0xDPiTTiYdTV
//                z5eNnUeQdf0J1qwxT43o4DUCZcEgivWgMoTD5zvhF9IsnAmKH-cAMkP5okLimHlGH_GiJoTv9Yg861OEOODv_A5zgZpESCdAEAKYIN&media_id=89GWuCk0UhNTxQBUIYaIqbQeb-4hdzZxA0Tt7YnkNC6RPsBLM0e4S9JB-sTJMC6X ';
//        $url = 'http://api.xingdongshe.com/static/audio/2.mp3';
        $filename = "wx_download_".date("YmdHis") . uniqid().".amr";
        $this->downAndSaveFile($url,$path."/".$filename);

        $oss_upload = new OSSManager();
        $res = $oss_upload->uploadOSS($filename);
        $res['process_time'] = sys_processTime();

        return $res;
    }

    /**
     * 根据URL地址，下载文件
     * @param $url
     * @param $savePath
     */
    public function downAndSaveFile($url,$savePath){
        ob_start();
        readfile($url);
        $img  = ob_get_contents();
        ob_end_clean();
        $size = strlen($img);
        $fp = fopen($savePath, 'a');
        fwrite($fp, $img);
        fclose($fp);
    }


}