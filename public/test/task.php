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
// | DateTime: 2018/4/10/16:48
// +----------------------------------------------------------------------
$redis = new \redis();
$redis->connect("127.0.0.1","6379");  //php客户端设置的ip及端口

function test($redis, $pattern, $channel, $msg) {
    echo "Pattern: $pattern\n";
    echo "Channel: $channel\n";
    echo "Payload: $msg\n";
}

$redis->psubscribe(array('__key*__:expired'), 'test');
