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
use app\api\model\IncomeExpensesUser as IncomeExpensesUserModel;
use app\api\model\Recharge as RechargeModel;
use app\api\model\UserProperty as UserPropertyModel;
use app\api\service\Token;
use app\api\service\Token as TokenService;
use app\api\service\Wallet as WalletService;
use app\api\validate\Expenses;
use app\api\validate\PagingParameter;
use app\lib\exception\SuccessMessage;

class Wallet extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
        'checkPrimaryScope' => ['only' => 'getDetail, getSummaryByUser'],
    ];

    /**
     * 购买行动计划
     * 1 检查参加模式是否包含在行动计划模式内
     *
     * @return \think\response\Json
     */
    public function expensesActPlan()
    {
        (new Expenses())->goCheck();
        $data = input('delete.');
        $uid = TokenService::getCurrentUid();
        $data['fee'] = WalletService::getActPlanFee($data['act_plan_id'],$data['mode']);
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
     * 充值列表
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getRechargeList($page = 1, $size = 15)
    {
        $uid = TokenService::getCurrentUid();
        $where['user_id'] = $uid;
        $where['status'] = 1;
        $pageData = RechargeModel::where($where)
            ->order('create_time DESC')
            ->paginate($size, true, ['page' => $page]);
        $data = $pageData->hidden(['update_time','prepay_id','status'])->toArray();
        $newData = WalletService::getDataByYear($data);

        return [
            'data' => $newData,
            'current_page' => $pageData->currentPage()
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