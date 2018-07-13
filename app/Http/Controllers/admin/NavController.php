<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Nav;
use Config;

class NavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $res = Nav::all();
        return view('admin.nav.index',['res'=>$res,'title'=>'导航分类']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.nav.add',['title'=>'导航添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->all());

        $res = $request->except(['_token','pic']);
        // dd($request->hasFile('pic'));

        // 广告图片
        if($request->hasFile('pic')){
            // 设置名字
            $name = str_random(10).time();

            // 获取后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();

            // 移动
            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

        }

        // 存入数据表
        $res['pic'] = Config::get('app.path').$name.'.'.$suffix;
        // var_dump($res);die;

        //模型
        $data = Nav::create($res);
// dd($data);
        if($data){

            return redirect('/admin/nav')->with('info','添加成功');

        } else {

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
         $res = Nav::find($id);
        // dump($res);die;
        return view('admin.nav.edit',['title'=>'广告修改','res'=>$res]);
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
        $res = $request->except(['_token','_method','pic']);

        if($request->hasFile('pic')){
            // 设置名字
            $name = str_random(10).time();

            // 获取后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();

            // 移动
            $request->file('pic')->move('./uploads',$name.'.'.$suffix);

        }


        // 存入数据表
        $res['pic'] = Config::get('app.path').$name.'.'.$suffix;
        // dump($res);
        try{
            $data = Nav::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/nav')->with('success','修改成功');
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
        $res = Nav::where('id',$id)->delete();
        if($res){
            return redirect('/admin/nav')->with('success','删除成功');
        }
    }

    public function navdel(Request $request)
    {

       $id = $request->input('id');
        $data = \DB::table('nav')->where('id',$id)->delete();
        // dd($data);
        if($data){
            echo 1;
        } else {
            echo 0;
        }

    }
}
