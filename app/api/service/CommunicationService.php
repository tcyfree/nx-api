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
// | DateTime: 2018/4/18/9:59
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\Comment as CommentModel;
use app\api\model\CommentOperate as CommentOperateModel;
use app\api\model\Communication as CommunicationModel;
use app\api\model\CommunicationOperate as CommunicationOperateModel;
use app\api\model\CommunityUser as CommunityUserModel;

class CommunicationService
{
    /**
     * 检查用户是否可以发交流权限
     *
     * @param $uid
     * @param $community_id
     * @return bool
     */
    public function checkAuthSend($uid, $community_id)
    {
        $result = CommunityUserModel::checkCommunityBelongsToUser($uid,$community_id);
        $send = true;
        if ($result['type'] == 2 && $result['pay'] == 0 || $result['status'] ==2){
            $send = false;
        }
        return $send;
    }

    /**
     * 1. 获取点赞人相关信息
     * 2. 获取相关全部评论列表
     *
     * @param $data
     * @param $uid
     * @return mixed
     */
    public function getComment($data,$uid)
    {
        foreach ($data as &$v){
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

            $v['favor_user'] = CommunicationOperateModel::getFavorUser($v['id']);

            $v['comment'] = $this->getCommentList($uid,$v['id']);
        }

        return $data;
    }

    /**
     * 全部评论列表
     *
     * @param $uid
     * @param $communication_id
     * @return array
     */
    public function getCommentList($uid,$communication_id)
    {
        CommunicationModel::checkCommunicationExists($communication_id);

        $pageData = CommentModel::commentAllList($communication_id);
        $data = $pageData->visible(['id','comment','likes','create_time','user_info.user_id','user_info.nickname','user_info.avatar'])->toArray();

        foreach ($data as &$v){
            $comment_id = $v['id'];
            $res = CommentOperateModel::get(['comment_id' => $comment_id, 'user_id' => $uid, 'delete_time' => 0]);
            if ($res)
            {
                $v['do_like'] = true;
            }else
            {
                $v['do_like'] = false;
            }
        }

        return $data;

    }
}