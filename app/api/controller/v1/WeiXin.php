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
use app\lib\exception\ParameterException;
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

        return $this->amrTransCodingMp3();
//        (new Media_ID())->goCheck();
        $media_id = input('get.media_id');
        $media_id = 'CE2uIlgmnnCIWkNvCgEiDgSLlKdbJRbxHP9ag-X4y72dsp19qN9IGEu0iPHCU2RH';
        $access_token = $this->getAccessToken();
        //保存路径，相对站点路径public，非当前文件的路径
        $path = "./static/audio";
        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        //微信上传下载媒体文件
        $url = sprintf(config('wx.HD_voice'),$access_token,$media_id);
        $filename = "wx_download_".date("YmdHis") . uniqid().".speex";
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

    /**
     * 将amr格式转换成mp3格式
     * @return string
     */
    public function amrTransCodingMp3()
    {
//        $amr = './'.$vo['voice'];
        $amr = '1.amr';
        $msgId = date("YmdHis") . uniqid();
        $dir = $_SERVER['DOCUMENT_ROOT'].'/static/audio/';

//        if(file_exists($mp3) == true){
//           exit('无需转换');
//        }else{
//          $command = "/usr/local/bin/ffmpeg2 -i $amr $mp3";
            $res = exec("ffmpeg -y -i ".$dir.$amr." ".$dir.$msgId.".mp3");
            echo $msgId;

           return $msgId;
//        }

    }

    /**
     * 删除下载微信音频
     * @param $filename
     * @return bool
     * @throws ParameterException
     */
    public function deleteDownloadFile($filename)
    {
        $filename = $_SERVER['DOCUMENT_ROOT'].'/static/audio/'.$filename;
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


}