<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/26
 * Time: 16:04
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\IncomeExpenses;
use app\api\service\Token;
use app\api\service\Token as TokenService;
use app\api\validate\Expenses;
use app\lib\exception\SuccessMessage;
use app\api\service\Wallet as WalletService;

class Wallet extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
        'checkPrimaryScope' => ['only' => 'getDetail, getSummaryByUser'],
    ];

    /**
     * 购买行动计划
     * 1 检查参加费用是否和创建行动计划任务费用相同
     * @return \think\response\Json
     */
    public function expensesActPlan()
    {
        (new Expenses())->goCheck();
        $data = input('delete.');
        $uid = TokenService::getCurrentUid();
        WalletService::checkActPlanFee($data['act_plan_id'],$data['fee']);
        IncomeExpenses::place($uid,$data);

        return json(new SuccessMessage(),201);
    }


}