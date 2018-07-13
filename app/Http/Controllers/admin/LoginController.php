<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Session;
use App\Models\Admin\Admin;

class LoginController extends Controller
{
    //
    public function login()
    {
    
    	return view('admin.login.login',['title'=>'后台的登录页面']);
    }

    public function dologin(Request $request)
    {

    	$res = $request->except('_token');

        $tel = Admin::where('tel',$res['tel'])->first();

        //获取信息
        if(!$tel){

            return back()->with('error','用户名或密码不正确');
        }

    	//判断密码
        if (!Hash::check($res['pwd'], $tel->pwd)) {
            // 密码对比...

            //如果说密码失败
            return back()->with('error','用户名或密码不正确');
        }

        session(['name'=>$tel->name]);

        return redirect('/admin/index');

    }

    public function logout()
    {

        session(['name'=>'']);
        return redirect('admin/login');
    }

}
