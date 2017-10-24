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
// | DateTime: 2017/10/24/13:49
// +----------------------------------------------------------------------
# 创建websocket服务器对象，监听0.0.0.0:9502端口
$ws = new swoole_websocket_server("0.0.0.0", 9501);

# 监听WebSocket连接打开事件
$ws->on('open', function ($ws, $request) {
    // var_dump($request->fd, $request->get, $request->server);
    echo $request->server['remote_addr']."已连接\n";
    $ws->push($request->fd, "hello, welcome.your ip is {$request->server['remote_addr']}\n");

    # 广播
    foreach($ws->connections as $fd) {
        $ws->push($fd, "用户{$request->fd}已登录聊天");
    }
});

# 监听WebSocket消息事件
$ws->on('message', function (swoole_websocket_server $server, $frame) {
    echo $frame->fd." Message: {$frame->data}\n";
    # 广播
    foreach($server->connections as $fd) {
        $server->push($fd, "用户{$frame->fd}说: {$frame->data}");
    }

});

# 监听WebSocket连接关闭事件
$ws->on('close', function ($ws, $fd) {
    # var_dump($ws, $fd);
    echo "client-{$fd} is closed\n";
});

$ws->start();

