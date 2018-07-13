<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//图片上传
Route::get('test','admin\TestController@test');
Route::post('yzm','home\LoginController@yzm');
Route::post('doregister','home\LoginController@doregister');
Route::get('loginout','home\LoginController@loginout');

Route::post('/upload','admin\CommonController@upload');
Route::group(['middleware'=>'login'],function(){
	//后台首页
	Route::get('admin/index','admin\IndexController@index');
	Route::get('admin/banka','admin\BankaController@index');
	Route::resource('admin/cash','admin\CashController');
	Route::any('admin/dakuan','admin\CashController@dakuan');
	Route::any('admin/wei','admin\CashController@wei');
	Route::get('admin/order','admin\OrderController@index');
	//后台用户
	Route::resource('admin/user','admin\UserController');
	// 用户级别路由
	Route::resource('admin/group','admin\GroupController');
	Route::any('admin/groupdel','admin\GroupController@groupdel');

	Route::resource('admin/fcategory','admin\FcategoryController');
	// 权限管理路由
	Route::resource('admin/auth','admin\AdminController');
	Route::any('admin/authdel','admin\AdminController@authdel');
	// 广告管理路由
	Route::resource('admin/ad','admin\AdController');
	Route::any('admin/addel','admin\AdController@addel');
	// 用户管理路由
	Route::resource('admin/user','admin\UserController');
	Route::any('admin/userdel','admin\UserController@userdel');
	// 银行管理路由
	Route::resource('admin/bank','admin\BanksController');
	Route::any('admin/bankdel','admin\BanksController@bankdel');
	// 公告管理路由
	Route::resource('admin/notice','admin\NoticeController');
	Route::any('admin/noticedel','admin\NoticeController@noticedel');

	// 新闻分类路由
	Route::resource('admin/newcate','admin\NewcateController');
	Route::any('admin/newcatedel','admin\NewcateController@newcatedel');
	// 新闻列表路由
	Route::resource('admin/article','admin\ArticleController');
	Route::any('admin/articledel','admin\ArticleController@articledel');

	Route::resource('admin/fcategory','admin\FcategoryController');
	//系统设置路由
	Route::resource('admin/system','admin\SystemController');
	//服务协议路由
	Route::resource('admin/service','admin\ServiceController');
	//导航管理
	Route::resource('admin/nav','admin\NavController');			// 导航分类
	Route::any('/admin/navdel','admin\NavController@navdel');	// 导航删除
	Route::any('/admin/jilushenhe','admin\BankaController@jilushenhe');	// 记录审核
	Route::any('/admin/jiludel','admin\BankaController@jiludel');	// 记录删除
	Route::any('/admin/weitongguo','admin\BankaController@weitongguo');	// 记录未通过
});


//前台用户注册
Route::get('register/{id?}','home\LoginController@register');

//前台用户中心
Route::group(['middleware'=>'user'],function(){
	//前台首页
	Route::resource('/','home\IndexController');
	Route::get('article/{id}','home\IndexController@article');
	Route::get('news/{id}','home\IndexController@news');
	Route::get('session','home\IndexController@session');


	Route::get('user','home\UserController@user');
	Route::get('user/ques','home\UserController@ques');
	Route::get('user/guide','home\UserController@guide');
	Route::get('user/notice','home\UserController@notice');
	Route::get('user/person','home\UserController@person');
	Route::get('user/qrcode/{ids}','home\UserController@qrcode');
	Route::get('user/kefu','home\UserController@kefu');
	Route::get('user/level','home\UserController@level');
	Route::get('user/caips','home\UserController@caips');
	Route::get('user/book','home\UserController@book');
	Route::get('user/team/{id}','home\UserController@team');
	Route::get('user/account','home\UserController@account');
	Route::get('user/cashrecord/{ids}','home\UserController@cashrecord');
	Route::resource('user/cash','home\CashController');
	Route::resource('bank','home\BankController');
	Route::get('bank/detial/{id}/1','home\BankController@detial');
	Route::get('shenqing/{ids}/{cid}','home\RecordController@shenqing');
	Route::post('bankshenqing','home\RecordController@bankshenqing');
	//会员中心保存资料AJAX
	Route::post('/baocunziliao','home\UserController@baocunziliao');
});

//后台登录及退出
Route::any('admin/dologin','admin\LoginController@dologin');
Route::any('admin/login','admin\LoginController@login');
Route::any('admin/logout','admin\LoginController@logout');

//后台Ajax路由
Route::any('admin/bankdel','admin\BanksController@bankdel');
Route::any('admin/sysajax','admin\SystemController@sysAjax');