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
// | DateTime: 2017/9/20/15:16
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\service\Token as TokenService;
use app\api\validate\CommentNew;
use app\api\model\Comment as CommentModel;
use app\api\validate\UUID;
use app\lib\exception\SuccessMessage;
use app\api\model\Communication as CommunicationModel;
use app\api\model\CommentOperate as CommentOperateModel;

class Comment extends  BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'getCommentList']
    ];

    /**
     * 评论
     * @return \think\response\Json
     */
    public function createComment()
    {
        (new CommentNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        CommunicationModel::checkCommunicationExists($data['communication_id']);
        $id = uuid();
        CommentModel::create(['id' => $id, 'user_id' => $uid, 'comment' => $data['comment'], 'communication_id' => $data['communication_id']]);

        return json(new SuccessMessage(),201);
    }

    /**
     * 评论列表
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getCommentList($page = 1, $size = 15)
    {
        (new UUID())->goCheck();
        $uid = TokenService::getCurrentUid();
        $communication_id = input('get.id');
        CommunicationModel::checkCommunicationExists($communication_id);

        $pageData = CommentModel::commentList($communication_id,$page,$size);
        $data = $pageData->visible(['id','comment','likes','user_info.user_id','user_info.nickname'])->toArray();

        foreach ($data as &$v){
            $comment_id = $v['id'];
            $res = CommentOperateModel::get(['comment_id' => $comment_id, 'user_id' => $uid]);
            if ($res)
            {
                $v['do_like'] = true;
            }else
            {
                $v['do_like'] = false;
            }
        }

        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }

}