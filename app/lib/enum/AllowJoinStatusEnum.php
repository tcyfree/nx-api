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
// | DateTime: 2017/9/5/11:47
// +----------------------------------------------------------------------

namespace app\lib\enum;


class AllowJoinStatusEnum
{
    // 允许加入
    const ALLOW_JOIN =0;

    // 加入数量已满
    const ALLOW_JOIN_OUT = 5;

    //管理员 + 社长
    const ALLOW_JOIN_MANAGER = 2;

    //允许编辑社群次数
    const ALLOW_EDIT_TIME = 10;
}