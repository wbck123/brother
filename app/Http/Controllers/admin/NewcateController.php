<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Newcategory;
use DB;

class NewcateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 从数据库获取数据并显示到页面
        $res = DB::table('news_category')->get();

        return view('admin.newcate.index',[
            'title'=>'分类列表',
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

        return view('admin.newcate.add',['title'=>'分类添加页面']);
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
        // 去除不需要的数据
        $res = $request->except('_token');

        // 通过模型将数据添加到数据库
        $data = Newcategory::create($res);

        // 如果成功跳转到分类页面
        if($data){

            return redirect('/admin/newcate')->with('success','添加成功');
        } else {

            return back()->with('error','添加失败');
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
        $res = Newcategory::find($id);
        return view('admin.newcate.edit',[
            'title'=>'修改页面',
            'res'=>$res
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
        // 获取id
        $res = Newcategory::find($id);

        // 获取内容
        $res = $request->only('name');

        try{

            $data = Newcategory::where('id',$id)->update($res);

            if($data){

                return redirect('/admin/newcate')->with('info','添加成功');
            }
        } catch (\Exception $e) {

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
        // 获取要删除的id
        $res = Newcategory::where('id',$id)->delete();

        if($res){

            return redirect('/admin/newcate')->with('success','删除成功');
        }
 
        
    }

    public function newcatedel(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('news_category')->where('id',$id)->delete();
        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
