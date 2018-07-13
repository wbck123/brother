<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //用户注册
    public function register()
    {
    	return view('home.login.register');
    }

    public function yzm(Request $request)
    {
    	$tel = $request->input('tel');
        $smsapi = "http://www.smsbao.com/"; //短信网关
        $user = "lxj168"; //短信平台帐号
        $pass = md5("13140568"); //短信平台密码
        $rand_code=rand_string();
            //设置cookie缓存时间
        setcookie("code",$rand_code,time()+7200);
        $content="您的验证码是".$rand_code;//要发送的短信内容
        $phone = $tel;
        $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
        $result =file_get_contents($sendurl);
        if($result==0){
            echo 1;
            }else{
            echo 2;
            }
    }
}
