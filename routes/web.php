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
//前台首页
Route::get('/','home\IndexController@index');
//图片上传
Route::get('test','admin\TestController@test');
Route::post('/upload','admin\CommonController@upload');

Route::any('admin/dologin','admin\LoginController@dologin');
Route::any('admin/login','admin\LoginController@login');		// 后台登陆
Route::any('admin/logout','admin\LoginController@logout');		// 退出登陆
Route::group(['middleware'=>'login'],function(){
	//后台首页
	Route::get('admin/index','admin\IndexController@index');
	Route::get('admin/banka','admin\BankaController@index');
	Route::resource('admin/cash','admin\CashController');
	Route::post('admin/dakuan','admin\CashController@dakuan');
	Route::post('admin/wei','admin\CashController@wei');
	Route::get('admin/order','admin\OrderController@index');
	//后台用户
	Route::resource('admin/user','admin\UserController');
	Route::resource('admin/system','admin\SystemController');
	Route::resource('admin/service','admin\ServiceController');
	Route::resource('admin/group','admin\GroupController');
	Route::resource('admin/fcategory','admin\FcategoryController');
	Route::resource('admin/auth','admin\AdminController');
	Route::resource('admin/ad','admin\AdController');
	Route::resource('admin/user','admin\UserController');
	Route::resource('admin/bank','admin\BanksController');
	Route::resource('admin/article','admin\ArticleController');
	Route::resource('admin/notice','admin\NoticeController');
	Route::resource('admin/nav','admin\NavController');			// 导航分类

	// 导航分类管理
	// Route::resource('admin/nav/create','admin\NavController');

	// 新闻分类管理
	Route::resource('admin/newcate','admin\NewcateController');
	Route::resource('admin/fcategory','admin\FcategoryController');
});
//前台用户注册
Route::get('register','home\LoginController@register');
Route::any('register/doreg','home\LoginController@reg');
Route::any('register/captcha','home\LoginController@captcha');		// 验证码
//前台用户中心
Route::group(['Middleware'=>'AdminLogin'],function(){

Route::get('user','home\UserController@user');
Route::get('user/ques','home\UserController@ques');
Route::get('user/guide','home\UserController@guide');
Route::get('user/notice','home\UserController@notice');
Route::get('user/person','home\UserController@person');
Route::get('user/qrcode','home\UserController@qrcode');
Route::get('user/kefu','home\UserController@kefu');
Route::get('user/level','home\UserController@level');
Route::get('user/caips','home\UserController@caips');
Route::get('user/book','home\UserController@book');
Route::get('user/team','home\UserController@team');
Route::get('user/account','home\UserController@account');
Route::resource('user/cash','home\CashController');
});

//前台路由组
Route::group([],function(){

});


//后台Ajax路由
Route::any('admin/bankdel','admin\BanksController@bankdel');	// 银行删除
Route::any('admin/sysajax','admin\SystemController@sysAjax');
Route::any('/admin/navdel','admin\NavController@navdel');	// 导航删除
Route::any('/admin/addel','admin\AdController@addel');		// 广告删除
