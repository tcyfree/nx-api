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
// | DateTime: 2018/1/17/10:16
// +----------------------------------------------------------------------
namespace app\api\controller\admin;

use app\api\controller\BaseController;
use app\api\model\Community as CommunityModel;
use app\api\model\User as UserModel;
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\Course as CourseModel;
use app\api\model\Activity as ActivityModel;
use app\api\model\IncomeExpenses as IncomeExpensesModel;
use think\Request;

class Report extends BaseController
{
    protected $beforeActionList = [
        'checkAdminScope' => ['only' => 'getReport']
    ];
    /**
     * 数据报表
     *
     * @return mixed
     */
    public function getReport()
    {
        $request = Request::instance();
        $data['params'] = $request->param();
        $token = Request::instance()
            ->header('token');
        $data['token'] = $token;
        $data['community_count'] = CommunityModel::getSum();
        $data['user_count'] = UserModel::getSum();
        $data['act_plan_count'] = ActPlanModel::getSum();
        $data['course_count'] = CourseModel::getSum();
        $data['activity_count'] = ActivityModel::getSum();
        $data['income_expenses'] = IncomeExpensesModel::getNetIncome();
        return $data;
    }
}