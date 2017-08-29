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
// | DateTime: 2017/8/29/13:34
// +----------------------------------------------------------------------

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\validate\TaskNew;
use app\api\service\Token as TokenService;
use app\api\model\Task as TaskModel;
use app\api\model\TaskRecord as TaskRecordModel;
use app\lib\exception\SuccessMessage;

class Task extends BaseController
{
    /**
     * 创建任务
     * @return \think\response\Json
     */
    public function createTask()
    {
        (new TaskNew())->goCheck();
        $data['user_id'] = TokenService::getCurrentUid();
        $id = uuid();

        $dataArray = input('post.');
        $dataArray['id'] = $id;
        TaskModel::create($dataArray);

        $data['task_id'] = $id;
        $data['type'] = 0;
        TaskRecordModel::create($data);

        return json(new SuccessMessage(),201);
    }
}