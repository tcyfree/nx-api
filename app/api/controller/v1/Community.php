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
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\service\Token as TokenService;
use app\api\validate\Community as CommunityValidate;
use app\api\model\Community as CommunityModel;
use app\api\validate\Type;
use app\api\validate\UUID;
use app\lib\exception\CommunityException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UpdateNumException;
use think\exception\Exception;
use think\Db;
use app\lib\exception\ParameterException;
use app\api\validate\PagingParameter;

class Community extends BaseController
{
    protected $beforeActionList = [
        'checkPrimaryScope' => ['only' => 'createCommunity']
    ];

    /**
     * 创建行动社
     * 1.名称不能重复
     * @return \think\response\Json
     * @throws ParameterException
     * @throws \Exception
     */
    public function createCommunity()
    {
        $validate = new CommunityValidate();
        $validate->goCheck();

        $data['user_id'] = TokenService::getCurrentUid();
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
    public function updateCommunity($id)
    {
        (new UUID())->goCheck();
        $validate = new CommunityValidate();
        $validate->goCheck();

        $data['user_id'] = TokenService::getCurrentUid();
        $dataArray = $validate->getDataByRule(input('put.'));
        $res = CommunityModel::get(['name' => $dataArray['name']]);

        if($res){
            throw new ParameterException(
                [
                    'msg' => "'".$dataArray['name']."'已经存在了！"
                ]);
        }

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
     * @return array
     */
    public function getSummaryByUser($type,$page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new Type())->goCheck();
        $uid = TokenService::getCurrentUid();
        $pagingData = CommunityUserModel::getSummaryByUser($uid, $type, $page, $size);

        if ($pagingData->isEmpty())
        {
            return [
                'data' => [],
                'current_page' => $pagingData->getCurrentPage()
            ];
        }
        $data = $pagingData->visible(['community_id','type', 'community.name', 'community.description', 'community.cover_image'])
            ->toArray();
        return [
            'data' => $data,
            'current_page' => $pagingData->getCurrentPage()
        ];
    }

    /**
     * 行动社详情
     * @param $id
     * @return $this
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

        return $communityDetail->hidden(['act_plan.community_id']);
    }
}