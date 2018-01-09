<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\AuthUser;
use app\api\model\AuthUser as AuthUserModel;
use app\api\model\Community as CommunityModel;
use app\api\model\CommunityTransfer;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\model\CommunityUser;
use app\api\model\Report as ReportModel;
use app\api\service\Community as CommunityService;
use app\api\service\Token as TokenService;
use app\api\service\User as UserService;
use app\api\validate\Community as CommunityValidate;
use app\api\validate\CommunityNew as CommunityNewValidate;
use app\api\validate\NicknameAndAuth;
use app\api\validate\PagingParameter;
use app\api\validate\Report;
use app\api\validate\SearchName;
use app\api\validate\SetManager;
use app\api\validate\SuspendMember;
use app\api\validate\Transfer;
use app\api\validate\Type;
use app\api\validate\UUID;
use app\lib\exception\CommunityException;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UpdateNumException;
use think\Db;
use think\Exception;
use app\api\model\CommunityUserRecord;
use app\api\service\ImageProcessing as ImageProcessingService;
use app\api\model\User as UserModel;
use app\api\model\UserInfo as UserInfoModel;
use app\api\model\Callback as CallbackModel;
use app\api\service\CommunityUser as CommunityUserService;

class Community extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createCommunity']
    ];

    /**
     * 创建行动社
     * 1.名称不能重复
     * 2.判断是否和用户相关的行动是否达到上限5个
     * 3.生成二维码
     * 4.删除多余字段：qr_prefix_url
     * 5.logo圆角矩形，圆角图片拷贝到二维码中央后合成二维码
     *
     * @return array
     * @throws Exception
     * @throws ParameterException
     */
    public function createCommunity()
    {
        $validate = new CommunityNewValidate();
        $validate->goCheck();

        $data['user_id'] = TokenService::getCurrentUid();
        CommunityService::checkManagerAllowJoinStatus($data['user_id']);
        $dataArray = $validate->getDataByRule(input('post.'));

        $res = CommunityModel::get(['name' => $dataArray['name']]);
        if($res){
            throw new ParameterException(
                [
                    'msg' => "'".$dataArray['name']."'已经存在了！"
                ]);
        }

        $dataArray['id'] = uuid();
        $dataArray['outside_id'] = number();

        $image_process = new ImageProcessingService();
        $url = $dataArray['qr_prefix_url'].$dataArray['id'];
        $logo = $dataArray['cover_image'].config('oss.rounded-corners');
        $res = $image_process->getQRCodeByCoverImage($url,$logo);
        $dataArray['qr_code'] = $res['oss-request-url'];
        //开启事物
        Db::startTrans();
        try
        {
            unset($dataArray['qr_prefix_url']);
            $community = CommunityModel::create($dataArray)->toArray();
            $data['community_id'] = $community['id'];
            $data['type'] = 0;
            CommunityUserModel::create($data);
            Db::commit();

            return [
                'id' => $community['id'],
                'msg' => 'ok',
                'errorCode' => 0
            ];
//            return json(new SuccessMessage(), 201);
        }
        catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
    }

    /**
     * 编辑行动社
     * 1.更新二维码
     *
     * @return \think\response\Json
     * @throws ParameterException
     * @throws UpdateNumException
     * @throws \Exception
     */
    public function updateCommunity()
    {
        (new UUID())->goCheck();
        $validate = new CommunityValidate();
        $validate->goCheck();
        $uid = TokenService::getCurrentUid();
        $data['user_id'] = $uid;
        $dataArray = $validate->getDataByRule(input('put.'));
        $id = $dataArray['id'];
        CommunityModel::checkCommunityExists($id);
        CommunityUserModel::checkCommunityBelongsToUser($uid, $id);
        CommunityModel::checkNameUpdate($id,$dataArray['name']);
        //开启事物
        Db::startTrans();
        try
        {
            $result = CommunityModel::get(['id' =>$id]);
            $result = $result->toArray();
            if($result['update_num'] == 0){
                throw new UpdateNumException();
            }
            $logo = $dataArray['cover_image'].config('oss.rounded-corners');
            $image_process = new ImageProcessingService();
            $dataArray['qr_prefix_url'] = 'http://weixin.go-qxd.com/template/groupPage.html?id=';
            $url = $dataArray['qr_prefix_url'].$dataArray['id'];
            $res = $image_process->getQRCodeByCoverImage($url,$logo);
            $dataArray['qr_code'] = $res['oss-request-url'];
            unset($dataArray['qr_prefix_url']);
            CommunityModel::update($dataArray,['id'=>$id]);
            //自减修改次数
            CommunityModel::where('id',$id)->setDec('update_num');
            Db::commit();

            return json(new SuccessMessage(), 201);
        }
        catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
    }

    /**
     * 分页获取行动社列表
     * @param int $page
     * @param int $size
     * @param int $type
     * @return array
     */
    public function getSummaryByUser($type,$page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new Type())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingData = CommunityUserModel::getSummaryByUser($uid, $type, $page, $size);

        $data = $pagingData->visible(['community_id','type', 'community.name',
            'community.description', 'community.cover_image', 'community.level'])
            ->toArray();
        foreach ($data as &$v){
            $v['chief_user'] = (new CommunityUserService())->getChiefUserInfoByCommunityID($v['community_id']);
        }
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 分页获取推荐行动社
     * 1. 参加人数
     * 2. 行动计划
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getRecommendSummary($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();

        $pagingData = CommunityModel::getSummaryList($page, $size);

        $data = $pagingData->visible(['id','name', 'description', 'cover_image', 'level'])
            ->toArray();

        $data = CommunityService::getSumActing($data);
        $data = CommunityService::getType($data);
        foreach ($data as $k => $v){
            $c_u = new CommunityUserService();
            $data[$k]['all_join_user'] = $c_u->getSumAllUserCommunity($v['id']);
            $data[$k]['all_act_plan'] = $c_u->getSumAllActPlanCommunity($v['id']);
        }

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 行动社详情
     * 1. 获取用户管理权限
     * 2. 社长信息
     * 3. 所有参加人数
     * 4. 所有行动计划
     * 5.行动社_社长简介
     *
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     * @throws CommunityException
     */
    public function getDetail($id)
    {
        (new UUID())->goCheck();
        $communityDetail = CommunityModel::detailWithActPlan($id);
        if (!$communityDetail)
        {
            throw new CommunityException();
        }
        $data = $communityDetail->hidden([''])->toArray();
        $data = CommunityService::getUserStatus($data);
        $c_u = new CommunityUserService();
        $data['chief_user'] = $c_u->getChiefUserInfoByCommunityID($id);
        $data['all_join_user'] = $c_u->getSumAllUserCommunity($id);
        $data['all_act_plan'] = $c_u->getSumAllActPlanCommunity($id);
        $data['community_chief_user'] = CommunityUser::get(['community_id' => $id,'type' => 0]);

        return $data;
    }

    /**
     * 更新行动社编辑次数为3
     * 1.限制只能自己服务器IP才能执行此接口
     */
    public function initUpdateNum()
    {
        $request_ip =  request()->ip();
        $allow_ip_array = config('secure.allow_ip');
        $allow = false;
        foreach ($allow_ip_array as $value){
            if ($request_ip == $value){
                $allow = true;
                break;
            }
        }
        if ($allow){
            $date['update_num'] = 3;
            CommunityModel::update($date,'1 = 1');
            return json(new SuccessMessage(), 201);
        }else{
            throw new ForbiddenException();
        }
    }

    /**
     * 允许被搜索和推荐
     * @param $id
     * @param $type
     * @return null|static
     */
    public function permitOrRefuse($id,$type)
    {
        (new UUID())->goCheck();
        (new Type())->goCheck();

        $uid = TokenService::getCurrentUid();
        $res = CommunityUserModel::checkCommunityBelongsToUser($uid,$id);
        $community_id = $res['community_id'];

        CommunityModel::update(['search' => $type-1],['id' => $community_id]);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 成员列表
     * 权限：社长、管理员、付费用户
     * 将自己user_id 加入列表中
     * 按拼音分组，A-Z和#
     *
     * @param $id
     * @param $page
     * @param $size
     * @return array
     */
    public function getMemberList($id,$page = 1, $size = 15)
    {
        (new UUID())->goCheck();
        (new PagingParameter())->goCheck();

        $cs = new CommunityService();
        $params['community_id'] = $id;
        $uid = TokenService::getCurrentUid();
        $params['user_id'] = $uid;
        $cs->checkAuthority($params);
        $page = $page - 1;

        $pay = '1';
        $type = '2';
        $data = Db::table('qxd_community_user')
            ->alias('c_u')
            ->join('__USER_INFO__ u_i','c_u.user_id = u_i.user_id')
            ->join('__USER__ u','u_i.user_id = u.id')
            ->where('(c_u.pay = '."'".$pay."'".' OR c_u.type <> '."'".$type."'".') AND c_u.community_id = '."'".$id."'")
            ->order('u_i.char_index ASC')
            ->field('c_u.type,c_u.pay,c_u.status,u_i.user_id,u_i.nickname,u_i.char_index,u_i.avatar,u_i.from,u.number')
            ->limit($page,$size)
            ->select()
            ->toArray();
        foreach ($data as &$v) {
            if ($v['from'] == '0'){
                $v['avatar'] = config('setting.img_prefix').$v['avatar'];
            }
        }
        $newData = [];
        //按照拼音首字母分组
        foreach ($data as &$v) {
            $pattern = '/[A-Z]/';
            $subject = $v['char_index'];
            $res = preg_match($pattern,$subject);
            if (!$res){
                $newData['#'][] = $v;
            }else{
                $newData[$v['char_index']][] = $v;
            }
        }

        $data['user_id'] = $uid;
        $newData['user_id'] = $uid;
        return [
            'origin_data' => $data,
            'data' => $newData,
            'current_page' => $page + 1
        ];
    }

    /**
     *根据number获取用户信息和对应权限
     *
     */
    public function getNicknameAndAuth()
    {
        (new NicknameAndAuth())->goCheck();
        $data = input('get.');
        $user = UserModel::userInfo($data['number']);
        $user_info = UserInfoModel::get(['user_id' => $user['id']]);
        $user_auth = AuthUserModel::get(['community_id' => $data['community_id'],
            'to_user_id' => $user['id'], 'delete_time' => 0]);
        return [
            'user_info' => $user_info,
            'user_auth' => $user_auth
        ];
    }

    /**
     * 设置管理员
     * 1.被设置者必须先加入此行动社
     * 2.被设置者必须是付费用户
     * 3.判断被设置管理员是否到达上限
     * 4.修改管理员权限不检测 3
     * 5.被暂停成员资格或退群
     *
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function setManager()
    {
        (new SetManager())->goCheck();
        $dataArray = input('post.');
        $uid = TokenService::getCurrentUid();

        $cs = new CommunityService();
        $cs->checkPresident($dataArray['community_id'],$uid);
        $data['to_user_id'] = UserService::getManagerUser($dataArray['number'],$dataArray['community_id']);
        $community_user = CommunityUserModel::checkCommunityBelongsToUser($data['to_user_id'],$dataArray['community_id']);
        if ($community_user->status != 0){
            throw new ParameterException([
                'msg' => '该用户已退群或被暂停成员资格'
            ]);
        }
        $res = AuthUserModel::get(['community_id' => $dataArray['community_id'],
            'to_user_id' => $data['to_user_id'],'delete_time' => 0]);
        //设置
        if (!$res){
            CommunityService::checkManagerAllowJoinStatus($data['to_user_id'],true);
        }
        $data['from_user_id'] = $uid;
        if (isset($dataArray['auth']) && is_string($dataArray['auth'])){
            $auth = CommunityService::authFilter($dataArray['auth']);
        }else{
            $auth = '';
        }
        $data['auth'] = $auth;
        $data['community_id'] = $dataArray['community_id'];

        AuthUserModel::createOrUpdate($data);
        return json(new SuccessMessage(), 201);
    }

    /**
     * 转让行动社，可以进行多次转让
     * 1.如果是本行动社管理员/会员，则升级为社长
     * 2.社长成为该行动社普通会员
     */
    public function transferCommunity()
    {
        (new Transfer())->goCheck();
        $dataArray = input('post.');

        CommunityTransfer::transfer($dataArray);
        return [
            'code' => 201,
            'msg' => 'ok',
            'errorCode' => 0,
            'type' => 2
        ];

    }

    /**
     * 投诉
     * @return \think\response\Json
     */
    public function reportCommunity()
    {
        (new Report())->goCheck();

        $data = input('post.');

        ReportModel::createReport($data);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 退出行动社,保留记录同时删除原有记录
     * 1 社长不能退出行动社
     * 2 主动辞去管理员，变成普通成员，注销其所有权限
     *
     * @param $id
     * @return \think\response\Json
     * @throws Exception
     * @throws ParameterException
     */
    public function leaveCommunity($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        $community = CommunityUserModel::get(['user_id' => $uid, 'community_id' => $id]);
        if (!$community){
            throw new ParameterException();
        }
        if($community['type'] == 0){
            throw new ParameterException([
                'msg' => '社长不能退出行动社'
            ]);
        }

        Db::startTrans();
        try{
            if($community['type'] == 1){
                CommunityUserModel::update(['type' => '2','update_time' => time()],['user_id' => $uid, 'community_id' => $id]);
                AuthUserModel::update(['delete_time' => time()],['to_user_id' => $uid,'community_id' => $id]);
            }else{
                CommunityUserRecord::create(['user_id' => $uid, 'community_id' => $id, 'type' => $community['type'],
                    'join_time' => strtotime($community['create_time']), 'pay' => $community['pay']]);
                CommunityUserModel::where(['user_id' => $uid, 'community_id' => $id])->delete();
            }

            Db::commit();
        }catch (Exception $ex){
            throw $ex;
            Db::rollback();
        }

        return json(new SuccessMessage(), 201);
    }

    /**
     * 免费加入行动社
     * 1.如果是之前退出行动社再加入，保留在最近加入的那次属性：是否是付费用户
     *
     * @param $id
     * @return \think\response\Json
     * @throws Exception
     */
    public function freeJoin($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();

        Db::startTrans();
        try{
            CommunityService::checkAllowJoinStatus($uid);
            CommunityService::checkCommunityUserExists($id,$uid);
            CommunityService::checkCommunityUserLimit($id);
            $pay = CommunityService::getPayLastJoinCommunity($id,$uid);
            CommunityUserModel::create(['community_id' => $id, 'user_id' => $uid, 'pay' => $pay]);
            $error_log = LOG_PATH.'wx_notify_error.log';
            file_put_contents($error_log, CommunityUserModel::getLastSql().' '.date('Y-m-d H:i:s')."\r\n", FILE_APPEND);
            Db::commit();
        }catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 根据行动社名称模糊查询
     * @param $name
     * @param $page
     * @param $size
     * @return array
     */
    public function searchCommunity($name, $page, $size)
    {
        (new SearchName())->goCheck();
        (new PagingParameter())->goCheck();

        $pagingData = CommunityModel::searchCommunity($name, $page, $size);
        $data = $pagingData->visible(['id','name', 'description', 'cover_image'])
            ->toArray();

        $data = CommunityService::getType($data);

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 暂停/恢复成员资格
     * 1. 自动恢复成员资格
     * 2. 注销回调
     * 3. 自己不能暂停自己
     * 4. 管理员不能暂停社长资格
     *
     */
    public function suspendMember()
    {
        (new SuspendMember())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        if ($uid == $data['user_id']){
            throw new ParameterException([
                'msg' => '自己不能暂停自己。。。'
            ]);
        }
        CommunityModel::checkCommunityExists($data['community_id']);
        $chief_info = (new CommunityUserService())->getChiefUserInfoByCommunityID($data['community_id']);
        if ($data['user_id'] == $chief_info['user_id']){
            throw new ParameterException([
                'msg' => '不能暂停社长。。。'
            ]);
        }
    
        $cs_obj = new CommunityService();
        $auth_array[0] = 3;
        Db::startTrans();
        try{
            $cs_obj->checkManagerAuthority($uid,$data['community_id'],$auth_array);
            CommunityUserModel::checkCommunityBelongsToUser($uid,$data['community_id']);
            CommunityUserModel::checkCommunityBelongsToUser($data['user_id'],$data['community_id']);
            $res = CommunityUserModel::resumeCommunityUser($data['community_id'],$data['user_id'],$data['status']);
            if (!$res){
                throw new ParameterException([
                    'msg' => '该用户已退群'
                ]);
            }
            if ($data['status'] == 2){
                CommunityUserModel::registerCallback($data['user_id'],$data['community_id']);
            }elseif ($data['status'] == 0){
                CallbackModel::unRegisterCallback($data['community_id'],$data['user_id'],2);
            }
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

    public function test()
    {

        echo config('setting.execution');
        var_dump(config('setting.execution',7200));
        var_dump(config('setting.execution2',7200));
        echo config('setting.execution');

    }

}