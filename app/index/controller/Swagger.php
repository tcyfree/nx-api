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
// | DateTime: 2018/4/12/17:34
// +----------------------------------------------------------------------

namespace app\index\controller;


use think\Controller;

class Swagger extends Controller
{
    public function index(){
        $path = APP_PATH.'index'; //你想要哪个文件夹下面的注释生成对应的API文档
        $swagger = \Swagger\scan($path);
        // header('Content-Type: application/json');
        // echo $swagger;
        $swagger_json_path = ROOT_PATH.'public/swaggerApi/swagger.json';
        $res = file_put_contents($swagger_json_path, $swagger);
        if ($res == true) {
            $this->redirect('http://api.go-qxd.com/swagger-ui/dist/index.html');
        }
    }
}