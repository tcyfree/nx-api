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
use app\api\validate\PagingParameter;
use app\api\validate\Type;
use app\api\service\Token as TokenService;
use app\api\model\CommunityUser as CommunityUserModel;
use app\api\service\CommunityUser as CommunityUserService;
use think\Db;
use app\api\validate\UUID;
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
}