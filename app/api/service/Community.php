<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 18:05
 */

namespace app\api\service;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\service\Token as TokenService;
use app\lib\enum\AllowJoinStatusEnum;
use app\lib\exception\CommunityException;
use app\lib\exception\ParameterException;
use app\api\model\Community as CommunityModel;

class Community
{
    /**
     * 校验、过滤重复权限值
     * @param $auth
     * @return string
     * @throws ParameterException
     */
    public static function authFilter($auth)
    {
        $str = str_replace('，', ',', $auth);
        if(empty($str))
        {
            return false;
        }
        $subject = explode(',', $str);

        foreach ($subject as $v)
        {
            $pattern = array(1,2,3,4);
            if (!in_array($v, $pattern))
            {
                throw new ParameterException(['msg' => "'".$v."'不符合规则！"]);
            }
        }
        $res = array_unique($subject);

        return implode(",", $res);
    }

    /**
     * 获取推荐行动社正在行动的总人数
     * 闭包构造子查询
     * @param $data
     * @return mixed
     */
    public static function getSumActing($data)
    {

        foreach ($data as &$v){
            $act_plan_user = new ActPlanUserModel();
            $v['count'] = $act_plan_user
                ->where('finish','0')
                ->where('act_plan_id','in',function ($query) use ($v){
                    $query->table('xds_act_plan')->where('community_id',$v['id'])->field('id');
                })
                ->count('user_id');
        }

        return $data;
    }

    /**
     * 当用户登录时，给出用户和此行动社关联 (社长|管理员|成员)
     * @param $data
     * @return mixed
     */
    public static function getType($data)
    {
        $uid = TokenService::getAnyhowUid();
        foreach ($data as &$v){
            $where['community_id'] = $v['id'];
            $where['user_id'] = $uid;
            $arr = CommunityUserModel::get($where);
            $v['type'] = $arr['type'];

        }
        return $data;
    }

    /**
     * 获取用户和行动社的关联关系
     * 用户已经参加的行动社数量
     * 用户是否加入该行动社
     * @param $data
     * @return mixed
     * @throws ParameterException
     */
    public static function getUserStatus($data)
    {
        $uid = TokenService::getAnyhowUid();

        $community_user = CommunityUserModel::get(['user_id' => $uid, 'community_id' => $data['id']]);
        if(!$community_user){
            $data['user']['join'] = false;
            $data['user']['status'] = null;
            $data['user']['type'] = null;
        }else{
            $data['user']['join'] = true;
            $data['user']['status'] = $community_user['status'];
            $data['user']['type'] = $community_user['type'];
        }


        $obj = new CommunityUserModel();
        $data['user']['count'] = $obj->where(['user_id' => $uid, 'status' =>['neq',1]])->count('user_id');
        return $data;
    }

    /**
     * 1. 判断加入行动社是否存在
     * 2. 判断是否重复加入该行动社
     * @param $id
     * @param $uid
     * @throws ParameterException
     */
    public static function checkCommunityUserExists($id, $uid)
    {
        $community = CommunityModel::get(['id' => $id]);
        if(!$community){
            throw new ParameterException([
                'msg' => '行动社不存在,请检查ID'
            ]);
        }
        $where['community_id'] = $id;
        $where['user_id'] = $uid;
        $where['status'] = ['neq','1'];
        $community_user = CommunityUserModel::get(function ($query) use ($where){
            $query->where($where);
        });
        if($community_user){
            throw new ParameterException([
                'msg' => '已加入该行动社成员，不能重复加入'
            ]);
        }
    }

    /**
     * 判断用户相关的行动是否达到上限5个
     * 不包含已退的行动社
     * @param $uid
     * @throws CommunityException
     */
    public static function checkAllowJoinStatus($uid)
    {
        $obj = new CommunityUserModel();
        $where['user_id'] = $uid;
        $where['status'] = ['neq',1];
        $count = $obj->where($where)->count('user_id');
        if($count == AllowJoinStatusEnum::ALLOW_JOIN_OUT){
            throw new CommunityException([
                'msg' => '加入行动社数量超过5个',
                'code' => 400
            ]);
        }
    }
}