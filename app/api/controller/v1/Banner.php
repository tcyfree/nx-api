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

        //AOP 面向切面编程 six six six
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

    /**
     * 如果设置成功返回true，否则返回false。
     */
    public function setCache(){
        // 切换到redis操作
        $result = Cache::store('redis')->set('name','value',5);
        var_dump($result);
    }
    public function test(){
        var_dump(Cache::store('redis')->get('name')) ;
        Cache::store('redis')->set('name','value',5);
    }
}