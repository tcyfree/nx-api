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

class ActPlan
{
    /**
     * 根据行动社ID判断此计划是什么类型
     * @param $data
     * @return mixed
     */
    public function getType($data)
    {
        $uid = TokenService::getAnyhowUid();
        echo $uid;
        foreach ($data as &$v){
            $where['community_id'] = $v['community_id'];
            $where['user_id'] = $uid;
            $arr = CommunityUserModel::get($where);
            $v['type'] = $arr['type'];
        }

        return $data;
    }
}