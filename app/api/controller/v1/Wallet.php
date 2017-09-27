<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/26
 * Time: 16:04
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\IncomeExpenses as IncomeExpensesModel;
use app\api\service\Token;
use app\api\service\Token as TokenService;
use app\api\validate\Expenses;
use app\api\validate\PagingParameter;
use app\lib\exception\SuccessMessage;
use app\api\service\Wallet as WalletService;
use app\api\model\IncomeExpensesUser as IncomeExpensesUserModel;
use app\api\model\UserProperty as UserPropertyModel;

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
        $data['fee'] = WalletService::getActPlanFee($data['act_plan_id']);
        IncomeExpensesModel::place($uid,$data);

        return json(new SuccessMessage(),201);
    }

    /**
     * 用户收支明细
     * @param $page
     * @param $size
     * @return array
     */
    public function getIncomeExpensesSummary($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();

        $uid = TokenService::getCurrentUid();
        $pagingData = IncomeExpensesUserModel::incomeExpensesSummary($uid,$page,$size);
        $data = $pagingData->visible(['id','type','create_time','income_expenses.order_no','income_expenses.fee',
            'income_expenses.name'])->toArray();
        $w_s = new WalletService();
        $data = $w_s->withdrawalFee($data);
        $newData = WalletService::getDataByYear($data);

        return [
            'data' => $newData,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 获取我的钱包余额
     * @return $this
     */
    public function getWalletByUser(){
        $uid = TokenService::getCurrentUid();
        $user_property = UserPropertyModel::get(['user_id' => $uid]);

        return $user_property->visible(['user_id','wallet']);
    }

}