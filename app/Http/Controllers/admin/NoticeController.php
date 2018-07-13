<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = \DB::table('notice')->get();
        return view('admin.notice.index',['res'=>$res,'title'=>'公告列表']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.add',['title'=>'公告编辑']);
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
         $res['ntime'] = time();
            try{
                $data = Notice::create($res);
                if($data){
                    return redirect('/admin/notice')->with('success','添加成功');
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
        $res = Notice::find($id);
        return view('admin.notice.edit',['res'=>$res,'title'=>'公告编辑']);
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
        $res = Notice::find($id);
        $res = $request->except('_token','_method');

        try{
            $data = Notice::where('id',$id)->update($res);

            if($data){
                return redirect('/admin/notice')->with('success','修改成功');
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
        $res = Notice::where('id',$id)->delete();
        if($res){
            return redirect('/admin/notice')->with('success','删除成功');
        }
    }

    public function noticedel(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::table('notice')->where('id',$id)->delete();

        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
