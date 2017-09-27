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
// | DateTime: 2017/8/31/14:13
// +----------------------------------------------------------------------

namespace app\api\model;


use app\api\service\Token as TokenService;

class Recharge extends BaseModel
{
    protected $autoWriteTimestamp = true;
//    protected $hidden = ['create_time','update_time'];

    /**
     * 创建订单
     * @return array
     */
    public static function createOrder()
    {
        $data['out_trade_no'] = self::makeOrderNo();
        $data['user_id'] = TokenService::getCurrentUid();
        $data['total_fee'] = input('post.total_fee');
        self::create($data);

        return [
            'out_trade_no' => $data['out_trade_no'],
        ];

    }

    /**
     * 创建订单编号
     * @return string
     */
    private static function makeOrderNo()
    {
        $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        $orderSn =
            $yCode[intval(date('Y')) - 2017] . strtoupper(dechex(date('m'))) . date(
                'd') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf(
                '%02d', rand(0, 99));
        return $orderSn;
    }
}