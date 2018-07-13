@extends('common.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="/admins/js/xadmin.js"></script>
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form class="layui-form xbs" action="/admin/user" method="get">
                <div class="layui-form-pane" style="text-align: center;">
                  <div class="layui-form-item" style="display: inline-block;">
                    <div class="layui-input-inline">
                      <input type="text" name="tel"  placeholder="手机号查询" value="{{$request->tel}}" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                      <input type="text" name="name"  placeholder="姓名查询" value="{{$request->name}}" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                  </div>
                </div> 
            </form>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            编号
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            会员ID
                        </th>
                        <th>
                            头像
                        </th>
                        <th>
                           手机号
                        </th>
                        <th>
                            身份证号码
                        </th>
                        <th>
                            第一级
                        </th>
                        <th>
                            第二级
                        </th>
                        <th>
                            第三级
                        </th>
                        <th>
                            用户级别
                        </th>
                        <th>
                            余额
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                @foreach($res as $res)
                <tbody>
                    <tr>
                        <td >
                            {{$res->id}}
                        </td>
                        <td>
                             <u style="cursor:pointer" onclick="member_show('{{$res->nick}}详情','/admin/user/{{$res->id}}','600','600')">
                            {{$res->name}}
                            </u>
                        </td>
                        <td >
                            {{$res->vid}}
                        </td>
                        <td >
                        <img src="{{$res->tpic}}" alt="">
                        </td>
                        <td >
                            {{$res->tel}}
                        </td>
                        <td >
                            {{$res->card}}
                        </td>
                        <td >
                            {{$res->lev1}}
                        </td>
                        <td >
                            {{$res->lev2}}
                        </td>
                        <td>
                            {{$res->lev3}}
                        </td>
                        <td>
                            用户级别
                        </td>
                        <td>
                            {{$res->money}}元
                        </td>
                    <td>
                        <a href="javascript:void(0)" class="remove layui-btn layui-btn-sm layui-btn-danger" title="Remove this item" ids='{{$res->id}}'>删除</a>
                    </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>

 @endsection

@section('js')
<script>

layui.use(['jquery','layer'], function(){
    var $ = jQuery = layui.$;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.remove').click(function(){
        var id = $(this).attr('ids');
        layer.confirm('确定要删除吗?',{icon:3,title:'删除提示'},function(index){
               $.post('/admin/userdel',{id:id},function(data){
                    if(data == '1'){
                        layer.msg('删除成功');
                        location.reload();
                    }else{
                        layer.msg('删除失败');
                    }
               })
        });
    })
})
</script>
@endsection
