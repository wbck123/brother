<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use session;

class LoginController extends Controller
{
    //用户注册
    public function register($id)
    {
    	return view('home.login.register',['id'=>$id]);
    }

    public function yzm(Request $request)
    {
        $tel = $request->all();
        $tel = $tel['tel'];
        $statusStr = array(
        "0" => "短信发送成功",
        "-1" => "参数不全",
        "-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        "30" => "密码错误",
        "40" => "账号不存在",
        "41" => "余额不足",
        "42" => "帐户已过期",
        "43" => "IP地址限制",
        "50" => "内容含有敏感词"
    );  
    $smsapi = "http://www.smsbao.com/"; //短信网关
    $user = config(''); //短信平台帐号
    $pass = md5("13140568"); //短信平台密码
    $rand_code=rand(1000,9999);
    //设置cookie缓存时间
    \Cookie::queue('code',$rand_code,time()+7200);
    $content="您的验证码是".$rand_code.",打死都不要告诉别人哦";

    $phone = $tel ;
    $sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
    $result =file_get_contents($sendurl) ;
    // echo $statusStr[$result];
        if($statusStr[$result]){
            return 1;
        }else{
            return 1;
        }
    }


    public function doregister(Request $request)
    {
        $data = $request->all();
        $tel = $data['tel'];

        if($data['code'] != \Cookie::get('code')){
            return 3;die;
        }
     //查询用户是否注册
        $u = \DB::table('user')->where('tel',$tel)->first();
        //$u ==null
       if( empty($u)){
            $id = $data['id'];
            $code = $data['code'];
            //获取上级用户的信息
            $user = \DB::table('user')->where('id',$id)->first();
            $arr =[];
            //绑定三级分销关系
            $arr['lev1'] = $id;
            $arr['tel'] = $data['tel'];
            $arr['lev2'] = $user->lev1;

            $arr['lev3'] = $user->lev2;
            $arr['vid'] = rand(5000,999999);
            $arr['nick'] = '用户'.$arr['vid'];
            $arr['tpic'] = '/tpic.png';
            $arr['ctime'] = time();
            $arr['money'] = '0';
            $res = \DB::table('user')->insert($arr);

            if (!$res) {
                return 1;die;
            }
       }

       $user = \DB::table('user')->where('tel',$tel)->first();

       session(['id'=>$user->id]);
       return 2;


    }


    //前台用户退出
    //
    public function loginout()
    {
        session(['id'=>'']);
        return redirect('/');
    }
}
