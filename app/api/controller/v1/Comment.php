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
use app\lib\exception\SuccessMessage;
use app\api\model\Communication as CommunicationModel;

class Comment extends  BaseController
{
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

}