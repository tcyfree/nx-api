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
use app\api\model\BlockedList;
use app\api\model\Message as MessageModel;
use app\api\service\Token as TokenService;
use app\api\validate\MessageNew;
use app\api\validate\UUID;
use app\lib\exception\ForbiddenException;
use app\lib\exception\SuccessMessage;
use app\api\model\BlockedList as BlockedListModel;


class Message extends BaseController
{

    /**
     * 私信概要列表
     * 1 显示最新一条私信
     * 2 同步最新时间
     * 3 获取未查看私信数量
     *
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function getSummaryList($page = 1, $size = 15)
    {
        $uid = TokenService::getCurrentUid();
        $data = MessageModel::getSummaryList($page, $size, $uid);
        $data['process_time'] = sys_processTime();
        return $data;
    }

    /**
     * 获取私信详情列表
     * 1 look 是否查看
     * 2 更新look = 1
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
        $pageData = MessageModel::getMessageList($page, $size, $uid, $to_uid);
        $data = $pageData->visible(['id', 'user_id', 'to_user_id', 'content', 'type', 'look', 'create_time',
            'user_info.user_id', 'user_info.avatar', 'user_info.nickname',
            'to_user_info.user_id', 'to_user_info.avatar', 'to_user_info.nickname']);
        MessageModel::update(['look' => 1, 'update_time' => time()],
            ['user_id' => $uid, 'to_user_id' => $to_uid, 'look' => 0, 'delete_time' => 0]);
        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }

    /**
     * 1 发私信
     * 同时生成两条私信记录：type 0 回复 1 被回复
     * 发私信方：look = 1
     * 1.是否在对方黑名单
     * 2.是否将对方拉黑了
     *
     * @return \think\response\Json
     * @throws ForbiddenException
     */
    public function addMessage()
    {
        (new MessageNew())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = input('post.');
        $res = BlockedListModel::judgeBlockedListUser($data['to_user_id'],$uid);
        if ($res) throw new ForbiddenException([
            'msg' => '你被对方拉入黑名单啦！'
        ]);
        $res = BlockedListModel::judgeBlockedListUser($uid,$data['to_user_id']);
        if ($res) throw new ForbiddenException([
            'msg' => '你将对方拉入黑名单啦！'
        ]);
        $data['user_id'] = $uid;
        $data['look'] = 1;
        MessageModel::create($data);
        $reply_data['to_user_id'] = $uid;
        $reply_data['user_id'] = $data['to_user_id'];
        $reply_data['content'] = $data['content'];
        $reply_data['type'] = 1;
        MessageModel::create($reply_data);
        return json(new SuccessMessage(), 201);
    }

    /**
     * 清空私信详情列表
     *
     * @return \think\response\Json
     */
    public function deleteMessage()
    {
        (new UUID())->goCheck();
        $where['user_id'] = TokenService::getCurrentUid();
        $where['to_user_id'] = input('delete.id');
        $where['delete_time'] = 0;
        MessageModel::update(['delete_time' => time()], $where);
        return json(new SuccessMessage(), 201);
    }

    /**
     * 是否有新私信
     *
     * @return array
     */
    public function getNotLook()
    {
        $uid = TokenService::getCurrentUid();
        $where['user_id'] = $uid;
        $where['look'] = 0;
        $where['delete_time'] = 0;
        $res = MessageModel::where($where)
            ->field('look')
            ->find();
        if (!$res) {
            return [
                'look' => false
            ];
        } else {
            return [
                'look' => true
            ];
        }
    }

    public function test()
    {
//        $uri = 'http://api.xingdongshe.com/v1/message';
//        $res = curl_get($uri);
//        var_dump($res);

        $url = 'http://api.xingdongshe.com/v1/message';

        $header = array('token:c3d34690477d21952ef67162ff1e726e');
        $header = array('token:31230bb228aa9072cbe61823217191b0');
        $i = 0;
        while ($i < 1) {
//            for ($j = 0; $j < 1000; $j ++){
//                $response = curl_get_header($url,$header);
//                usleep(1000000);
//            }
            $j = 0;
            while ($j < 5000) {
                $response = curl_get_header($url, $header);
                $j++;
//                usleep(10000);
            }
            //延迟 1秒,一微秒等于百万分之一秒。
            usleep(1000000);
            echo $i;
            $i++;
        }
        $process_time = sys_processTime();
        $response = json_decode($response);
        return [
            'response' => $response,
            'process_time' => $process_time
        ];
        return json_decode($response);
    }

}