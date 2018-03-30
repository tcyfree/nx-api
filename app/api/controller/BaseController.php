<?php
/**
 * Created by tcyfree.
 * Author: tcyfree
 * Date: 2017/5/27
 * Time: 4:44
 */

namespace app\api\controller;


use app\api\service\Token as TokenService;
use think\Controller;

class BaseController extends Controller
{
    /**
     * 需要用户和CMS管理员都可以访问的权限
     */
    protected function checkPrimaryScope()
    {
        TokenService::needPrimaryScope();
    }

    /**
     * 只有用户才能访问的接口权限
     */
    protected function checkExclusiveScope()
    {
        TokenService::needExclusiveScope();
    }

    /**
     * 只有管理员才能访问的接口权限
     */
    protected function checkAdminScope()
    {
        TokenService::needAdminScope();
    }

}