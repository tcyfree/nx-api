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
use app\lib\exception\MissException;
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
    Route::get('/number','api/:version.User/getUserByNumber');
    Route::get('/test1','api/:version.User/test');
});

/**
 * UserInfo
 */
Route::group(':version/user',function (){
    Route::put('profile','api/:version.UserInfo/putUserInfoProfile');
    Route::get('test','api/:version.UserInfo/test');
});

/**
 * OSS
 */
Route::group(':version/oss',function(){
    Route::get('/sts','api/:version.OSSManager/getSecurityToken');
    Route::get('/policy','api/:version.OSSManager/getPolicySignature');
    Route::get('/policy_callback','api/:version.OSSManager/getPolicySignatureCallback');
    Route::post('/upload','api/:version.OSSManager/uploadOSS');
    Route::get('/callback','api/:version.OSSManager/callbackResponse');
    Route::get('/mp4','api/:version.OSSManager/OSSTransCodingMp4');
    Route::get('/mp3','api/:version.OSSManager/OSSTransCodingMp3');
});

/**
 * Community
 */
Route::group(':version/community',function(){
    Route::get('/post_check','api/:version.Community/postCommunityCheckAllow');
    Route::get('test','api/:version.Community/test');
    Route::get('user','api/:version.Community/getNicknameAndAuth');
    Route::post('','api/:version.Community/createCommunity');
    Route::put('/join','api/:version.Community/freeJoin');
    Route::put('/allow','api/:version.Community/permitOrRefuse');
    Route::get('/init','api/:version.Community/initUpdateNum');
    Route::put('','api/:version.Community/updateCommunity');
    Route::get('/recommend/:page/:size','api/:version.Community/getRecommendSummary');
    Route::get('/:type/:page/:size','api/:version.Community/getSummaryByUser');
    Route::get('/member','api/:version.Community/getMemberList');
    Route::get('/manager','api/:version.CommunityUser/getManagerUser');
    Route::put('/member','api/:version.Community/suspendMember');
    Route::get('/:id','api/:version.Community/getDetail');
    Route::post('/manager','api/:version.Community/setManager');
    Route::post('/transfer','api/:version.Community/transferCommunity');
    Route::post('/report','api/:version.Community/reportCommunity');
    Route::post('/search','api/:version.Community/searchCommunity');
    Route::delete('','api/:version.Community/leaveCommunity');
    Route::put('/profile','api/:version.Community/putCommunityProfile');
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
    Route::get('/the_last_join','api/:version.ActPlan/getTheLastJoin');
});

/**
 * Task
 */
Route::group(':version/task',function (){
    Route::post('feedback_other','api/:version.Task/putTaskFeedbackByOther');
    Route::get('/feedback/look_','api/:version.Task/getNotLook');
    Route::get('/test','api/:version.Task/test');
    Route::post('','api/:version.Task/createTask');
    Route::put('','api/:version.Task/updateTask');
    Route::put('/accelerate','api/:version.Task/accelerateTask');
    Route::get('/feedback','api/:version.Task/getFeedbackStatus');
    Route::get('/feedback_detail','api/:version.Task/feedbackDetail');
    Route::get('feedback_others','api/:version.Task/feedbackByOthers');
    Route::get('/:id/:page/:size', 'api/:version.Task/getSummaryList');
    Route::get('/:id', 'api/:version.Task/getTaskDetail');
    Route::post('/go','api/:version.Task/goTask');
    Route::post('feedback','api/:version.Task/feedback');
    Route::put('feedback','api/:version.Task/feedbackPassOrFail');

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
    Route::get('','api/:version.Wallet/getWalletByUser');
    Route::get('/recharge','api/:version.Wallet/getRechargeList');
    Route::delete('/withdraw','api/:version.WxEnterprisePayment/deleteEnterprisePayment');
});

/**
 * Communication
 */
Route::group(':version/communication',function (){
    Route::post('','api/:version.Communication/createCommunication');
    Route::get('','api/:version.Communication/getCommunicationList');
    Route::get('/user','api/:version.Communication/getListByUser');
    Route::put('like','api/:version.Communication/operateCommunityByUser');
    Route::delete('','api/:version.Communication/deleteCommunication');
    Route::get('/detail','api/:version.Communication/getCommunicationDetail');
});

/**
 * Comment
 */
Route::group(':version/comment',function (){
    Route::post('','api/:version.Comment/createComment');
    Route::get('','api/:version.Comment/getCommentList');
    Route::put('/like','api/:version.Comment/operateCommentByUser');
});

/**
 * Notice
 */
Route::group(':version/notice',function (){
    Route::get('','api/:version.Notice/getNoticeList');
    Route::get('/look_','api/:version.Notice/getNoticeLook');
    Route::delete('','api/:version.Notice/clearNotice');
    Route::get('/all_look','api/:version.Notice/getAllNotLook');
});

/**
 * CommentNotice
 */
Route::group(':version/comment/notice',function (){
    Route::get('','api/:version.CommentNotice/getNoticeList');
    Route::get('/look_','api/:version.CommentNotice/getNoticeLook');
    Route::delete('','api/:version.CommentNotice/clearNotice');
    Route::get('/all_look','api/:version.CommentNotice/getAllNotLook');
});

/**
 * WeiXin
 */
Route::group(':version/wx',function (){
    Route::get('/media_uri','api/:version.WeiXin/getDownloadMediaUri');
    Route::get('/subscribe','api/:version.WeiXin/getSubscribe');
});

/**
 * callback
 */
Route::group(':version/callback',function (){
    Route::get('','api/:version.Callback/doCallback');
});

/**
 * Swoole
 */
Route::group(':version/swoole',function (){
    Route::get('test','api/:version.Swoole/test');
});

/**
 * execution
 */
Route::group(':version/execution',function (){
    Route::get('','api/:version.Execution/executionTrackerList');
});

/**
 * Message
 */
Route::group(':version/message',function (){
    Route::get('/dialogue','api/:version.Message/getMessageList');
    Route::get('','api/:version.Message/getSummaryList');
    Route::post('','api/:version.Message/addMessage');
    Route::delete('/dialogue','api/:version.Message/deleteMessage');
    Route::get('/look_','api/:version.Message/getNotLook');
    Route::get('test','api/:version.Message/test');
});

/**
 * Activity
 */
Route::group(':version/activity',function (){
    Route::post('','api/:version.Activity/postActivity');
    Route::put('','api/:version.Activity/putActivity');
    Route::get('/list','api/:version.Activity/getActivityList');
    Route::get('','api/:version.Activity/getActivity');
    Route::post('/search','api/:version.Activity/searchActivity');
    Route::delete('/wallet','api/:version.Activity/deleteWalletByJoinActivity');
    Route::get('/join_list','api/:version.Activity/getActivityJoinList');
});

/**
 * Course
 */
Route::group(':version/course',function (){
    Route::post('','api/:version.Course/postCourse');
    Route::get('','api/:version.Course/getCourse');
    Route::put('','api/:version.Course/putCourse');
    Route::get('/list','api/:version.Course/getCourseList');
    Route::post('/syllabus','api/:version.Syllabus/postSyllabus');
    Route::put('/syllabus','api/:version.Syllabus/putSyllabus');
    Route::get('/syllabus','api/:version.Syllabus/getSyllabus');
    Route::get('/syllabus/list','api/:version.Syllabus/getSyllabusList');
    Route::post('/search','api/:version.Course/searchCourse');
    Route::delete('/wallet','api/:version.Course/deleteWalletByJoinActivity');
});

/**
 * Admin
 */
Route::group(':admin',function (){
    Route::get('/report','api/:admin.Report/getReport');
    Route::get('/community_list','api/:admin.Community/getCommunityList');
    Route::get('/user_list','api/:admin.User/getUserList');
    Route::put('/community/status','api/:admin.Community/putCommunityStatus');
    Route::put('/user/status','api/:admin.User/putUserStatus');
});

/**
 * MiniProgram
 */
Route::group(':version/mini',function (){
    Route::post('/qrcode','api/:version.MiniProgram/getMiniQRCode');
    Route::put('/wallet','api/:version.Recharge/getMiniPreOrder');
});

Route::resource('blog','index/Blog');

Route::group('swagger',function (){
    Route::get('','index/Swagger/index');
});

/**
 * MISS路由，当全部路由没有匹配到时
 * 将返回资源未找到的信息
 */
Route::miss(function () {
    throw  new MissException();
});






