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
// | DateTime: 2018/4/10/17:08
// +----------------------------------------------------------------------

namespace app\api\service;


class MyRedis
{
    private $redis;

    public function __construct($host = '127.0.0.1', $port = 6379)
    {
        $this->redis = new \Redis();
        $this->redis->connect($host, $port);
        $this->setOption();
    }

    public function expire($key = null, $time = 0)
    {
        return $this->redis->expire($key, $time);
    }

    public function psubscribe($patterns = array(), $callback)
    {
        $this->redis->psubscribe($patterns, $callback);
    }

    public function setOption()
    {
        $this->redis->setOption(\Redis::OPT_READ_TIMEOUT, -1);
    }
}
