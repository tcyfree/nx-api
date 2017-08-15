<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//微信授权,签发Token
Route::get('api/:version/code','api/:version.Token/getCode');
Route::post('api/:version/user/token', 'api/:version.Token/getToken');
Route::delete('api/:version/user/token', 'api/:version.Token/deleteToken');

//OSS
Route::get('api/:version/oss/sts','api/:version.OSS/getSecurityToken');

//user
Route::get('api/:version/user', 'api/:version.User/getUserInfo');

Route::post('api/:version/token/verify', 'api/:version.Token/verifyToken');
Route::post('api/:version/token/app', 'api/:version.Token/getAppToken');

Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');


Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id', 'api/:version.Theme/getComplexOne');


Route::get('api/:version/product/by_category', 'api/:version.Product/getAllInCategory');
Route::get('api/:version/product/:id', 'api/:version.Product/getOne',[], ['id'=>'\d+']);
Route::get('api/:version/product/recent', 'api/:version.Product/getRecent');

//Route::group('api/:version/product', function(){
//    Route::get('/by_category','api/:version.Product/getAllInCategory');
//    Route::get('/:id', 'api/:version.Product/getOne',[], ['id'=>'\d+']);
//    Route::get('/recent', 'api/:version.Product/getRecent');
//});

Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');




//Address
Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');
Route::get('api/:version/address', 'api/:version.Address/getUserAddress');

//Route::get('api/:version/second', 'api/:version.Address/second');
//Route::get('api/:version/third', 'api/:version.Address/third');


//Order
Route::post('api/:version/order', 'api/:version.Order/placeOrder');
Route::get('api/:version/order/:id', 'api/:version.Order/getDetail',
    [], ['id'=>'\d+']);
Route::get('api/:version/order/by_user', 'api/:version.Order/getSummaryByUser');
Route::get('api/:version/order/paginate', 'api/:version.Order/getSummary');
Route::put('api/:version/order/delivery', 'api/:version.Order/delivery');



Route::post('api/:version/pay/pre_order', 'api/:version.Pay/getPreOrder');
Route::post('api/:version/pay/notify', 'api/:version.Pay/receiveNotify');
Route::post('api/:version/pay/re_notify', 'api/:version.Pay/redirectNotify');

Route::get('api/:version/test', 'api/:version.Community/getIndex');
Route::get('api/:version/set', 'api/:version.Banner/setCache');
Route::get('api/:version/get', 'api/:version.Banner/test');





