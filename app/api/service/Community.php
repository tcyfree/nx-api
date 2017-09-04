<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/25
 * Time: 18:05
 */

namespace app\api\service;
use app\lib\exception\ParameterException;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\service\Token as TokenService;
use think\Exception;
use app\api\model\CommunityUser as CommunityUserModel;

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
}