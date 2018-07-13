@extends('common.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
<div class="table-responsive">
    <table class="layui-table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>手机号码</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        </thead>
        @foreach($res as $res)
        <tbody id="con">
        <tr>
            <td>{{$res->id}}</td>
            <td>{{$res->name}}</td>
            <td>{{$res->tel}}</td>
            <td>{{date('Y-m-d',$res->ctime)}}</td>
            <td>
              @if ($res->status == 0)
               <button class="layui-btn layui-btn-sm" id="status">已启用</button>
              @else
              <button class="layui-btn layui-btn-sm layui-btn-danger" id="status">已禁用</button>
              @endif
            </td>
            <td>
                <a href="/admin/auth/{{$res->id}}/edit" class="layui-btn layui-btn-sm ">编辑</a>
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
               $.post('/admin/authdel',{id:id},function(data){
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

