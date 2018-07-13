<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = User::orderBy('id','asc')
        ->where(function($query) use($request){
            $tel = $request->input('tel');
            $name = $request->input('name');

            if(!empty($tel)){
                $query->where('tel','like','%'.$tel.'%');
            }

            if(!empty($name)){
               $query->where('name','like','%'.$name.'%'); 
            }
        })
        ->paginate(10);
        return view('admin.user.index',[
            'res'=>$user,
            'title'=>'用户列表',
            'request'=> $request
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $res = user::find($id);
         // var_dump($res);die;
      return view('admin.user.show',['title'=>'用户详情表','res'=>$res]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = User::where('id',$id)->delete();
        if($res){
            return redirect('/admin/user')->with('success','删除成功');
        }
    }

        public function userdel(Request $request)
    {
        $id = $request->input('id');
        $data = \DB::table('user')->where('id',$id)->delete();

        if($data){
            echo 1;
        } else {
            echo 0;
        }
    }
}
