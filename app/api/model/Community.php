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

use app\lib\exception\ParameterException;

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
        $res = self::where('id',$id)->find();
        return $res;
    }

    /**
     * 获取推荐行动社分页
     * 1. level DESC
     *
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function getSummaryList($page = 1, $size = 15)
    {
        $where['recommended'] = 1;
        $where['status'] = 0;
        $where['search'] = 0;

        $pagingData = self::where($where)
            ->order('level DESC, create_time DESC')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 根据行动社名称模糊查询
     * @param $name
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function searchCommunity($name, $page = 1, $size = 15)
    {
        $where['status'] = 0;
        $where['search'] = 0;
        $where['name'] = ['like','%'.$name.'%'];

        $pagingData = self::where($where)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 检查行动社是否存在
     * @param $id
     * @throws ParameterException
     */
    public static function checkCommunityExists($id)
    {
        $res = self::get(['id' => $id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '行动社不存在，请检查ID: '.$id
            ]);
        }
    }

    /**
     * 编辑行动社时，可以不修改名称保存
     * @param $community_id
     * @param $name
     * @return bool
     * @throws ParameterException
     */
    public static function checkNameUpdate($community_id,$name)
    {
        $res = self::get(['id' => $community_id,'name' => $name]);
        if($res){
            return true;
        }

        $result = self::get(['name' => $name]);
        if($result){
            throw new ParameterException(
                [
                    'msg' => "'".$name."'已经存在了,换一个修改名称吧"
                ]);
        }
    }

    public static function getSum()
    {
        return self::count();
    }

    public static function getList($page,$size)
    {
        $pageData = self::order('create_time desc')
            ->paginate($size, false, ['page' => $page]);
        return $pageData;
    }



}