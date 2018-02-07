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
// | DateTime: 2017/9/25/16:10
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\service\Token as TokenService;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\ActPlan as ActPlanModel;
use app\lib\exception\ParameterException;

class ActPlan
{
    /**
     * 根据社群ID判断此计划是什么类型
     * @param $data
     * @return mixed
     */
    public function getType($data)
    {
        $uid = TokenService::getAnyhowUid();
        foreach ($data as &$v){
            $where['community_id'] = $v['community_id'];
            $where['user_id'] = $uid;
            $arr = CommunityUserModel::get($where);
            $v['type'] = $arr['type'];
        }

        return $data;
    }

    /**
     * 获取行动计划费用
     * 1 判断是否挑战模式参加普通行动计划
     *
     * @param $id
     * @param $mode
     * @return mixed
     * @throws ParameterException
     */
    public  function getActPlanFee($id,$mode)
    {
        $res = ActPlanModel::checkActPlanExists($id);
        if ($res['mode'] == 0){
            if ($mode == 1){
                throw new ParameterException([
                    'msg' => '不能以挑战模式参加该行动计划'
                ]);
            }
        }

        return $res->fee;
    }
}