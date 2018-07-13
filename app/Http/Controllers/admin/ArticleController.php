<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin\Article;
use App\Models\Admin\Newcategory;
use Config;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $res = DB::table('news_detail')->get();
        // dd($res);
        return view('admin.article.index',[
            'title'=>'新闻列表页',
            'res'=>$res
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = Newcategory::all();
     
        // dd($data);
        // dump($data);
        return view('admin.article.add',[
            'title'=>'新闻添加',
            'res'=>$data
        ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $res = $request->except('_token');

        $res['ctime'] = time();
        // dump($res);die;
        //头像
        if($request->hasFile('pic')){

            //设置名字
            $name = str_random(10).time();
            // dump($name);die;

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //移动
            $request->file('pic')->move('./uploads/',$name.'.'.$suffix);
        }

        // 存储数据
        $res['pic'] = config::get('app.path').$name.'.'.$suffix;
        $res['num'] = rand(1000,6000);
        try{
            $data = Article::create($res);
            if($data){
                return redirect('/admin/article')->with('success','添加成功');
            }
        }catch(\Exception $e){
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        // 获取列表数据
        $res = Article::find($id);
        $data = Newcategory::all();
        return view('admin.article.edit',[
            'title'=>'新闻内容修改',
            'res'=>$res,
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $res = Article::find($id);
        $res = $request->only('title','desc','content','pic','ctime','sid');
                //头像
        if($request->hasFile('pic')){

            //设置名字
            $name = str_random(10).time();
            // dump($name);die;

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            //移动
            $request->file('pic')->move('./uploads/',$name.'.'.$suffix);
        }

        // 存储数据
        $res['pic'] = config::get('app.path').$name.'.'.$suffix;
        try{
            $data = Article::where('id',$id)->update($res);
            if($data){
                return redirect('/admin/article')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Article::where('id',$id)->delete();

        if($res){

            return redirect('/admin/article')->with('success','删除成功');
        }
 
    }
    
    public function articledel(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('news_detail')->where('id',$id)->delete();
        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
