<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/6
 * Time: 13:59
 */

namespace app\api\service;

use app\api\model\Activity as ActivityModel;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\Course as CourseModel;
use app\api\model\UserInfo as UserInfoModel;
use app\api\model\ActPlan as ActPlanModel;
use app\lib\exception\ParameterException;

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
//            ->field(['user_id','nickname','avatar','from'])
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
     * 获取参加该行动社总付费人数
     * 1. 不包含已退群人数
     *
     * @param $community_id
     * @return int|string
     */
    public function getSumAllPayUserCommunity($community_id)
    {
        $where['delete_time'] = 0;
        $where['status'] = ['in','0,2'];
        $where['pay'] = 1;
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

    /**
     * 获取该行动社下所有互动课程
     * 1. 不包含已删除的
     * @param $community_id
     * @return int|string
     */
    public function getSumAllCourseCommunity($community_id)
    {
        $where['delete_time'] = 0;
        $where['community_id'] = $community_id;
        $num = CourseModel::where($where)->count();
        return $num;
    }
    /**
     * 获取该行动社下所有社群活动
     * 1. 不包含已删除的
     * @param $community_id
     * @return int|string
     */
    public function getSumAllActivityCommunity($community_id)
    {
        $where['delete_time'] = 0;
        $where['community_id'] = $community_id;
        $num = ActivityModel::where($where)->count();
        return $num;
    }

    /**
     * 只有社长才拥有的权限
     * @param $uid
     * @param $community_id
     * @throws ParameterException
     */
    public function checkChiefAuth($uid,$community_id)
    {
        $chief_id = CommunityUserModel::getChiefID($community_id);
        if ($uid != $chief_id){
            throw new ParameterException([
                'msg' => '不是社长，没有该权限'
            ]);
        }
    }
}