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
// | DateTime: 2017/12/27/15:01
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\service\CommunityUser as CommunityUserService;
use app\api\service\Token as TokenService;
use app\api\validate\PagingParameter;
use app\api\validate\Profile;
use app\api\validate\Type;
use app\api\model\Community as CommunityModel;
use app\lib\exception\SuccessMessage;
use app\api\service\Community as CommunityService;

class Community extends BaseController
{
    /**
     * 分页获取行动社列表,根据level降序排序
     * @param int $page
     * @param int $size
     * @param int $type
     * @return array
     */
    public function getSummaryByUser($type,$page = 1, $size = 15)
    {
        (new PagingParameter())->goCheck();
        (new Type())->goCheck();
        $uid = TokenService::getCurrentUid();
        $data = CommunityUserModel::getSummaryByUserOrderByLevel($uid, $type, $page, $size);
        foreach ($data as &$v){
            $v['chief_user'] = (new CommunityUserService())->getChiefUserInfoByCommunityID($v['community_id']);
        }
        return [
            'data' => $data,
            'current_page' => $page
        ];
    }

    /**
     * 编辑行动社简介
     * 1. 只有社长有此功能
     *
     * @return \think\response\Json
     */
    public function putCommunityProfile()
    {
        (new Profile())->goCheck();
        $data = input('put.');
        if (!isset($data['profile'])){
            $data['profile'] = '';
        }
        $community_id = $data['community_id'];
        $uid  = TokenService::getCurrentUid();
        CommunityModel::checkCommunityExists($community_id);
        (new CommunityUserService())->checkChiefAuth($uid,$community_id);
        CommunityModel::update(['profile' => $data['profile'], 'update_time' => time()],
            ['id' => $community_id]);
        return json(new SuccessMessage(), 201);
    }

    /**
     * 检测创建数量是否达到规定值
     *
     * @return \think\response\Json
     */
    public function postCommunityCheckAllow()
    {
        $uid = TokenService::getCurrentUid();
        CommunityService::checkManagerAllowJoinStatus($uid);
        return json(new SuccessMessage(),201);

    }
}