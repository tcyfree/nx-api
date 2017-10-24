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

namespace app\api\model;

use app\api\service\Message as MessageService;

class Message extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    public function toUserInfo()
    {
        return $this->hasOne('UserInfo','user_id','to_user_id');
    }

    /**
     * 私信详情列表
     *
     * @param $page
     * @param $size
     * @param $uid
     * @param $to_uid
     * @return \think\Paginator
     */
    public static function getMessageList($page,$size,$uid,$to_uid)
    {
        $where['user_id'] = $uid;
        $where['to_user_id'] = $to_uid;
        $where['delete_time'] = ['eq',0];
        $pageData = self::with('userInfo,toUserInfo')
            ->where($where)
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);

        return $pageData;
    }

    /**
     * 私信概要列表
     * 1 显示最新一条私信
     *
     * @param $page
     * @param $size
     * @param $uid
     * @return array
     */
    public static function getSummaryList($page,$size,$uid)
    {
        $where['user_id'] = $uid;
        $where['delete_time'] = ['eq',0];
        $pageData = self::with('toUserInfo')
            ->where($where)
            ->order('create_time ASC')
            ->group('to_user_id')
            ->paginate($size,true,['page' => $page]);
        $origin_data = $pageData->visible(['user_id','to_user_id','content','create_time',
            'to_user_info.user_id','to_user_info.nickname','to_user_info.avatar']);
        $message_service = new MessageService();
        $data = $message_service->getLastMessageBySummaryList($origin_data);
        return [
            'data' => $data,
            'current_page' => $pageData->currentPage()
        ];
    }
}