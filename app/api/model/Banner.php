<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/23
 * Time: 11:45
 */

namespace app\api\model;


use think\Db;
use think\Exception;
use think\Model;

class Banner extends BaseModel
{
//[ SQL ] SHOW COLUMNS FROM `user` [ RunTime:0.001582s ]
    
    // php think optimize:schema
    //Model 里可以指定查询数据库的哪张表
//    protected $table = 'xxx';

    protected $hidden = ['update_time','delete_time'];

    public function items()
    {
        return $this->hasMany('BannerItem', 'banner_id', 'id');
    }

    public static function getBannerByID($id)
    {
        //嵌套关联查询
        $banner = self::with(['items', 'items.img'])
            ->find($id);
        
        return $banner;

        //原生SQL查询,?代表占位符
//        $result = Db::query('
//            select * from banner_item where banner_id = ?',[$id]);
//        return $result;
        //查询构造器
        $result = Db::table('user')
            ->fetchSql()//不会真正执行SQL语句，返回要执行的SQL
            ->where('banner_id','=',$id)//辅助/链式方法，是不会执行SQL语句
            ->select();//查询方法。数据库执行方法：select、find、insert、update、delete（5个）
        //where('字段名','表达式','查询条件')
        //表达式、数组法、闭包
        //闭包法
        $result = Db::table('user')
            ->where(function ($query) use ($id) {
                $query->where('banner_id','=',$id);
            })
            ->select();
        //ORM Object Relation Mapping 对象关系映射  将数据库表当成对象处理，而非简单的二维表查询
        //模型，模型可以包含多个对象
        //git config --global gui.encoding utf-8
        //git 乱码


    }
}