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
// | DateTime: 2017/9/1/17:08
// +----------------------------------------------------------------------

namespace app\api\model;

class IncomeExpensesUser extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    public function incomeExpenses()
    {
        return $this->hasOne('IncomeExpenses','id','ie_id');
    }

    public static function incomeExpensesSummary($uid,$page,$size)
    {
        $where['user_id'] = $uid;
        $pagingData = self::with('incomeExpenses')
            ->where($where)
            ->group('create_time')
            ->order(['create_time' => 'desc'])
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }
}