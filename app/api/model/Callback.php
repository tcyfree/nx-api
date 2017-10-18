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
// | DateTime: 2017/10/16/11:09
// +----------------------------------------------------------------------

namespace app\api\model;


class Callback extends BaseModel
{
    protected $autoWriteTimestamp =true;

    public function registerCallback()
    {

    }

    /**
     * 注销回调
     *
     * @param $id
     */
    public function cancelCallback($id)
    {
        self::update(['status' => 1, 'update_time' => time()],
            ['id' => $id]);
    }
}