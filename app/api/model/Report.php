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
use app\lib\exception\ParameterException;

class Report extends BaseModel
{
    protected $autoWriteTimestamp = true;
    //关闭自动更新字段
    protected $updateTime = false;

    /**
     * 投诉
     * 1 文字或图片不能同时为空
     *
     * @param $data
     * @throws ParameterException
     */
    public static function createReport($data)
    {
        $data['user_id'] = Token::getCurrentUid();
        $report = new Report();
        if (!isset($data['content']) && !isset($data['images'])) {
            throw new ParameterException([
                'msg' => '投诉内容或图片不能同时为空！'
            ]);
        }
        if (isset($data['images'])){
            $data['images'] = json_encode($data['images']);
        }
        // 过滤数组中的非数据表字段数据
        $report->allowField(true)->save($data);
//        $id = self::getLastInsID();
//
//        $cData['key_id'] = $id;
//        $cData['key_type'] = 0;
//        $cData['type'] = 0;
//
//        if (isset($data['images'])){
//            foreach ($data['images'] as $v)
//            {
//                $cData['uri'] = $v;
//                Asset::create($cData);
//            }
//        }


    }
}