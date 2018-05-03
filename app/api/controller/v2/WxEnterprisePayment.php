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
// | DateTime: 2018/5/2/15:37
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\model\Recharge as RechargeModel;
use app\api\service\Token as TokenService;
use app\api\service\WeiXin as WeiXinService;
use app\api\validate\EnterprisePaymentPost;
use app\lib\Util;
use think\Loader;

Loader::import('WxPay.WXTransfer', EXTEND_PATH, '.php');

class WxEnterprisePayment extends BaseController
{
    /**
     * 用户体现，企业转账
     * @return array
     */
    public function deleteEnterprisePayment()
    {
        (new EnterprisePaymentPost())->goCheck();
        $data['openid'] = TokenService::getCurrentTokenVar('openid');
        $data['uid']  = TokenService::getCurrentUid();
        $data['amount'] = input('delete.amount');
        $data['re_user_name'] = input('delete.re_user_name');
        $wxSObj = new WeiXinService();
        $wxSObj->checkWallet($data['uid'],$data['amount']);
        $data['partner_trade_no'] = RechargeModel::makeOrderNo();
        $data['desc'] = config('wx_pay.desc');
        $transferObj = new \WXTransfer();
        $res = $transferObj->mchpay($data['openid'],$data['amount'],$data['partner_trade_no'],$data['desc'],$data['re_user_name']);
        $wxSObj->checkTransfer($res,$data);

        return Util::show($res,'提现成功！');
    }
}