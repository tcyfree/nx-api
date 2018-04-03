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
use think\Exception;

class Recharge
{
    public $orderNO;
    public $totalFee;

    /**
     * 检查充值订单是否有效
     * 1.订单号可能根本就不存在
     * 2.订单号确实是存在的，但是，订单号和当前用户是不匹配的
     * 3.订单有可能已经被支付
     * @param $orderNO
     * @return bool
     * @throws Exception
     * @throws OrderException
     * @throws TokenException
     */
    public function checkOrderValid($orderNO)
    {

        $this->orderNO = $orderNO;
        $order = RechargeModel::where('out_trade_no', '=', $this->orderNO)->find();
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
     *将预支付交易会话标识prepay_id保存到数据库
     * @param $wxOrder
     * @param $orderNO
     */
    public function recordPreOrder($wxOrder, $orderNO)
    {
        RechargeModel::where('out_trade_no', '=', $orderNO)
            ->update(['prepay_id' => $wxOrder['prepay_id'],'update_time' => time()]);
    }
}