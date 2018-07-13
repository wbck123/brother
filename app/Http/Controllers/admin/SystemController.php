<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    
    public function index()
    {
        return view('admin.system.index',['title'=>'网站设置']);
    }

    public function store(Request $request)
    {
        //接收数据
        $arr = $request->except('_token');

        $str1 = var_export($arr,true);

        $str = "<?php
return ".$str1." ?>";

        file_put_contents('../config/web.php', $str);
        
        return back();
        
    }

    
}
