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
// | DateTime: 2018/4/18/9:31
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\model\Communication as CommunicationModel;
use app\api\service\CommunicationService;
use app\api\service\Token as TokenService;
use app\api\validate\CommunicationList;

class Communication extends BaseController
{
    /**
     * 交流区列表
     * 1.判断当前用户是否点赞
     * 2.当前用户是否为付费用户
     * 3.对管理员或社长放行
     * 4.暂停成员资格不能发条目
     * 5.成员状态
     * 6.获取点赞人相关信息
     * 7.获取相关全部评论列表
     * 8.获取全部评论列表
     * 9.如果被回复获取被评论人昵称
     *
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
        $data = $pageData->visible(['id','community_id','content','user_id','location','likes','comments','user_info.user_id','create_time','user_info.nickname','user_info.avatar'])->toArray();

        $communication_service = new CommunicationService();
        $data = $communication_service->getComment($data,$uid);
        $send = $communication_service->checkAuthSend($uid,$community_id);

        return [
            'data' => $data,
            'send' => $send,
            'current_page' => $pageData->currentPage()
        ];
    }
}