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
// | DateTime: 2017/9/22/16:10
// +----------------------------------------------------------------------

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token as TokenService;
use app\api\validate\PagingParameter;
use app\api\model\Notice as NoticeModel;
use app\lib\exception\SuccessMessage;

class Notice extends BaseController
{
    /**
     * 提醒列表
     * 1.提醒内容只保存和显示最近三天的
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getNoticeList($page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $where['delete_time'] =0;
        $pageData = NoticeModel::with('userInfo,communication,communication.community')
            ->where($where)
            ->whereTime('create_time','-3 days')
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);
        $data = $pageData->visible(['id','type','create_time','communication.id','communication.content','user_info.avatar','user_info.nickname','communication.community.name']);
        NoticeModel::update(['look' => 1,'update_time' => time()],['to_user_id' => $uid]);
        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }

    /**
     * 最近三天是否有提醒
     * @return array
     */
    public function getNoticeLook()
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $where['look'] = 0;
        $res = NoticeModel::where($where)
            ->whereTime('create_time','-3 days')
            ->field('look')
            ->find();
        if (!$res){
            return [
                'look' => false
            ];
        }else{
            return [
                'look' => true
            ];
        }
    }

    /**
     * 清空最近三天消息通知
     *
     * @return \think\response\Json
     */
    public function clearNotice()
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;

        $notice = new NoticeModel();
        $notice->save(['delete_time' => time()],function ($query) use ($where){
            $query->whereTime('create_time','-3 days')->where($where);
        });

        return json(new SuccessMessage(),201);
    }

    /**
     * 查看以下之一是否有新消息
     * 1 提醒
     * 2 私信
     * 3 反馈
     * 4 评论
     *
     * @return array
     */
    public function getAllNotLook()
    {
        $notice = $this->getNoticeLook();
        if ($notice['look']){
            return [
                'look' => true
            ];
        }

        $message = new Message();
        $res = $message->getNotLook();
        if ($res['look']){
            return [
                'look' => true
            ];
        }

        $feedback = new Task();
        $res = $feedback->getNotLook();
        if ($res['look']){
            return [
                'look' => true
            ];
        }

        $comment_notice = new CommentNotice();
        $res = $comment_notice->getNoticeLook();
        if ($res['look']){
            return [
                'look' => true
            ];
        }

        return [
            'look' => false
        ];
    }

}