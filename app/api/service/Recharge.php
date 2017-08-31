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


use app\api\model\Recharge as RechargeModel;
use app\lib\enum\OrderStatusEnum;
use app\lib\exception\OrderException;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;
use think\Loader;
use think\Log;

//   extend/WxPay/WxPay.Api.php
//  类库导入：如果你不需要系统的自动加载功能，又或者没有使用命名空间的话，那么也可以使用think\Loader类的import方法手动加载类库文件
//  extend目录比较特别，如果有命名空间的话，TP5会自动加载类库
Loader::import('WxPay.lib.WxPay', EXTEND_PATH, '.Api.php');

class Recharge
{
    private $orderNO;
    private $totalFee;

    function __construct($orderNO)
    {
        if (!$orderNO)
        {
            throw new Exception('订单号不允许为NULL');
        }
        $this->orderNO = $orderNO;
    }

    /**
     * 1.检查充值订单是否有效
     * 2.调用统一下单API
     * @return array
     */
    public function pay()
    {
        $this->checkOrderValid();

        return $this->makeWxPreOrder($this->totalFee);
    }
    /**
     * 检查充值订单是否有效
     * 1.订单号可能根本就不存在
     * 2.订单号确实是存在的，但是，订单号和当前用户是不匹配的
     * 3.订单有可能已经被支付
     * @return bool
     * @throws OrderException
     * @throws TokenException
     */
    private function checkOrderValid()
    {
        $order = RechargeModel::where('out_trade_no', '=', $this->orderNO)
            ->find();
        if (!$order)
        {
            throw new OrderException();
        }
        if (!Token::isValidOperate($order->user_id))
        {
            throw new TokenException(
                [
                    'msg' => '订单与用户不匹配',
                    'errorCode' => 10003
                ]);
        }
        if ($order->status != OrderStatusEnum::UNPAID)
        {
            throw new OrderException(
                [
                    'msg' => '订单已支付过啦',
                    'errorCode' => 80003,
                    'code' => 400
                ]);
        }

        $this->totalFee = $order->total_fee;
        return true;
    }

    /**
     * 生产微信预支付订单
     * @param $totalPrice
     * @return array
     * @throws TokenException
     */
    private function makeWxPreOrder($totalPrice)
    {
        //openid:通过令牌来换取openid
        $openid = Token::getCurrentTokenVar('openid');
        if (!$openid)
        {
            throw new TokenException();
        }
        $wxOrderData = new \WxPayUnifiedOrder();
        $wxOrderData->SetOut_trade_no($this->orderNO);
        $wxOrderData->SetTrade_type('JSAPI');
        $wxOrderData->SetTotal_fee($totalPrice * 100);
        $wxOrderData->SetBody('暖象');
        $wxOrderData->SetOpenid($openid);
        $wxOrderData->SetNotify_url('auth.xingdongshe.com');
        return $this->getPaySignature($wxOrderData);
    }

    /**
     * 1.调用统一下单API
     * 2.返回预支付订单信息(prepay_id)
     * 3.将预支付交易会话标识prepay_id保存到数据库
     * @param $wxOrderData
     * @return array
     * @throws Exception
     */
    private function getPaySignature($wxOrderData)
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
        $this->recordPreOrder($wxOrder);
        $signature = $this->sign($wxOrder);
        return $signature;
    }

    /**
     * 签名
     * @param $wxOrder
     * @return array
     */
    private function sign($wxOrder)
    {
        $jsApiPayData = new \WxPayJsApiPay();
        $jsApiPayData->SetAppid(config('wx.app_id'));
        $jsApiPayData->SetTimeStamp((string)time());

        $rand = md5(time() . mt_rand(0, 1000));
        $jsApiPayData->SetNonceStr($rand);

        $jsApiPayData->SetPackage('prepay_id='.$wxOrder['prepay_id']);
        $jsApiPayData->SetSignType('md5');

        $sign = $jsApiPayData->MakeSign();
        $rawValues = $jsApiPayData->GetValues();
        $rawValues['paySign'] = $sign;

        unset($rawValues['appId']);

        return $rawValues;
    }

    /**
     *将预支付交易会话标识prepay_id保存到数据库
     * @param $wxOrder
     */
    private function recordPreOrder($wxOrder)
    {
        RechargeModel::where('out_trade_no', '=', $this->orderNO)
            ->update(['prepay_id' => $wxOrder['prepay_id']]);
    }
}