<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankaController extends Controller
{
    public function index()
    {
    	$res = \DB::table('record')->get();
    	return view('admin.jilu.banka',['title'=>'办卡记录管理','res'=>$res]);
    }

    //记录审核
    public function jilushenhe(Request $request)
    {
    	$id = $request->all();
    	$record= \DB::table('record')->where('id',$id)->first();

    	$card = $record->card;

    	$price = $record->price;
    	$user = \DB::table('user')->where('card',$card)->first();
    	$oldmoney = $user->money;
    	$money = $price +$oldmoney;
    	$res = \DB::table('user')->where('card',$card)->update(['money'=>$money]);
    	$shenhe = \DB::table('record')->where('card',$card)->update(['status'=>0]);

    	if ($res || $shenhe) {
    		echo 1;
    	}else{
    		echo 0;
    	}
    	
    }

    //记录删除
    public function jiludel(Request $request)
    {
    	$id = $request->all();

    	$res = \DB::table('record')->where('id',$id)->delete();

    	if($res){
    		echo 1;
    	}else{
    		echo 0;
    	}

    }
     //记录删除
    public function weitongguo(Request $request)
    {
 
    	$id = $request->all();
        dd($id);die;
    	$res = \DB::table('record')->where('id',$id)->update(['status'=>1]);

    	if ($res) {
    		echo 1;
    	}else{
    		echo 0;
    	}
    	
    }
}
