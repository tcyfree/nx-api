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
// | DateTime: 2017/9/20/15:20
// +----------------------------------------------------------------------

namespace app\api\model;


use app\lib\exception\ParameterException;

class Comment extends BaseModel
{
    protected $autoWriteTimestamp = true;
    protected $updateTime = false;

    public function userInfo()
    {
        return $this->hasOne('UserInfo','user_id','user_id');
    }

    public static function checkCommentExists($id)
    {
        $res = self::get(['id' => $id]);
        if (!$res){
            throw new ParameterException([
                'msg' => '评论不存在，请检查ID'
            ]);
        }else{
            return $res;
        }
    }

    /**
     * 评论列表
     * @param $communication_id
     * @param $page
     * @param $size
     * @return \think\Paginator
     */
    public static function commentList($communication_id,$page,$size)
    {
        $where['communication_id'] = $communication_id;
        $where['status'] = 1;
        $where['delete_time'] = 0;
        $pageData = self::with('userInfo')
            ->where($where)
            ->paginate($size,true,['page' => $page]);

        return $pageData;
    }
}