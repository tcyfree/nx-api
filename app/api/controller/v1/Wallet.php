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

class Wallet extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
        'checkPrimaryScope' => ['only' => 'getDetail, getSummaryByUser'],
    ];

    /**
     * 购买行动计划
     * @return \think\response\Json
     */
    public function expensesActPlan()
    {
        (new Expenses())->goCheck();
        $data = input('delete.');
        $uid = TokenService::getCurrentUid();

        IncomeExpenses::place($uid,$data);

        return json(new SuccessMessage(),201);
    }


}