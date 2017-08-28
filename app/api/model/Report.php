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
// | DateTime: 2017/8/28/16:18
// +----------------------------------------------------------------------

namespace app\api\model;


use app\api\service\Token;

class Report extends BaseModel
{
    protected $autoWriteTimestamp = true;
    //关闭自动更新字段
    protected $updateTime = false;

    /**
     * 投诉
     * @param $data
     */
    public static function createReport($data)
    {
        $data['user_id'] = Token::getCurrentUid();
        $report = new Report();
        // 过滤数组中的非数据表字段数据
        $report->allowField(true)->save($data);
        $id = self::getLastInsID();

        $cData['key_id'] = $id;
        $cData['key_type'] = 0;
        $cData['type'] = 0;
        foreach ($data['images'] as $v)
        {
            $cData['uri'] = $v;
            Asset::create($cData);
        }

    }
}