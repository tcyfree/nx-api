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
// | DateTime: 2018/4/3/11:56
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\validate\PreOrder;
use app\api\service\Recharge as RechargeService;
use app\api\service\MiniRecharge as MiniRechargeService;

class Recharge extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getPreOrder']
    ];

    /**
     * 生成预支付交易单
     * 1.检查充值订单是否有效
     * 2.调用统一下单API
     *
     * @param string $id
     * @return mixed
     */
    public function getMiniPreOrder($id = '')
    {
        (new PreOrder())->goCheck();
        $recharge = new RechargeService();
        $recharge->checkOrderValid($id);
        $res = (new MiniRechargeService())->makeWxPreOrder($recharge->totalFee,$recharge->orderNO);
        return $res;
    }

}