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
// | DateTime: 2017/9/7/15:20
// +----------------------------------------------------------------------

namespace app\api\model;


use think\Db;
use app\lib\exception\ParameterException;

class UserProperty extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    /**
     * 1. 查找当前用户行动力排名
     * 2. 全局前5名用户
     * 3. a.create_time ASC
     * @param $uid
     * @return mixed
     */
    public static function executionRankByUser($uid)
    {
        $sqlstr = "SELECT * FROM (
                   SELECT a.user_id,a.execution,(@rowno:=@rowno+1) as rowno 
                   FROM qxd_user_property a,(select (@rowno:=0)) b ORDER BY a.execution DESC, a.create_time ASC) c 
                   WHERE c.user_id = '$uid'";
        $res = Db::query($sqlstr);
        $data['mine'] = $res;

        $res = self::with('userInfo')
            ->order(['execution ' => 'desc'])
            ->limit(5)
            ->select();
        $data['rank'] = $res->visible(['user_id','execution','user_info.nickname','user_info.avatar']);
        return $data;
    }

    /**
     * 检查余额是否充足
     *
     * @param $uid
     * @param $fee
     * @throws ParameterException
     */
    public function checkBalance($uid, $fee)
    {
        $user_property = self::get(['user_id' => $uid]);
        if ($fee > $user_property->wallet){
            throw new ParameterException([
                'msg' => '余额不足，请先去充值！',
                'errorCode' => 20001
            ]);
        }
    }
}