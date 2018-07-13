<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserController extends Controller
{
	//用户中心页面
	public function user(Request $request)
	{
        $id = $request->session()->get('id');
		$help = DB::table('service')->where('id',6)->first();
		$users = DB::table('user')->where('nick', '老梁')->first();
		// dd($help);die;
		return view('home.user.index',['help'=>$help,'users'=>$users,'id'=>$id]);
	}
	//常见问题
	public function ques()
    {
    	$ques =  DB::table('service')->where('id','5')->first();
    	return view('home.user.ques',['ques'=>$ques]);
    }
    //新手指南
	public function guide()
    {
    	$guide =  DB::table('service')->where('id','2')->first();
    	return view('home.user.guide',['guide'=>$guide]);
    }

    //系统公告
	public function notice()
    {
    	$notice =  DB::table('notice')->get();
    	return view('home.user.notice',['notice'=>$notice]);
    }

    //我的资料
	public function person()
    {
    	$person =  DB::table('user')->where('id',19)->first();
    	return view('home.user.person',['person'=>$person]);
    }

    //在线客服
    public function kefu()
    {
        $kefu =  DB::table('service')->where('id',7)->first();
        return view('home.user.kefu',['kefu'=>$kefu]);
    }
    public function caips()
    {
        $caips =  DB::table('banks')->get();

        return view('home.user.caips',['caips'=>$caips]);
    }
    //在线手册
    public function book()
    {
        $book =  DB::table('service')->where('id',4)->first();

        return view('home.user.book',['book'=>$book]);
    }

    //我的团队
public function team(Request $request,$id)
    {
        $ids = $request->session()->get('id');

        $data = DB::table('user')->get();

        $lev1 = DB::table('user')->where('lev1',$ids)->get();

        $total = DB::table('user')->where('lev1',$ids)->count();
        $lev2 = DB::table('user')->where('lev2',$ids)->get();
        $total2 = DB::table('user')->where('lev2',$ids)->count();
        $lev3 = DB::table('user')->where('lev3',$ids)->get();
        $total3 = DB::table('user')->where('lev3',$ids)->count();


        return view('home.user.team',[
            'lev1'=>$lev1,
            'lev2'=>$lev2,
            'lev3'=>$lev3,
            'total'=>$total,
            'total2'=>$total2,
            'total3'=>$total3,
            'id'=>$id
        ]);
    }

    //我的账户
    public function account(Request $request)
    {
        $id = $request->session()->get('id');

        $data = DB::table('user')->get();

        $account =  DB::table('user')->where('id',$id)->first();
        $dai = DB::table('cash')->where('status',1)->get();
        //待支付
        $daizhifu =0;
        foreach ($dai as $key => $value) {
            $daizhifu +=$value->money;
        }
        //已支付
        $yizhifu = 0;
        $yi = DB::table('cash')->where('status',0)->get();
        foreach ($yi as $key => $value) {
            $yizhifu +=$value->money;
        }
        //总收益
        $zong = $daizhifu + $yizhifu;
        return view('home.user.account',[
            'account'=>$account,
            'yizhifu'=>$yizhifu,
            'daizhifu'=>$daizhifu,
            'zong'=>$zong,
        ]);
    }


    //申请提现
    public function cash()
    {
        $cash =  DB::table('service')->where('id',4)->first();

        return view('home.user.cash',['cash'=>$cash]);
    }


    //提现记录
    public function cashrecord(Request $request,$ids)
    {
        $id = $request->session()->get('id');
        $shenhe = DB::table('cash')->where('uid',$id)->where('status',0)->get();
        $weishenhe = DB::table('cash')->where('uid',$id)->where('status',0)->get();
        $weitongguo = DB::table('cash')->where('uid',$id)->where('status',0)->get();

        return view('home.user.cashrecord',[
            'shenhe'=>$shenhe,
            'weishenhe'=>$weishenhe,
            'weitongguo'=>$weitongguo,
            'ids'=>$ids
        ]);
    }

    public function qrcode(Request $request,$ids)
    {
        $id = $request->session()->get('id');
        return view('home.user.qrcode',['id'=>$id]);
    }


    public function level()
    {
       $xieyi = DB::table('service')->where('id',1)->first();
        return view('home.user.level',['xieyi'=>$xieyi]);
    }

    //会员中心保存资料
    public function baocunziliao(Request $request)
    {
        
        $data = $request->all();
        $id =$data['id'];

        if($data['pass'] == null){
            unset($data['pass']);
        }
        // dd($data);
        $res = DB::table('user')->where('id',$id)->update($data);

        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
