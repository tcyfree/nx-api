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
 * User
 */
Route::group(':version/user', function(){
    Route::get('/token','api/:version.Token/getToken');
    Route::delete('/token', 'api/:version.Token/deleteToken');
    Route::get('','api/:version.User/getUserInfo');
    Route::put('','api/:version.User/editUserInfo');
    Route::get('/execution','api/:version.User/getExecutionRankByUser');
    Route::post('/advice','api/:version.User/addAdvice');
    Route::post('/block','api/:version.User/blockUser');
    Route::delete('/block','api/:version.User/deleteBlockUser');
    Route::get('/block','api/:version.User/blockedList');
});


/**
 * OSS
 */
Route::group(':version/oss',function(){
    Route::get('/sts','api/:version.OSS/getSecurityToken');
    Route::get('/policy','api/:version.OSS/getPolicySignature');
});

/**
 * Community
 */
Route::group(':version/community',function(){
    Route::post('','api/:version.Community/createCommunity');
    Route::put('/join','api/:version.Community/freeJoin');
    Route::put('/allow','api/:version.Community/permitOrRefuse');
    Route::put('/init','api/:version.Community/initUpdateNum');
    Route::put('','api/:version.Community/updateCommunity');
    Route::get('/recommend/:page/:size','api/:version.Community/getRecommendSummary');
    Route::get('/:type/:page/:size','api/:version.Community/getSummaryByUser');
    Route::get('/member','api/:version.Community/getMemberList');
    Route::put('/member','api/:version.Community/suspendMember');
    Route::get('/:id','api/:version.Community/getDetail');
    Route::post('/manager','api/:version.Community/setManager');
    Route::post('/transfer','api/:version.Community/transferCommunity');
    Route::post('/report','api/:version.Community/reportCommunity');
    Route::post('/search','api/:version.Community/searchCommunity');
    Route::delete('','api/:version.Community/leaveCommunity');
});

/**
 * ActPlan
 */
Route::group(':version/plan',function (){
    Route::post('','api/:version.ActPlan/createActPlan');
    Route::put('','api/:version.ActPlan/updateActPlan');
    Route::post('/search','api/:version.ActPlan/searchActPlan');
    Route::get('/user/:page/:size','api/:version.ActPlan/joinActPlanByUser');
    Route::get('','api/:version.ActPlan/getSummaryListByCommunity');
});

/**
 * Task
 */
Route::group(':version/task',function (){
    Route::post('','api/:version.Task/createTask');
    Route::put('','api/:version.Task/updateTask');
    Route::get('/:id/:page/:size', 'api/:version.Task/getSummaryList');
    Route::get('/:id', 'api/:version.Task/getTaskDetail');
});

/**
 * Wallet
 */
Route::group(':version/wallet',function (){
    Route::post('/order','api/:version.Recharge/createWXOrder');
    Route::put('/order','api/:version.Recharge/getPreOrder');
    Route::post('/notify', 'api/:version.Recharge/receiveNotify');
    Route::delete('','api/:version.Wallet/expensesActPlan');
    Route::get('/list','api/:version.Wallet/getIncomeExpensesSummary');
});






