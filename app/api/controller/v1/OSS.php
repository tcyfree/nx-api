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
use think\Loader;

//require_once (__DIR__.'/../../../../vendor/sts-server/sts.php');

Loader::import('sts-server.sts', EXTEND_PATH, '.php');

class OSS extends BaseController
{
    protected $beforeActionList = [
      'checkPrimaryScope' => ['only' => 'getSecurityToken']
    ];
    /**
     * 获取STS上传凭证
     * @return array
     */
    public function getSecurityToken(){
        return sts();
    }

}