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
// | DateTime: 2018/1/17/11:47
// +----------------------------------------------------------------------

namespace app\api\controller\admin;


use app\api\controller\BaseController;
use app\api\model\User as UserModel;
use app\api\model\IncomeExpensesUser as IncomeExpensesUserModel;

class User extends BaseController
{
    /**
     * 用户列表 + 收支
     * 收入：保留两位小数
     *
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public function getUserList($page= 1, $size = 15)
    {
        $pageData = UserModel::getList($page,$size);
        $data = $pageData->toArray();
        foreach ($data['data'] as &$v){
            $v['total_income'] = round(IncomeExpensesUserModel::getSumIncomeOrExpenses($v['id'],1)
                *(1 - config('fee.withdrawal_fee')),2);
            $v['total_expenses'] = IncomeExpensesUserModel::getSumIncomeOrExpenses($v['id'],0);
        }
        return $data;
    }
}