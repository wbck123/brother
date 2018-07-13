<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\library\Ucpaas;
class TestController extends Controller
{
    public function test()
    {
    	return view('home.index.test');
    }


    public function yzm(Request $request)
    {
        
      dd($request->all());



    }
    public function upload(Request $request)
    {

    	$file = $request->file('photo');

    	// 获取文件路径
    	$transverse_pic = $file->getRealPath();
    	// public路径
    	$path = public_path('./uploads/'.time());
    	// 获取后缀名
    	$postfix = $file->getClientOriginalExtension();
    	// 拼装文件名
    	$fileName = md5(time().rand(0,10000)).'.'.$postfix;
    	// 移动
    	if(!$file->move($path,$fileName)){
    	    return response()->json(['ServerNo' => '400','ResultData' => '文件保存失败']);
    	}
    	
    	return response()->json(['code'=>0,'ServerNo' => '200','ResultData' => $fileName]);
    }
}
