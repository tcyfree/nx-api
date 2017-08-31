<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/6/2
 * Time: 5:40
 */

namespace app\lib\enum;


class OrderStatusEnum
{
    // 待支付
    const UNPAID = 0;

    // 已支付
    const PAID =1;

    // 已支付，但人数已满
    const PAID_BUT_OUT_OF = 2;
}