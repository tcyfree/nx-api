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
// | DateTime: 2017/9/1/16:44
// +----------------------------------------------------------------------

namespace app\api\model;
use app\lib\exception\ParameterException;
use think\Db;
use think\Exception;
use app\api\model\UserProperty as UserPropertyModel;

class IncomeExpenses extends BaseModel
{
    protected $autoWriteTimestamp = true;

    /**
     * 购买处理
     * 1.判断余额是否充足
     * @param $uid
     * @param $data
     * @throws ParameterException
     * @throws \Exception
     */
    public static function place($uid,$data)
    {
        self::checkOrderValid($uid,$data);
        $res = ActPlan::get(['id' => $data['act_plan_id']]);
        $data['name'] = $res['name'];

        Db::startTrans();
        try{
            //记录交易
            $data['order_no'] = self::makeOrderNo();
            self::create([
                'act_plan_id' => $data['act_plan_id'],
                'order_no' => $data['order_no'],
                'fee' => $data['fee'],
                'name' => $data['name']
            ]);
            $dataArray['ie_id'] = self::getLastInsID();

            //支出用户,减少钱包金额
            $dataArray['user_id'] = $uid;
            IncomeExpensesUser::create($dataArray);
            self::updateWallet($dataArray['user_id'],$data['fee'],false);

            //收入用户,增加钱包金额
            $act_plan = ActPlan::get(['id' => $data['act_plan_id']]);
            $community_id = $act_plan->community_id;
            $community_user = CommunityUser::get(['community_id' => $community_id, 'type' => 0]);
            $dataArray['user_id'] = $community_user->user_id;
            $dataArray['type'] = 1;
            IncomeExpensesUser::create($dataArray);
            self::updateWallet($dataArray['user_id'],$data['fee']*(1-config('fee.withdrawal_fee')),true);

            //记录行动计划参加用户
            $actData['user_id'] = $uid;
            $actData['act_plan_id'] = $data['act_plan_id'];
            $actData['mode'] = $data['mode'];
            ActPlanUser::create($actData);

            //更新参加人数
            ActPlan::where('id',$data['act_plan_id'])->setInc('total_participant');

            //将普通用户变成付费用户
            $where['community_id'] = $community_id;
            $where['user_id'] = $uid;
            CommunityUser::update(['pay' => 1],$where);

            Db::commit();

        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }


    }

    /**
     * 检查参加计划数据是否有效
     * @param $uid
     * @param $data
     * @throws ParameterException
     */
    private static function checkOrderValid($uid,$data)
    {
        $user_property = UserProperty::get(['user_id' => $uid]);
        if ($data['fee'] > $user_property->wallet){
            throw new ParameterException([
                'msg' => '余额不足，请先去充值！',
                'errorCode' => 20001
            ]);
        }
        $res = ActPlan::get(['id' => $data['act_plan_id']]);
        if (!$res){
            throw new ParameterException([
                'msg' => '行动计划不存在，请检查ID'
            ]);
        }
        $exists = ActPlanUser::get(['user_id' => $uid, 'act_plan_id' => $data['act_plan_id']]);
        if ($exists){
            throw new ParameterException([
                'msg' => '你已经参加过该行动计划，选择其它行动计划吧'
            ]);
        }
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

    /**
     *  更新用户钱包
     *  success：
     *  true：收入
     *  false：支出
     * @param $uid
     * @param $fee
     * @param $success
     */
    private static function updateWallet($uid, $fee, $success)
    {
        if($success){
            UserPropertyModel::where(['user_id' => $uid])
                ->update([
                    'update_time'  => ['exp','now()'],
                    'wallet' => ['exp','wallet+'.$fee],
                ]);
        }else{
            UserPropertyModel::where(['user_id' => $uid])
                ->update([
                    'update_time'  => ['exp','now()'],
                    'wallet' => ['exp','wallet-'.$fee],
                ]);
        }

    }
}