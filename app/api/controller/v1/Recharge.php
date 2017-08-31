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


use app\api\model\Recharge as RechargeModel;
use app\api\validate\RechargeWx;
use app\api\service\Recharge as RechargeService;
use app\api\validate\IDMustBePostiveInt;
use app\api\controller\BaseController;

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
        (new IDMustBePostiveInt())->goCheck();
        $pay = new RechargeService($id);
        return $pay->pay();
    }
}