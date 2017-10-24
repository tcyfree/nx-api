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
// | DateTime: 2017/10/24/17:39
// +----------------------------------------------------------------------

namespace app\api\service;

use app\api\model\Message as MessageModel;

class Message
{
    /**
     * 获取私信概要列表最新一条数据
     *
     * @param $origin_data
     * @return mixed
     */
    public function getLastMessageBySummaryList($origin_data)
    {
        foreach ($origin_data as &$v){
            $where['user_id'] = $v['user_id'];
            $where['to_user_id'] = $v['to_user_id'];
            $where['delete_time'] = 0;
            $message = new MessageModel();
            $res = $message->where($where)
                ->order('create_time DESC')
                ->find()->toArray();

            $v['content'] = $res['content'];
        }

        return $origin_data;
    }
}