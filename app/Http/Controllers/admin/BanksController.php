<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Banks;
use Config;
use DB;
class BanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = \DB::table('banks')->get();
        return view('admin.bank.index',['res'=>$res,'title'=>'银行列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bank.add',['title'=>'银行添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $res = $request->except(['_token']);

        if($request->hasFile('bpic')){
            $name = str_random(10).time();
            $suffix = $request->file('bpic')->getClientOriginalExtension();
            $request->file('bpic')->move('./uploads/',$name.'.'.$suffix);

        }

        $res['bpic'] = Config::get('app.path').$name.'.'.$suffix;
        // dd($res['bpic']);
        $res['num'] = rand(1000,9999);
        //模型   出错
        // dd($res['num']);
        try{
            $data = Banks::create($res);

            if($data){
                return redirect('/admin/bank')->with('success','添加成功');
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
         $res = Banks::find($id);
        return view('admin.bank.edit',['res'=>$res,'title'=>'银行编辑']);
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
       $res = Banks::find($id);
       // dd($res);
        $res = $request->only('name','price','burl','sort','rate','ency','per');


        if($request->hasFile('bpic')){
            $name = str_random(10).time();
            $suffix = $request->file('bpic')->getClientOriginalExtension();
            $request->file('bpic')->move('./uploads/',$name.'.'.$suffix);

        }

        $res['bpic'] = Config::get('app.path').$name.'.'.$suffix;

                try{
                    $data = Banks::where('id',$id)->update($res);

                    if($data){
                        return redirect('/admin/bank')->with('success','修改成功');
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
        $res = Banks::where('id',$id)->delete();
        if($res){
            return redirect('/admin/bank')->with('success','删除成功');
        }
    }

    public function bankdel(Request $request)
    {

       $id = $request->input('id');
        $data = DB::table('banks')->where('id',$id)->delete();
        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
