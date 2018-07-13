@extends('common.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-conten lala">
          <div class="content">
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                         <th>
                            新闻分类
                        </th>
                        <th>
                            新闻标题
                        </th>
                        <th>
                            新闻封面
                        </th>
                        <th>
                            创建时间
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>

                </thead>
                @foreach($res as $k => $v)
                <tbody>
                    <tr>
                        <td >
                            {{$v->id}}
                        </td>
                        <td >
                            @if($v->sid==1)
                                分期
                            @elseif($v->sid==2)
                                股票
                            @elseif($v->sid==3)
                                贷款
                            @endif
                        </td>
                        <td style="overflow:hidden;">
                            {{$v->title}}
                        </td>
                        <th>
                            <img src="{{$v->pic}}" width="100px">
                        </th>
                        <th>
                           <?php
                              echo date('Y-m-d',$v->ctime);
                           ?>
                        </th>
                        <td>
                         <a href="/admin/article/{{$v->id}}/edit" class="layui-btn layui-btn-sm ">编辑</a>
                          <a href="javascript:void(0)" class="remove layui-btn layui-btn-sm layui-btn-danger" title="Remove this item" ids='{{$v->id}}'>删除</a>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
          </div>
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
               $.post('/admin/articledel',{id:id},function(data){
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