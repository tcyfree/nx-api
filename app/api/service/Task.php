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
// | DateTime: 2017/9/8/18:27
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\ActPlan as ActPlanModel;
use app\api\model\ActPlanUser as ActPlanUserModel;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\Task as TaskModel;
use app\api\model\TaskUser as TaskUserModel;
use app\api\service\Community as CommunityService;
use app\lib\exception\AcceleateTaskException;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;
use app\api\model\TaskFeedbackUsers as TaskFeedbackUsersModel;
use think\Db;
use think\Exception;
use app\api\service\Task as TaskService;

class Task
{

    /**
     * 判断该任务是否为此用户的
     * 1.对社长和有权限的管理员放行
     * @param $uid
     * @param $act_plan_id
     * @return bool
     * @throws ParameterException
     */
    public static function checkTaskByUser($uid,$act_plan_id)
    {
        $auth = (new TaskService())->checkAuthority($uid,$act_plan_id);
        if ($auth){
            return true;
        }
        $act_plan_user = new ActPlanUserModel();
        $res = $act_plan_user->where('act_plan_id','eq', $act_plan_id)
            ->where('user_id',$uid)
            ->find();
        if(!$res){
            throw new ParameterException([
                'msg' =>'该计划你未参加，不能查看任务详情'
            ]);
        }
    }

    /**
     * 判断是否有操作任务权限
     * @param $uid
     * @param $act_plan_id
     * @return bool
     * @throws ParameterException
     */
    public function checkAuthority($uid,$act_plan_id)
    {
        $ap_obj = ActPlanModel::get(['id' => $act_plan_id]);
        if (!$ap_obj){
            throw new ParameterException();
        }else{
            $auth_array[0] = 2;
            $c_obj = new CommunityService();
            $c_obj->checkManagerAuthority($uid,$ap_obj->community_id,$auth_array);
            return true;
        }
    }

    /**
     * 检查加速任务
     * @param $uid
     * @param $data
     * @throws AcceleateTaskException
     * @throws ParameterException
     */
    public function checkAccelerateTask($uid,$data){

        $task = TaskModel::get(['id' => $data['task_id']]);

        if (!$task){
            throw new ParameterException([
                'msg' => '该任务不存在，请检查ID:'.$data['task_id']
            ]);
        }
        TaskUserModel::checkTaskUserFinish($uid,$data['user_id'],$data['task_id']);

        $where['user_id'] = $data['user_id'];
        $where['act_plan_id'] = $task['act_plan_id'];
        $act_plan_user = ActPlanUserModel::where($where)->field('mode')->find();
        if (!$act_plan_user){
            throw new ParameterException([
                'msg' => '该用户还未参加加速行动计划'
            ]);
        }
        if ($act_plan_user['mode'] == 1){
            throw new ParameterException([
                'msg' => '挑战者模式不能被加速！'
            ]);
        }
    }

    /**
     * 判断用户是否完成该任务
     * 判断上一个任务是否完成 last_task_finish null 还未开始 0 正在执行 1 已完成
     * @param $data
     * @param $uid
     * @return mixed
     */
    public function checkTaskFinish($data, $uid){
        $res = TaskUserModel::where(['user_id' => $uid])->field('task_id')->select()->toArray();
        $patternArray = [];
        foreach ($res as $v) {
            $patternArray[] = $v['task_id'];
        }
        foreach ($data as $k => &$v) {
            $v['finish'] = 0;
            if ((in_array($v['id'],$patternArray))){
                $task_user = TaskUserModel::get(['user_id' => $uid,'task_id' => $v['id']]);
                $v['finish'] = $task_user['finish'];
            }
//            try{
//                $last_task_user = TaskUserModel::get(['user_id' => $uid,'task_id' => $data[$k-1]['id']]);
//                $v['last_task_finish'] = $last_task_user['finish'];
//            }catch (Exception $ex){
//                //当第一个任务
//                $v['last_task_finish'] = 1;
//            }
        }
        return $data;
    }

    /**
     * 获取随机反馈人：社长、管理员
     *
     *备选人和反馈用户表差集
     *
     * 1 反馈表没有用户或备选人和反馈用户表差集不为空，则从备选人中随机挑选一位
     * 2 备选人和反馈用户表差集为空，按备选人在反馈表中tag值最小结果集随机挑选一位
     * 3 在反馈表中查询出的用户可能不在备选人中
     * @param $task_id
     * @return mixed
     */
    public function getRandManagerID($task_id)
    {
        $community_id = TaskModel::getCommunityIDByTaskID($task_id);

        $manager_ids = CommunityUserModel::getManagerID($community_id);
        $new_manager = $this->twoToOneDimensionalArrays($manager_ids);

        $feedback_users = TaskFeedbackUsersModel::getUserIDS($community_id);
        if ($feedback_users){
            $new_feedback = $this->twoToOneDimensionalArrays($feedback_users);

            $intersection = array_diff($new_manager,$new_feedback);
            if ($intersection){
                $user_id = $this->randManagerID($intersection,$community_id);

            }else{
                $user_id = $this->randFeedbackUser($new_manager,$community_id);
            }

        }else{
            $user_id = $this->randManagerID($new_manager,$community_id);
        }


        return $user_id;
    }

    /**
     * 排除获取反馈表不在备选人中的用户
     * 为了不让tag最小的一直到和其它同样时才能随机，所以每次有新的备选人就更新所有tag为1
     *
     * 从新的备选中里tag最小中获取第一个人，更新被选中者的tag + 1
     *
     * @param $new_manager
     * @param $community_id
     */
    public function randFeedbackUser($new_manager,$community_id)
    {
        $where['community_id'] = $community_id;

//        TaskFeedbackUsersModel::update(['tag' => 1],['community_id' => $community_id]);

        $data = TaskFeedbackUsersModel::where($where)
            ->field('user_id,tag')
            ->order('tag ASC')
            ->select()
            ->toArray();
//        $sqlStr = "SELECT * FROM qxd_task_feedback_users WHERE tag =
//                  (SELECT min(tag) FROM qxd_task_feedback_users  WHERE
//                  community_id = '$community_id'";
//        $data = Db::query($sqlStr);

        foreach ($data as $v)
        {
            $user_id = $v['user_id'];
            if (in_array($user_id,$new_manager)){
                break;
            }
        }

        $where['user_id'] = $user_id;
        Db::table('qxd_task_feedback_users')->where($where)->setInc('tag');

        return $user_id;
    }

    /**
     * 在备选人中随机抽取一位
     *
     * 1 将备选者记录到反馈用户表中，同时更新所有tag为1
     * @param $managers
     * @param $community_id
     * @return mixed
     */
    public function randManagerID($managers,$community_id)
    {
        $rand_index = array_rand($managers);
        $user_id = $managers[$rand_index];
        $data['user_id'] = $user_id;
        $data['community_id'] = $community_id;
        TaskFeedbackUsersModel::create($data);
        TaskFeedbackUsersModel::update(['tag' => 1],['community_id' => $community_id]);
        return $user_id;
    }

    /**
     * 将二维数组变成一维数组
     *
     * @param $twos
     * @return array
     */
    public function twoToOneDimensionalArrays($twos)
    {
        $new_array = [];
        foreach ($twos as $v){
            $new_array[] = $v['user_id'];
        }

        return $new_array;
    }

    /**
     * 判断是否有点评反馈权限
     *
     * @param $uid
     * @param $task_id
     * @return bool
     * @throws ParameterException
     */
    public function checkFeedbackAuthority($uid,$task_id)
    {
        $community_id = TaskModel::getCommunityIDByTaskID($task_id);
        $auth_array[0] = 4;
        $c_obj = new CommunityService();
        $res = $c_obj->checkNewManagerAuthority($uid,$community_id,$auth_array);
        return $res;
    }

    /**
     * 是否为社长和管理员
     *
     * @param $uid
     * @param $act_plan_id
     * @return bool
     * @throws ForbiddenException
     */
    public function checkManager($uid,$act_plan_id)
    {
        $res = ActPlanModel::checkActPlanExists($act_plan_id);
        $community_user = CommunityUserModel::get(['user_id' => $uid, 'community_id' => $res['community_id']]);
        if ($community_user['type'] == 2){
            throw new ForbiddenException();
        }else return true;
    }

}