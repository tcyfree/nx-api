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
// | DateTime: 2018/4/18/11:01
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\model\Comment as CommentModel;
use app\api\model\Communication as CommunicationModel;
use app\api\model\Notice as NoticeModel;
use app\api\service\Token as TokenService;
use app\api\validate\CommentPost;
use app\lib\exception\SuccessMessage;
use think\Db;
use think\Exception;
use app\api\model\UserInfo as UserInfoModel;
use app\api\model\User as UserModel;

class Comment extends BaseController
{
    /**
     * 评论
     * 1. 评论条目提醒
     * 2. 评论回复
     *
     * @return \think\response\Json
     * @throws Exception
     */
    public function createComment()
    {
        (new CommentPost())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        CommunicationModel::checkCommunicationExists($data['communication_id']);
        //如果是评论回复则根据to_user_id获取to_nickname
        if (isset($data['to_user_id']) && !empty($data['to_user_id'])){
            UserModel::checkUserExists($data['to_user_id']);
        }
        $id = uuid();
        $data['id'] = $id;
        $data['user_id'] = $uid;
        Db::startTrans();
        try{
            (new CommentModel())->allowField(true)->save($data);
            CommunicationModel::where('id',$data['communication_id'])->setInc('comments');
            $data['from_user_id'] = $uid;
            $data['type'] = 2;
            NoticeModel::createNotice($data);
            Db::commit();
        }catch (Exception $ex){
            Db::rollback();
            throw $ex;
        }

        return json(new SuccessMessage(),201);
    }

}