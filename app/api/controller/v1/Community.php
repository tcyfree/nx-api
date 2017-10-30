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
use app\api\model\Report as ReportModel;
use app\api\service\Community as CommunityService;
use app\api\service\Token as TokenService;
use app\api\service\User as UserService;
use app\api\validate\Community as CommunityValidate;
use app\api\validate\CommunityNew as CommunityNewValidate;
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
        CommunityService::checkAllowJoinStatus($data['user_id']);
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
        $logo = $dataArray['cover_image'];
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
        CommunityUserModel::checkCommunityBelongsToUser($uid, $id);

        CommunityModel::checkNameUpdate($id,$dataArray['name']);


        //开启事物
        Db::startTrans();
        try
        {

            CommunityModel::update($dataArray,['id'=>$id]);
            $result = CommunityModel::get($id)->toArray();
            if($result['update_num'] == 0){
                throw new UpdateNumException();
            }
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

        $data = $pagingData->visible(['community_id','type', 'community.name', 'community.description', 'community.cover_image'])
            ->toArray();
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 分页获取推荐行动社
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getRecommendSummary($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();

        $pagingData = CommunityModel::getSummaryList($page, $size);

        $data = $pagingData->visible(['id','name', 'description', 'cover_image'])
            ->toArray();

        $data = CommunityService::getSumActing($data);
        $data = CommunityService::getType($data);

        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
        ];
    }

    /**
     * 行动社详情
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
        $data = $communityDetail->hidden(['recommended','scale_num','pay_num','search'])->toArray();
        $data = CommunityService::getUserStatus($data);

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
        $data = Db::table('xds_community_user')
            ->alias('c_u')
            ->join('__USER_INFO__ u','c_u.user_id = u.user_id')
            ->where('(c_u.pay = '."'".$pay."'".' OR c_u.type <> '."'".$type."'".') AND c_u.community_id = '."'".$id."'")
            ->order('c_u.type ASC')
            ->field('c_u.type,c_u.pay,c_u.status,u.user_id,u.nickname,u.char_index,u.avatar,u.from')
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
            $newData[$v['char_index']][] = $v;
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
     * 设置管理员
     * 1.被设置者必须先加入此行动社
     * @return \think\response\Json
     */
    public function setManager()
    {
        (new SetManager())->goCheck();
        $dataArray = input('post.');
        $uid = TokenService::getCurrentUid();

        $cs = new CommunityService();
        $cs->checkPresident($dataArray['community_id'],$uid);

        $data['to_user_id'] = UserService::getManagerUser($dataArray['number'],$dataArray['community_id']);
        $data['from_user_id'] = $uid;
        $auth = CommunityService::authFilter($dataArray['auth']);
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
                AuthUserModel::update(['auth' => '', 'update_time' => time()],['to_user_id' => $uid,'community_id' => $id]);
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
            CommunityUserModel::create(['community_id' => $id, 'user_id' => $uid]);

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
     */
    public function suspendMember()
    {
        (new SuspendMember())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('put.');
        if ($data)

        $cs_obj = new CommunityService();
        $auth_array[0] = 3;
        $cs_obj->checkManagerAuthority($uid,$data['community_id'],$auth_array);

        CommunityUserModel::checkCommunityBelongsToUser($uid,$data['community_id']);
        CommunityUserModel::checkCommunityBelongsToUser($data['user_id'],$data['community_id']);
        CommunityUserModel::update(['status' => $data['status']],['user_id' => $data['user_id'], 'community_id' => $data['community_id']]);

        return json(new SuccessMessage(),201);
    }

    public function test()
    {
        $url = 'http://weixin.xingdongshe.com/template/groupPage.html?id=ec685e49-3456-6a37-8220-be6bb35868ae';
        $image_process = new ImageProcessingService();
        $cover_image = 'http://xds-test.oss-cn-beijing.aliyuncs.com/user-dir/undefinedWF3TUGcxPzpezREs9x7yuUnp1nDpmBU.png';
        $res = $image_process->getQRCodeByCoverImage($url,$cover_image);
        $process_time = sys_processTime();
        return [
            'url' => $res['oss-request-url'],
            'process_time' => $process_time
        ];
    }

}