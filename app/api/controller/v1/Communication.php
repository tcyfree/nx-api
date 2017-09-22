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
// | DateTime: 2017/9/19/9:50
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Communication as CommunicationModel;
use app\api\model\CommunicationOperate as CommunicationOperateModel;
use app\api\model\Community as CommunityModel;
use app\api\model\Notice as NoticeModel;
use app\api\service\Token as TokenService;
use app\api\validate\CommunicationList;
use app\api\validate\CreateCommunication;
use app\api\validate\UUID;
use app\lib\exception\SuccessMessage;

class Communication extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'deleteCommunication']
    ];

    /**
     * 发布内容
     * 1.被@的用户
     * @return \think\response\Json
     */
    public function createCommunication()
    {
        (new CreateCommunication())->goCheck();
        $dataArray = input('post.');
        CommunityModel::checkCommunityExists($dataArray['community_id']);
        $uid = TokenService::getCurrentUid();
        $dataArray['user_id'] = $uid;
        $id = uuid();
        $dataArray['id'] = $id;
        $c_obj = new CommunicationModel();
        // 过滤数组中的非数据表字段数据
        $c_obj->allowField(true)->save($dataArray);
        //@用户，发消息通知
        if (isset($dataArray['@user_ids'])){
            foreach ($dataArray['@user_ids'] as $v){
                $data['id'] = uuid();
                $data['to_user_id'] = $v;
                $data['from_user_id'] = $uid;
                $data['communication_id'] = $id;
                NoticeModel::create($data);
            }
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 交流区列表
     * 1.判断当前用户是否点赞
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getCommunicationList($page = 1, $size = 15)
    {
        (new CommunicationList())->goCheck();
        $community_id = input('get.community_id');
        $uid = TokenService::getCurrentUid();
        $pageData = CommunicationModel::getList($page,$size,$community_id);
        $data = $pageData->visible(['id','content','user_id','location','likes','comments','user_info.user_id','create_time','user_info.nickname','user_info.avatar'])->toArray();
        foreach ($data as &$v){
            CommunicationModel::where('id',$v['id'])->setInc('hits');
            $res = CommunicationOperateModel::get(['user_id' => $uid, 'communication_id' => $v['id'],'type' => 1,'delete_time' => 0]);
            if ($res){
                $v['do_like'] = true;
            }else{
                $v['do_like'] = false;
            }

            if ($uid == $v['user_id']){
                $v['own'] = true;
            }else{
                $v['own'] = false;
            }
        }

        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }

    /**
     * 顶赞/取消顶赞
     * @return \think\response\Json
     */
    public function operateCommunityByUser()
    {
        (new UUID())->goCheck();
        $communication_id = input('put.id');
        CommunicationModel::checkCommunicationExists($communication_id);
        $uid = TokenService::getCurrentUid();
        $where['user_id'] = $uid;
        $where['communication_id'] = $communication_id;
        $where['type'] = 1;
        $res = CommunicationOperateModel::get($where);
        if ($res){
            CommunicationOperateModel::update(['delete_time' => time()],['communication_id' => $communication_id, 'user_id' => $uid]);
            CommunicationModel::where('id',$communication_id)->setDec('likes');
        }else{
            CommunicationOperateModel::create($where);
            CommunicationModel::where('id',$communication_id)->setInc('likes');
        }

        return json(new SuccessMessage(),201);
    }

    /**
     * 删除条目
     * !!!!BUG：不能使用软删除，否则分页获取接口不能查询数据
     * @return \think\response\Json
     */
    public function deleteCommunication()
    {
        (new UUID())->goCheck();
        $communication_id = input('delete.id');
        CommunicationModel::checkCommunicationExists($communication_id);
        CommunicationModel::update(['delete_time' => time()],['id' => $communication_id]);

        return json(new SuccessMessage(),201);
    }

}