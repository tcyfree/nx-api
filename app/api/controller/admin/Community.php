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
// | DateTime: 2018/1/17/11:47
// +----------------------------------------------------------------------

namespace app\api\controller\admin;

use app\api\controller\BaseController;
use app\api\model\Community as CommunityModel;
use app\api\validate\CommunityPutStatus;
use app\lib\exception\SuccessMessage;

class Community extends BaseController
{
    protected $beforeActionList = [
        'checkAdminScope' => ['only' => 'getCommunityList,putCommunityStatus']
    ];
    /**
     * 行动社列表
     *
     * @param int $page
     * @param int $size
     * @return array
     */
    public function getCommunityList($page = 1, $size = 15)
    {
        $pageData = CommunityModel::getList($page,$size);
        return $pageData;
    }

    /**
     * 编辑行动社状态
     *
     * @return \think\response\Json
     */
    public function putCommunityStatus()
    {
        (new CommunityPutStatus())->goCheck();
        $data = input('put.');
        CommunityModel::checkCommunityExists($data['id']);
        CommunityModel::update(['status' => $data['status']], ['id' => $data['id']]);
        return json(new SuccessMessage(), 201);
    }
}