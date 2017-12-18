<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/6
 * Time: 13:59
 */

namespace app\api\service;

use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\UserInfo as UserInfoModel;
use app\api\model\ActPlan as ActPlanModel;

class CommunityUser
{
    /**
     * 根据行动社ID获取社长信息
     *
     * @param $community_id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public function getChiefUserInfoByCommunityID($community_id)
    {
        $chief_id = CommunityUserModel::getChiefID($community_id);
        $user_info = UserInfoModel::where(['user_id' => $chief_id])
            ->field(['user_id','nickname','avatar','from'])
            ->find();
        return $user_info;
    }

    /**
     * 获取参加该行动社总人数
     * 1. 不包含已退群人数
     *
     * @param $community_id
     * @return int|string
     */
    public function getSumAllUserCommunity($community_id)
    {
        $where['delete_time'] = 0;
        $where['status'] = ['in','0,2'];
        $where['community_id'] = $community_id;
        $num = CommunityUserModel::where($where)->count();
        return $num;
    }

    /**
     * 获取该行动社下所有行动计划
     * 1. 不包含已删除的
     * @param $community_id
     * @return int|string
     */
    public function getSumAllActPlanCommunity($community_id)
    {
        $where['delete_time'] = 0;
        $where['community_id'] = $community_id;
        $num = ActPlanModel::where($where)->count();
        return $num;
    }
}