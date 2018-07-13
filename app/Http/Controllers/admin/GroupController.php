<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Group;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = \DB::table('group')->get();
        return view('admin.group.index',['res'=>$res,'title'=>'用户组别列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.group.add',['title'=>'用户组别添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $res = $request->except('_token');
            try{
                $data = Group::create($res);
                if($data){
                    return redirect('/admin/group')->with('success','添加成功');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = Group::find($id);
        return view('admin.group.edit',['res'=>$res]);
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
        $res = Group::find($id);
        $res = $request->except('_token','_method');

        try{
            $data = Group::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/group')->with('success','修改成功');
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
        $res = Group::where('id',$id)->delete();
        if($res){
            return redirect('/admin/group')->with('success','删除成功');
        }
    }

    public function groupdel(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::table('group')->where('id',$id)->delete();

        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
