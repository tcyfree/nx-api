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

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Recharge as RechargeModel;
use app\api\service\Recharge as RechargeService;
use app\api\validate\PreOrder;
use app\api\validate\RechargeWx;
use app\api\service\WxNotify;

class Recharge extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];

    /**
     * 创建订单
     * @return array
     */
    public function createWXOrder()
    {
        (new RechargeWx())->goCheck();
        $data = RechargeModel::createOrder();
        return $data;
    }

    /**
     * 生成预支付交易单
     * @param string $id
     * @return mixed
     */
    public function getPreOrder($id = '')
    {
        (new PreOrder())->goCheck();
        $pay = new RechargeService($id);
        return $pay->pay();
    }

    /**
     * 支付结果回调通知
     * 通知频率为15/15/30/180/1800/1800/1800/1800/3600，单位：秒
     * 更新这个充值订单的status状态
     * 如果成功处理，我们返回微信成功处理的信息。否则，我们需要返回没有成功处理。
     * 特点：post；xml格式；不会携带参数
     */
    public function receiveNotify()
    {
        $notify = new WxNotify();
        $msg = $notify->Handle();
        $error_log = LOG_PATH.'wx_notify_error.log';
        file_put_contents($error_log, $msg.' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
    }
}