<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/5
 * Time: 10:06
 */

namespace app\api\service;

use app\api\model\Recharge as RechargeModel;
use think\Db;
use think\Exception;
use think\Loader;
use think\Log;

Loader::import('WxPay.lib.WxPay', EXTEND_PATH, '.Api.php');

class WxNotify extends \WxPayNotify
{
    //<xml>
    //<appid><![CDATA[wx2421b1c4370ec43b]]></appid>
    //<attach><![CDATA[支付测试]]></attach>
    //<bank_type><![CDATA[CFT]]></bank_type>
    //<fee_type><![CDATA[CNY]]></fee_type>
    //<is_subscribe><![CDATA[Y]]></is_subscribe>
    //<mch_id><![CDATA[10000100]]></mch_id>
    //<nonce_str><![CDATA[5d2b6c2a8db53831f7eda20af46e531c]]></nonce_str>
    //<openid><![CDATA[oUpF8uMEb4qRXf22hE3X68TekukE]]></openid>
    //<out_trade_no><![CDATA[1409811653]]></out_trade_no>
    //<result_code><![CDATA[SUCCESS]]></result_code>
    //<return_code><![CDATA[SUCCESS]]></return_code>
    //<sign><![CDATA[B552ED6B279343CB493C5DD0D78AB241]]></sign>
    //<sub_mch_id><![CDATA[10000100]]></sub_mch_id>
    //<time_end><![CDATA[20140903131540]]></time_end>
    //<total_fee>1</total_fee>
    //<trade_type><![CDATA[JSAPI]]></trade_type>
    //<transaction_id><![CDATA[1004400740201409030005092168]]></transaction_id>
    //</xml>

    /**
     * 微信异步回调通知处理
     * @param array $data
     * @param string $msg
     * @return bool
     */
    public function NotifyProcess($data, &$msg)
    {
        if ($data['result_code'] == 'SUCCESS')
        {
            $orderNo = $data['out_trade_no'];
            Db::startTrans();
            try
            {
                $order = RechargeModel::where('out_trade_no', '=', $orderNo)
                    ->lock(true)
                    ->find();
                if ($order->status == 0)
                {
                    RechargeModel::where('out_trade_no', '=', $orderNo)
                        ->update(['status' => 1]);
                }
                Db::commit();
                return true;
            }
            catch (Exception $ex)
            {
                Db::rollback();
                Log::error($ex);
                return false;
            }
        }
        else
        {
            return true;
        }
    }


}