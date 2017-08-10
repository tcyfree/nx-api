<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\CommunityUser;
use app\api\service\Token;

class Community extends BaseController
{
//    protected $beforeActionList = [
//        'checkPrimaryScope' => ['only' => 'getIndex']
//    ];

    public function QRCodeUrl(){
        echo qr_code('http://www.cnblogs.com/txw1958/');
    }

    public function getIndex(){
//        $uid = Token::getCurrentUid();
        $res = CommunityUser::getCommunityMemberNum(1);
        return $res;

    }
}