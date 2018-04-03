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
// | DateTime: 2017/8/31/10:49
// +----------------------------------------------------------------------

namespace app\api\service;


use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use think\Loader;
use think\Log;

//   extend/WxPay/WxPay.Api.php
//  类库导入：如果你不需要系统的自动加载功能，又或者没有使用命名空间的话，那么也可以使用think\Loader类的import方法手动加载类库文件
//  extend目录比较特别，如果有命名空间的话，TP5会自动加载类库
Loader::import('WxMiniPay.lib.WxPay', EXTEND_PATH, '.Api.php');

class MiniRecharge
{
    /**
     * 生产微信预支付订单
     * @param $totalPrice
     * @param $orderNO
     * @return array
     * @throws TokenException
     */
    public function makeWxPreOrder($totalPrice, $orderNO)
    {
        //openid:通过令牌来换取openid
        $openid = Token::getCurrentTokenVar('openid');
        if (!$openid)
        {
            throw new TokenException();
        }
        $wxOrderData = new \WxPayUnifiedOrder();
        $wxOrderData->SetOut_trade_no($orderNO);
        $wxOrderData->SetTrade_type('JSAPI');
        $wxOrderData->SetTotal_fee($totalPrice * 100);
        $wxOrderData->SetBody('暖象');
        $wxOrderData->SetOpenid($openid);
        $wxOrderData->SetNotify_url(config('secure.pay_back_url'));
        return $this->getPaySignature($wxOrderData, $orderNO);
    }

    /**
     * 1.调用统一下单API
     * 2.返回预支付订单信息(prepay_id)
     * 3.将预支付交易会话标识prepay_id保存到数据库
     * @param $wxOrderData
     * @param $orderNO
     * @return array
     * @throws Exception
     */
    private function getPaySignature($wxOrderData, $orderNO)
    {
        $wxOrder = \WxPayApi::unifiedOrder($wxOrderData);
        if ($wxOrder['return_code'] != 'SUCCESS' || $wxOrder['result_code'] != 'SUCCESS')
        {
            Log::record($wxOrder, 'error');
            Log::record('获取预支付订单失败', 'error');
            throw new WeChatException([
                'msg' => $wxOrder
            ]);
        }
        //prepay_id
        (new Recharge())->recordPreOrder($wxOrder, $orderNO);
        $signature = $this->sign($wxOrder);
        return $signature;
    }

    /**
     * 签名，在一定程度保护参数不被篡改
     * @param $wxOrder
     * @return array
     */
    private function sign($wxOrder)
    {
        $jsApiPayData = new \WxPayJsApiPay();
        $jsApiPayData->SetAppid(config('wx.mini_app_id'));
        $jsApiPayData->SetTimeStamp((string)time());

        $rand = md5(time() . mt_rand(0, 1000));
        $jsApiPayData->SetNonceStr($rand);

        $jsApiPayData->SetPackage('prepay_id='.$wxOrder['prepay_id']);
        $jsApiPayData->SetSignType('md5');

//        $sign = $jsApiPayData->MakeSign();
        $rawValues = $jsApiPayData->GetValues();
//        $rawValues['paySign'] = $sign;

//        unset($rawValues['appId']);

        return $rawValues;
    }

}