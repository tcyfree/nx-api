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
// | DateTime: 2018/1/9/10:27
// +----------------------------------------------------------------------

namespace app\api\model;

use app\lib\exception\ParameterException;
use app\api\model\Community as CommunityModel;

class Activity extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time'];

    public static function checkActivityExists($activity_id)
    {
        $res = self::get(['uuid' => $activity_id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '活动不存在，请检查ID: '.$activity_id
            ]);
        }
        return $res;
    }

    /**
     * 0 显示 1 不显示
     * @param $community_id
     * @param $page
     * @param $size
     * @return \think\Paginator
     */
    public static function getList($community_id,$page,$size)
    {
        CommunityModel::checkCommunityExists($community_id);
        $where['community_id'] = $community_id;
        $where['delete_time'] = 0;
        $where['display'] = 0;
        $res = self::where($where)
            ->order('create_time DESC')
            ->paginate($size,true,['page' => $page]);
        return $res;
    }

    public static function getSum()
    {
        return self::count();
    }

    /**
     * 根据行动计划名称模糊查询
     * @param $name
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function searchActivity($name, $page = 1, $size = 15)
    {
        $where['name'] = ['like','%'.$name.'%'];
        $where['delete_time'] = 0;
        $pagingData = self::where($where)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 验证当前时间是否小于活动截止日期
     *
     * @param $activity_id
     * @throws ParameterException
     */
    public static function checkEndTimeValidate($activity_id)
    {
        $res = self::where(['uuid' => $activity_id])->field('end_time')->find();
        if (time() > $res['end_time']){
            throw new ParameterException([
                'msg' => '活动截止日期是：'.date('Y-m-d H:m:s',$res['end_time']).'，选择其它活动参加吧'
            ]);
        }

    }

    /**
     * 验证参加人数是否已达设置人数上限
     *
     * @param $activity_id
     * @throws ParameterException
     */
    public static function checkAllowNum($activity_id)
    {
        $res = self::where(['uuid' => $activity_id])->field('join_count,allow_num')->find();
        if ($res['join_count'] >= $res['allow_num']){
            throw new ParameterException([
                'msg' => '该活动参加人数已达'.$res['allow_num'].'，选择其它活动参加吧'
            ]);
        }
    }

}