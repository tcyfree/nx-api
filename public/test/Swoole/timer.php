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
// | DateTime: 2017/11/10/10:09
// +----------------------------------------------------------------------
/**
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @return mixed
 */
function curl_get($url, &$httpCode = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //不做证书校验,部署在linux环境下请改为true
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}


//每隔2000ms触发一次
swoole_timer_tick(864000, function ($timer_id) {
    echo "tick-2000ms\n";
    $uri = 'http://api.xingdongshe.com/v2/swoole/test?params=';
    $params['p1'] = 1;
    $params['p2'] = 'test';
    $params_json = json_encode($params);
    var_dump(curl_get($uri.$params_json));
});

//3000ms后执行此函数
$timer_id = swoole_timer_after(3000, function () {
    echo "after 3000ms.\n";
});
echo $timer_id;

swoole_process::signal(SIGALRM, function () {
    static $i = 0;
    echo "#{$i}\talarm\n";
    $i++;
    if ($i > 20) {
        swoole_process::alarm(-1);
    }
});

//100ms
swoole_process::alarm(100 * 1000);

