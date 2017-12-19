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
// | DateTime: 2017/12/19/10:45
// +----------------------------------------------------------------------

namespace app\api\controller\v2;


use app\api\controller\BaseController;
use app\api\service\Community as CommunityService;
use app\api\validate\PagingParameter;
use app\api\validate\UUID;
use app\api\service\Token as TokenService;
use think\Db;

class CommunityUser extends BaseController
{
    /**
     * 管理员列表
     * 权限：社长、管理员
     * 将自己user_id 加入列表中
     * 按拼音分组，A-Z和#
     *
     * @param $id
     * @param $page
     * @param $size
     * @return array
     */
    public function getManagerUser($id,$page = 1, $size = 15)
    {
        (new UUID())->goCheck();
        (new PagingParameter())->goCheck();

        $cs = new CommunityService();
        $params['community_id'] = $id;
        $uid = TokenService::getCurrentUid();
        $params['user_id'] = $uid;
        $cs->checkAuthority($params);
        $page = $page - 1;

        $type = '2';
        $data = Db::table('qxd_community_user')
            ->alias('c_u')
            ->join('__USER_INFO__ u_i','c_u.user_id = u_i.user_id')
            ->join('__USER__ u','u_i.user_id = u.id')
            ->where('(c_u.type <> '."'".$type."'".') AND c_u.community_id = '."'".$id."'")
            ->order('u_i.char_index ASC')
            ->field('c_u.type,c_u.pay,c_u.status,u_i.user_id,u_i.nickname,u_i.char_index,u_i.avatar,u_i.from,u.number')
            ->limit($page,$size)
            ->select()
            ->toArray();
        foreach ($data as &$v) {
            if ($v['from'] == '0'){
                $v['avatar'] = config('setting.img_prefix').$v['avatar'];
            }
        }
        $newData = [];
        //按照拼音首字母分组
        foreach ($data as &$v) {
            $pattern = '/[A-Z]/';
            $subject = $v['char_index'];
            $res = preg_match($pattern,$subject);
            if (!$res){
                $newData['#'][] = $v;
            }else{
                $newData[$v['char_index']][] = $v;
            }
        }

        $data['user_id'] = $uid;
        $newData['user_id'] = $uid;
        return [
//            'origin_data' => $data,
            'data' => $newData,
            'current_page' => $page + 1
        ];
    }
}