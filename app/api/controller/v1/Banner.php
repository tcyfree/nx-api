<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/4/17
 * Time: 2:05
 */

namespace app\api\controller\v1;

use app\api\model\Image;
use app\api\service\Token;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Cache;
use think\Exception;
use think\Log;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     *
     */
    public function getBanner($id)
    {
  //  php think optimize:route

// CDN

        //AOP 面向切面编程
        (new IDMustBePostiveInt())->goCheck();
        try
        {
//            $banner = BannerModel::getBannerById($id);
            1/0;
        }
        catch (Exception $ex)
        {
            $err = [
                'error_code' => 10001,
                'msg' => $ex->getMessage()
            ];
            return json($err,400);
        }
        //静态调用Model中的方法
        $banner = BannerModel::getBannerByID($id);
        //实例对象调用
//        $banner = new BannerModel();
//        $banner = $banner->get($id);
//        $banner = BannerModel::get($id);//tp Model自带方法get，获取到的是一个对象。对应数据库的banner表值
        //查询动词：get,find,all,select方法
        //get/find:一条记录或一个模型对象；all/select:返回一组记录/一组模型对象
        //get/all:模型特有的方法，模型也可以使用find/select;
        //find/select:Db特有的方法,不能使用get/all
        //使用ORM会影响一定性能。But好的代码的第一原则是可读性。
        //关联查询
//        $banner = BannerModel::with('items')->find();

        //删除模型字段
        $data = $banner->toArray();
        unset($data['delete_time']);
        if(!$banner){
            throw new BannerMissException();
//            throw new Exception(); //模拟服务器内部错误
        }
        return $banner;
    }
    public function test(){
//        $redis = new \redis();
//        $redis->connect("192.168.0.165","6379");  //php客户端设置的ip及端口
//
//        $rst = 0;
//        while ($rst == 0){
//            //随机数种子发生器:8位随机数
//            $number = mt_rand(10000000, 99999999);
//            //Redis 中 集合是通过哈希表实现的，所以添加，删除，查找的复杂度都是O(1)。
//            $rst = $redis->sadd('number',$number); // 如果集合中已经存在uuid，返回0，否则返回1;
//        }
//        echo $number;
//        $redis->flushAll();
//        $r = $redis->smembers('number');
//        var_dump($r);
        number();
    }
}