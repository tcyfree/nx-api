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

namespace app\api\controller\v2;

use app\api\controller\BaseController;
use app\api\model\Notice as NoticeModel;
use app\api\service\Token as TokenService;
use app\api\controller\v1\Task;
use app\api\controller\v1\Message;

class Notice extends BaseController
{
    /**
     * 最近xx是否有提醒
     * @return array
     */
    public function getNoticeLook()
    {
        $uid = TokenService::getCurrentUid();
        $where['to_user_id'] = $uid;
        $where['look'] = 0;
        $res = NoticeModel::where($where)
            ->whereTime('create_time','-2 years')
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
     * 查看以下之一是否有新消息
     * 1 提醒
     * 2 私信
     * 3 反馈
     *
     * @return array
     */
    public function getAllNotLook()
    {
        $notice_look = false;
        $notice = $this->getNoticeLook();
        if ($notice['look']) $notice_look = true;

        $message_look = false;
        $message = new Message();
        $res = $message->getNotLook();
        if ($res['look']) $message_look = true;

        $feedback_look = false;
        $feedback = new Task();
        $res = $feedback->getNotLook();
        if ($res['look']) $feedback_look = true;


        return [
            'notice' => $notice_look,
            'message' => $message_look,
            'feedback' => $feedback_look
        ];
    }

}