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
// | DateTime: 2017/8/28/11:09
// +----------------------------------------------------------------------

namespace app\api\model;


use app\api\service\Role as RoleService;
use app\api\service\Token as TokenService;
use app\lib\exception\ForbiddenException;
use app\lib\exception\ParameterException;

class CommunityTransfer extends BaseModel
{
    protected $autoWriteTimestamp = true;
    //关闭自动更新字段
    protected $updateTime = false;

    /**
     * 转让行动社
     * @param $dataArray
     * @throws ForbiddenException
     * @throws ParameterException
     */
    public static function transfer($dataArray)
    {
        $user = User::userInfo($dataArray['number'])->toArray();
        $uid = TokenService::getCurrentUid();
        if($user['id'] == $uid){
            throw new ParameterException([
                'msg' => '自己不能转让给自己'
            ]);
        }
        //非社长不能转让行动社
        $res = CommunityUser::get(['user_id' => $uid, 'community_id' => $dataArray['community_id']]);
        if (!$res){
            throw new ParameterException();
        }
        if($res['type'] != 0){
            throw new ForbiddenException();
        }
        $data['to_user_id'] = $user['id'];
        $data['user_id'] = $uid;
        $data['community_id'] = $dataArray['community_id'];

        RoleService::roleTransfer($data);
    }
}