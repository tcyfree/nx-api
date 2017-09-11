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
use app\api\service\Token as TokenService;
use app\api\validate\Community as CommunityValidate;
use app\api\validate\PagingParameter;
use app\api\validate\Report;
use app\api\validate\SearchName;
use app\api\validate\SetManager;
use app\api\validate\Transfer;
use app\api\validate\Type;
use app\api\validate\UUID;
use app\lib\exception\CommunityException;
use app\lib\exception\ParameterException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UpdateNumException;
use think\Db;
use think\Exception;
use app\api\service\User as UserService;
use app\api\service\Community as CommunityService;

class Community extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createCommunity']
    ];

    /**
     * 创建行动社
     * 1.名称不能重复
     * 2.判断是否和用户相关的行动是否达到上限5个
     * @return \think\response\Json
     * @throws ParameterException
     * @throws \Exception
     */
    public function createCommunity()
    {
        $validate = new CommunityValidate();
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
        //开启事物
        Db::startTrans();
        try
        {
            $community = CommunityModel::create($dataArray)->toArray();
            $data['community_id'] = $community['id'];
            $data['type'] = 0;
            CommunityUserModel::create($data);
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
     * 编辑行动社
     * @param $id
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
        $res = CommunityModel::get(['name' => $dataArray['name']]);
        $id = $dataArray['id'];
        CommunityUserModel::checkCommunityBelongsToUser($uid, $id);
        if($res){
            throw new ParameterException(
                [
                    'msg' => "'".$dataArray['name']."'已经存在了！"
                ]);
        }

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
        $data = $communityDetail->hidden(['recommended','act_plan.community_id'])->toArray();
        $data = CommunityService::getUserStatus($data);

        return $data;
    }

    /**
     * 更新行动社编辑次数为3
     */
    public function initUpdateNum()
    {
        $date['update_num'] = 3;
        CommunityModel::update($date,'1 = 1');

        return json(new SuccessMessage(), 201);
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
        $res = CommunityUserModel::get(['user_id' => $uid,'community_id' => $id])->toArray();
        $community_id = $res['community_id'];

        CommunityModel::update(['search' => $type-1],['id' => $community_id]);

        return json(new SuccessMessage(), 201);
    }

    /**
     * 成员列表
     * @param $id
     * @param $page
     * @param $size
     * @return array
     */
    public function getMemberList($id,$page = 1, $size = 15)
    {
        (new UUID())->goCheck();
        (new PagingParameter())->goCheck();

        $where['community_id'] = $id;
        $pagingData = CommunityUserModel::with('member')->where($where)->paginate($size, true, ['page' => $page]);

        $data = $pagingData->visible(['type', 'status', 'member.user_id', 'member.nickname', 'member.avatar'])
            ->toArray();
        return [
            'data' => $data,
            'current_page' => $pagingData->currentPage()
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

        $data['to_user_id'] = UserService::getManagerUser($dataArray['number'],$dataArray['community_id']);
        $data['from_user_id'] = TokenService::getCurrentUid();
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
        return json(new SuccessMessage(), 201);

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
     * 退出行动社
     * 1 社长不能退出行动社
     * @param $id
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function leaveCommunity($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        $community = CommunityUserModel::get(['user_id' => $uid, 'community_id' => $id])->toArray();
        if($community['type'] == 0){
            throw new ParameterException([
                'msg' => '社长不能退出行动社'
            ]);
        }

        CommunityUserModel::update(['status' => 1], ['user_id' => $uid, 'community_id' => $id]);
        return json(new SuccessMessage(), 201);
    }

    /**
     * 免费加入行动社
     * @param $id
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function freeJoin($id)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        CommunityService::checkAllowJoinStatus($uid);
        CommunityService::checkCommunityUserExists($id,$uid);

        CommunityUserModel::create(['community_id' => $id, 'user_id' => $uid]);
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

}