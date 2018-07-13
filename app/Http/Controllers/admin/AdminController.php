<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = \DB::table('admin')->get();
        return view('admin.auth.index',['res'=>$res,'title'=>'管理员列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auth.add',['title'=>'管理员添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'pwd' => 'required|regex:/^\S{6,12}$/',
            'repwd'=>'same:pwd',
            'tel'=>'required|regex:/^1[3456789]\d{9}$/',            
        ],[
            'pwd.required'=>'密码不能为空',
            'pwd.regex'=>'密码格式不正确',
            'repwd.same'=>'两次密码不一致',
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号格式不正确'

        ]);
        $res = $request->except('_token','repwd');
        $res['pwd'] = Hash::make($request->input('pwd'));
        $res['ctime'] = time();
            try{
                $data = Admin::create($res);
                if($data){
                    return redirect('/admin/auth')->with('success','添加成功');
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
        $res = Admin::find($id);
        return view('admin.auth.edit',['res'=>$res,'title'=>'管理员用户编辑']);
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
        $res = Admin::find($id);
        $res = $request->only('name','tel','status');
        try{
            $data = Admin::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/auth')->with('success','修改成功');
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

        $res = Admin::where('id',$id)->delete();
        if($res){
            return redirect('/admin/auth')->with('success','删除成功');
        }
    }

    public function authdel(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::table('admin')->where('id',$id)->delete();

        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
