@extends('common.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="page-content">
 <div class="content">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            姓名
                        </th>
                        <th>
                            手机号
                        </th>
                        <th>
                            身份证号
                        </th>
                        <th>
                            申请项目
                        </th>
                        <th>
                            申请类目
                        </th>
                        <th>
                            价格
                        </th>
                        <th>
                            创建时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($res as $res)
                    <tr>
                        <td >
                           {{$res->id}}
                        </td>
                        <td >
                            {{$res->name}}
                        </td>
                        <td  id="tel">
                            {{$res->tel}}
                        </td>
                        <td >
                             {{$res->card}}
                        </td>
                        <th>
                            {{$res->bank_name}}
                        </th>
                        <th>
                            @if($res->cid == 1)
                            信用卡
                            @else
                                网贷
                            @endif
                        </th>
                        <th>
                            {{$res->price}}元
                        </th>
                        <th>
                             {!!date('Y-m-d H:i:s',$res->ctime)!!}
                        </th>
                        @if($res->status ==0)
                        <td><button class="layui-btn layui-btn-sm layui-btn-success">已审核</button></td>
                        @elseif($res->status ==1)
                        <td><button class="layui-btn layui-btn-sm layui-btn-danger">未通过</button></td>
                        @else
                            <td>
                           <a href="javascript:void(0)" class="shenhe layui-btn layui-btn-sm layui-btn-success" title="Remove this item" ids='{{$res->id}}'>审核</a>
                           <a href="javascript:void(0)" class="weitongguo layui-btn layui-btn-sm layui-btn-success" title="Remove this item" idss='{{$res->id}}'>未通过</a>
                           <a href="javascript:void(0)" class="remove layui-btn layui-btn-sm layui-btn-danger" title="Remove this item" ids='{{$res->id}}'>删除</a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>
<script>
    layui.use(['jquery','layer'], function(){
  var $ = jQuery = layui.$;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.shenhe').on('click',function(){
        var ids = $(this).attr('ids');
        layer.confirm('确定要审核吗?',{icon:3,title:'审核提示'},function(index){
               $.post('/admin/jilushenhe',{id:ids},function(data){
                    if(data == '1'){
                        layer.msg('审核成功');
                        location.reload();
                    }else{
                        layer.msg('审核失败');
                    }
               });
        });
    });

    //删除
    $('.remove').on('click',function(){
        var id = $(this).attr('ids');
        layer.confirm('确定要删除吗?',{icon:3,title:'删除提示'},function(index){
               $.post('/admin/jiludel',{id:id},function(data){
                    if(data == '1'){
                        layer.msg('删除成功');
                        location.reload();
                    }else{
                        layer.msg('删除失败');
                    }
               })
    })

    }); 


        //未通过
    $('.weitongguo').on('click',function(){
        var id = $(this).attr('idss');
        layer.confirm('更改为未通过?',{icon:3,title:'更新提示'},function(index){
               $.post('/admin/weitongguo',{id:id},function(data){
                    if(data == '1'){
                        layer.msg('更新成功');
                        location.reload();
                    }else{
                        layer.msg('更新失败');
                    }
               })
    })

    }); 
}); 
</script>
@endsection