<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Ad;
use Config;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Ad::all();
        return view('admin.ad.index',['res'=>$res,'title'=>'广告页面']);
    }

    /**
     * Show the form for creating a new resource.
     *添加视图
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ad.add',['title'=>'广告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *处理添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dump($request->all());
        // echo 123;
        $res = $request->except(['_token','pic']);


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
        $res['pic']=Config::get('app.path').$name.'.'.$suffix;
        // var_dump($res);die;

        //模型
        $data = Ad::create($res);

        if($data){

            return redirect('/admin/ad')->with('info','添加成功');

        } else {

            return back();
        }


    }

    /**
     * Display the specified resource.
     *详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *修改视图
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = Ad::find($id);
        // dump($res);die;
        return view('admin.ad.edit',['title'=>'广告修改','res'=>$res]);
        // echo 12;
    }



    /**
     * Update the specified resource in storage.
     *处理修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foo = Ad::find($id);
        // $urls = $foo->pic;
        // dd($url);

        // $info = unlink('.'.$urls);

        // if(!$info) return;


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
            $data = Ad::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/ad')->with('success','修改成功');
            }
        }catch(\Exception $e){
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Ad::where('id',$id)->delete();
        if($res){
            return redirect('/admin/ad')->with('success','删除成功');
        }
    }
}
