<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 18:05
 */

namespace app\api\service;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\AuthUser;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\service\Token as TokenService;
use app\lib\enum\AllowJoinStatusEnum;
use app\lib\exception\CommunityException;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;
use app\api\model\Community as CommunityModel;
use app\api\model\ActPlan as ActPlanModel;
use app\api\model\AuthUser as AuthUserModel;

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
                    $query->table('qxd_act_plan')->where('community_id',$v['id'])->field('id');
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
            $where['delete_time'] = 0;
            $arr = CommunityUserModel::get($where);
            $v['type'] = $arr['type'];

        }
        return $data;
    }

    /**
     * 获取用户和行动社的关联关系
     * 用户已经参加的行动社数量
     * 用户是否加入该行动社
     * 权限值
     *
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
        $data['user']['auth'] = AuthUserModel::getAuthUserWithCommunity($uid,$data['id']);
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
     * 判断用户相关的行动是否达到上限ALLOW_JOIN_OUT
     * 不包含已退的行动社
     * @param $uid
     * @throws CommunityException
     */
    public static function checkAllowJoinStatus($uid)
    {
        $obj = new CommunityUserModel();
        $where['user_id'] = $uid;
        $where['status'] = ['in',[0,2]];
        $count = $obj->where($where)->count('user_id');
        if($count > AllowJoinStatusEnum::ALLOW_JOIN_OUT){
            throw new CommunityException([
                'msg' => '加入行动社数量超过'.AllowJoinStatusEnum::ALLOW_JOIN_OUT.'个',
                'code' => 400
            ]);
        }
    }

    /**
     * 1. 检查该行动社人数是否已达上限
     * 2. 检查付费用户是否达上限
     * 二者满足其一即不然再加入行动社了
     * @param $community_id
     * @throws CommunityException
     */
    public static function checkCommunityUserLimit($community_id)
    {
        $obj = new CommunityUserModel();
        $where['community_id'] = $community_id;
        $where['status'] = ['neq',1];
        $count = $obj->where($where)->count('user_id');

        $community = CommunityModel::get(['id' => $community_id]);
        if($count == $community->scale_num){
            throw new CommunityException([
                'msg' => '该行动社总人数'.$community->scale_num.'上限已满',
                'code' => 400
            ]);
        }

        $where['pay'] = 1;
        $count = $obj->where($where)->count('user_id');

        if($count == $community->pay_num){
            throw new CommunityException([
                'msg' => '该行动社付费总人数'.$community->pay_num.'上限已满',
                'code' => 400
            ]);
        }
    }

    /**
     * 根据行动计划id判断该用户是否参加对应的行动社
     * @param $uid
     * @param $act_plan_id
     * @return bool
     * @throws ParameterException
     */
    public static function checkJoinCommunityByUser($uid, $act_plan_id)
    {
        $data = ActPlanModel::checkActPlanExists($act_plan_id);

        $community_id = $data['community_id'];

        $res = CommunityUserModel::get(['user_id' => $uid, 'community_id' => $community_id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '该用户还未参加此行动计划的行动社'
            ]);
        }else
            return true;
    }

    /**
     * 判断用户是否有权限
     * 1.社长或管理员
     * 2.付费用户
     * @param $where
     * @return bool
     * @throws ForbiddenException
     * @throws ParameterException
     */
    public function checkAuthority($where)
    {
        $res = CommunityUserModel::get($where);
        if (!$res){
            throw new ParameterException([
                'msg' => '还未参加该行动社'
            ]);
        }
        if (($res->type != 2) || ($res->pay == 1)){
            return true;
        }else{
            throw new ForbiddenException([
                'msg' => '你是普通用户，没有此权限！'
            ]);
        }
    }

    /**
     * 检查此行动社管理员权限
     * 1.如果是社长直接放行
     * @param $uid
     * @param $community_id
     * @param $subject
     * @return bool
     * @throws ForbiddenException
     */
    public function checkManagerAuthority($uid,$community_id,$subject)
    {
        $where['to_user_id'] = $uid;
        $where['community_id'] = $community_id;
        $where['delete_time'] = 0;

        $cu_obj = CommunityUserModel::get(['community_id' => $community_id, 'user_id' => $uid]);
        if ($cu_obj->type ==0){
            return true;
        }
        $res = AuthUserModel::get($where);
        if(!$res){
            throw new ForbiddenException();
        }else{
            $pattern = explode(',', $res->auth);
            foreach ($subject as $v){
                if (!in_array($v, $pattern))
                {
                    throw new ForbiddenException();
                }
            }
        }

    }

    /**
     * 检查是否是社长
     * @param $community_id
     * @param $uid
     * @throws ForbiddenException
     */
    public function checkPresident($community_id,$uid)
    {
        $res = CommunityUserModel::get(['community_id' => $community_id, 'user_id' => $uid]);
        if ($res->type !=0){
            throw new ForbiddenException([
                'msg' => '你不是社长，没有此权限！'
            ]);
        }
    }
}