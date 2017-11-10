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
// | DateTime: 2017/11/10/14:31
// +----------------------------------------------------------------------

namespace app\api\model;
use app\api\model\Communication as CommunicationModel;

class CommentNotice extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','from_user_id');
    }

    public function communication()
    {
        return $this->hasOne('Communication','id','communication_id');
    }

    /**
     * 记录评论提醒
     * 1.自己给自己评论不再记录
     *
     * @param $data
     */
    public static function createNotice($data)
    {
        $communication = CommunicationModel::get(['id' => $data['communication_id']]);
        $data['to_user_id'] = $communication->user_id;
        if ($data['to_user_id'] != $data['from_user_id']){
            $data['uuid'] = uuid();
            self::create($data);
        }
    }
}