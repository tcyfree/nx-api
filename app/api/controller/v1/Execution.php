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
// | DateTime: 2017/10/18/9:38
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Execution as ExecutionModel;
use app\api\service\Token as TokenService;
use app\api\validate\PagingParameter;

class Execution extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'executionTrackerList']
    ];

    /**
     * 行动力记录
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function executionTrackerList($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        $uid = input('get.id');
        if (!$uid){
            $uid = TokenService::getCurrentUid();
        }
        $pageData = ExecutionModel::executionTrackerList($page,$size,$uid);
        $data = $pageData->visible(['mode','update_time','finish','tag','task.id','task.name','task.act_plan.id','task.act_plan.name',
            'task.act_plan.community.id','task.act_plan.community.name']);

        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }
}