<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
class IndexController extends Controller
{
	//首页展示
    public function index()
    {
        $notice =  \DB::table('notice')->get();
        $ads = \DB::table('ad')->get();
        $nav = \DB::table('nav')->orderBy('id','desc')->get();
        $news1 = \DB::table('news_detail')->where('sid',1)->get();
        $news2 = \DB::table('news_detail')->where('sid',2)->get();
        $news3 = \DB::table('news_detail')->where('sid',3)->get();
        // dd($notice);
    	return view('home.index.index',[
            'notice'=>$notice,
            'news1'=>$news1,
            'news2'=>$news2,
            'news3'=>$news3,
            'ads' =>$ads,
            'nav'=>$nav,
        ]);
    }


    public function news($id)
    {
        
        $res = \DB::table('news_detail')->where('id',$id)->first();


        return view('home.index.news',['res'=>$res]);

        
    }
    public function session()
    {
    	$res = \DB::table('user')->where('id',19)->first();

    	session(['id'=>$res->id]);
    	
    }


    public function article($id)
    {
        $news = \DB::table('news_detail')->where('sid',$id)->get();

        $notice =  \DB::table('notice')->get();
        return view('home.article.index',[
                'news'=>$news,
                'notice'=>$notice,
                'id'=>$id,
        ]);
    }
}
