<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecordController extends Controller
{
    //办卡申请
    public function shenqing(Request $request,$ids,$cid)
    {
       $id = $request->session()->get('id');
       $user = \DB::table('user')->where('id',$id)->first();
       return view('home.record.index',[
            'user'=>$user,
            'ids'=>$ids,
            'cid'=>$cid,
        ]); 
    }

    public function bankshenqing(Request $request)
    {
        $data = $request->all();

        $data['ctime']=time();
        $id =$data['id'];
        $bank = \DB::table('banks')->where('id',$id)->first();
        $data['price'] = $bank->price;
        $data['bank_name'] = $bank->name;
        // dd($bank);
    	//产品编号
        $data['pid'] = $id;
        //产品初始状态 2为未审核
        $data['status']= 2;
        unset($data['id']);

       $res = \DB::table('record')->insert($data);
       

       if ($res) {
       		echo 1;
       }else{
       		echo 0;
       }

    }
}
