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

/**
 * 微信,签发Token
 */
Route::group('api/:version/wx',function(){
    Route::get('/code/:type','api/:version.Token/getCode');
});

/**
 * User
 */
Route::group('api/:version/user', function(){
    Route::get('/token','api/:version.Token/getToken');
    Route::delete('/token', 'api/:version.Token/deleteToken');
    Route::get('','api/:version.User/getUserInfo');
    Route::put('','api/:version.User/editUserInfo');
});


/**
 * OSS
 */
Route::group('api/:version/oss',function(){
    Route::get('/sts','api/:version.OSS/getSecurityToken');
});

/**
 * Community
 */
Route::group('api/:version/community',function(){
    Route::post('','api/:version.Community/createCommunity');
    Route::put('/allow','api/:version.Community/permitOrRefuse');
    Route::put('/init','api/:version.Community/initUpdateNum');
    Route::put('/:id','api/:version.Community/updateCommunity');
    Route::get('/:type/:page/:size','api/:version.Community/getSummaryByUser');
    Route::get('/:id','api/:version.Community/getDetail');
    Route::get('/member/:id/:page/:size','api/:version.Community/getMemberList');
    Route::post('/manager','api/:version.Community/setManager');
    Route::post('/transfer','api/:version.Community/transferCommunity');
    Route::post('/report','api/:version.Community/reportCommunity');
    Route::delete('','api/:version.Community/leaveCommunity');
});

/**
 * ActPlan
 */
Route::group('api/:version/plan',function (){
    Route::post('','api/:version.ActPlan/createActPlan');
});







