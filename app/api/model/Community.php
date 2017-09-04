<?php
// +----------------------------------------------------------------------
// | ThinkNuan-x [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017-2018 http://www.nuan-x.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: tcyfree <1946644259@qq.com>
// +----------------------------------------------------------------------

namespace app\api\model;


class Community extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['create_time','update_time','delete_time'];

    /**
     * 行动社下行动计划
     * @return \think\model\relation\HasMany
     */
    public function actPlan()
    {
        return $this->hasMany('ActPlan','community_id','id');
    }

    /**
     * 行动社详情
     * @param $id
     * @return array|false|\PDOStatement|string|\think\Model
     */
    public static function detailWithActPlan($id)
    {
        $res = self::with('actPlan')->where('id',$id)->find();
        return $res;
    }

    /**
     * 获取推荐行动社分页
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function getSummaryList($page = 1, $size = 15)
    {
        $where['recommended'] = 1;
        $where['status'] = 0;

        $pagingData = self::where($where)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);


        return $pagingData;
    }


}