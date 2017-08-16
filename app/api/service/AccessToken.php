<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/16
 * Time: 13:48
 */

namespace app\api\service;


use think\Exception;

class AccessToken
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function qr_access_token($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(
            config('wx.qr_access_token'),
            $this->wxAppID, $this->wxAppSecret, $this->code);
    }
    public function g_access_token($code){
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(
            config('wx.qr_access_token'),
            $this->wxAppID, $this->wxAppSecret, $this->code);
    }

}