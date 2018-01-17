<?php
/**
 * Created by PhpStorm.
 * User: probe
 * Date: 2017/8/22
 * Time: 14:17
 */

namespace app\api\model;


use app\lib\exception\ParameterException;

class ActPlan extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $hidden = ['delete_time','update_time'];

    public function community()
    {
        return $this->hasOne('Community','id','community_id');
    }
    /**
     * 根据行动计划名称模糊查询
     * @param $name
     * @param int $page
     * @param int $size
     * @return \think\Paginator
     */
    public static function searchActPlan($name, $page = 1, $size = 15)
    {
        $where['name'] = ['like','%'.$name.'%'];

        $pagingData = self::where($where)
            ->order('create_time desc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    /**
     * 检查行动计划是否存在
     * @param $id
     * @return null|static
     * @throws ParameterException
     */
    public static function checkActPlanExists($id)
    {
        $res = self::get(['id' => $id]);
        if(!$res){
            throw new ParameterException([
                'msg' => '行动计划不存在，请检查ID'
            ]);
        }

        return $res;
    }

    /**
     * 根据行动社分页查找对应行动计划列表
     * @param $data
     * @return \think\Paginator
     */
    public static function actPlanByList($data)
    {
        $page = $data['page'];
        $size = $data['size'];
        $where['community_id'] = $data['community_id'];

        $pagingData = self::where($where)
            ->order('create_time asc')
            ->paginate($size, true, ['page' => $page]);

        return $pagingData;
    }

    public static function getSum()
    {
        return self::count();
    }
}