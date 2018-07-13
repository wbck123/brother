@extends('common.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>银行名称</th>
                        <th>返佣价格</th>
                        <th>银行图片</th>
                        <th>成功率</th>
                        <th>币种</th>
                        <th>免息期</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                </thead>
                @foreach ($res as $res)
                <tbody>
                    <tr>
                        <td>{{$res->id}}</td>
                        <td>{{$res->name}}</td>
                        <td>{{$res->price}}</td>
                        <td><img src="{{$res->bpic}}" alt="" width="40px"></td>
                        <td>{{$res->rate}}%</td>
                        <td>{{$res->ency}}</td>
                        <td>{{$res->per}}天</td>
                        <td>{{$res->sort}}</td>
                    <td>
                       <a href="/admin/bank/{{$res->id}}/edit" class="layui-btn layui-btn-sm ">编辑</a>
                       <a href="javascript:void(0)" class="remove layui-btn layui-btn-sm layui-btn-danger" title="Remove this item" ids='{{$res->id}}'>删除</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
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
               $.post('/admin/bankdel',{id:id},function(data){
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