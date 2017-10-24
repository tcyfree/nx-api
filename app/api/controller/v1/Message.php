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
// | DateTime: 2017/10/24/14:56
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token as TokenService;
use app\api\model\Message as MessageModel;
use app\api\validate\MessageNew;
use app\api\validate\UUID;
use app\lib\exception\SuccessMessage;

class Message extends BaseController
{

    /**
     * 1 发私信
     * 同时生成两条私信记录：type 0 回复 1 被回复
     *
     * @return \think\response\Json
     */
    public function addMessage()
    {
        (new MessageNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        $data['user_id'] = $uid;
        MessageModel::create($data);

        $reply_data['to_user_id'] = $uid;
        $reply_data['user_id'] = $data['to_user_id'];
        $reply_data['content'] = $data['content'];
        $reply_data['type'] = 1;
        MessageModel::create($reply_data);
        return json(new SuccessMessage(),201);
    }

    /**
     * 获取私信详情列表
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getMessageList($page = 1, $size = 15)
    {
        (new UUID())->goCheck();
        $to_uid = input('get.id');
        $uid = TokenService::getCurrentUid();
        $pageData = MessageModel::getMessageList($page,$size,$uid,$to_uid);
        $data = $pageData->visible(['id','user_id','to_user_id','content','type','create_time',
            'user_info.user_id','user_info.avatar','user_info.nickname',
            'to_user_info.user_id','to_user_info.avatar','to_user_info.nickname']);
        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }
}