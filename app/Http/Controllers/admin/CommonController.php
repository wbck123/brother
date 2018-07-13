<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
  public function upload(Request $request)
    {

        $file = $request->file('img');

        // 获取文件路径
        $transverse_pic = $file->getRealPath();
        // public路径
        $path = public_path('./uploads/'.date('Ym'));
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
