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
// | DateTime: 2017/8/28/13:42
// +----------------------------------------------------------------------

namespace app\api\service;


use app\api\model\CommunityTransfer;
use app\api\model\CommunityUser;
use think\Db;
use think\Exception;
use app\api\service\Community as CommunityService;

class Role
{
    /**
     * 1 转让行动社
     * 2 角色转换
     * 2.1 如果不是本行动社成员，检查是否达到用户加入上限和行动社本身人数限制，则创建一条记录。否则更新其行动社关联属性
     * 2.2 将社长变成普通成员
     * @param $data
     * @return \think\response\Json
     * @throws \Exception
     */
    public static function roleTransfer($data)
    {
        Db::startTrans();
        try
        {
            CommunityTransfer::create($data);
            $to_user = CommunityUser::get(['user_id' => $data['to_user_id'], 'community_id' => $data['community_id']]);

            if(!$to_user){
                $cData['user_id'] = $data['to_user_id'];
                $cData['community_id'] = $data['community_id'];
                $cData['type'] = 0;
                CommunityService::checkAllowJoinStatus($data['to_user_id']);
                CommunityService::checkCommunityUserLimit($data['community_id']);
                CommunityUser::create($cData);
            }else{
                CommunityUser::update(['type' => 0], ['user_id' => $data['to_user_id'], 'community_id' => $data['community_id']]);
            }

            CommunityUser::update(['type' => 2], ['user_id' => $data['user_id'], 'community_id' => $data['community_id']]);
            Db::commit();
        }
        catch (Exception $ex)
        {
            Db::rollback();
            throw $ex;
        }
    }
}