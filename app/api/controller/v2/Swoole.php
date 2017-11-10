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
// | DateTime: 2017/11/10/10:38
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;

class Swoole extends BaseController
{
    public function test()
    {
        $params = json_decode(input('get.params'),true);
        return $params;
    }
}