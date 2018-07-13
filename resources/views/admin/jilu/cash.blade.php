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
                            记录ID
                        </th>
                        <th>
                            提现金额
                        </th>
                        <th>
                            真实姓名
                        </th>
                        <th>
                            支付宝
                        </th>
                        <th>
                            状态
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
                    @foreach($res as $k=>$v)
                    <tr>
                        <td >
                            {{$v->id}}
                        </td>
                        <td >
                            {{$v->money}}元
                        </td>
                        <td>
                            {{$v->name}}
                        </td>
                        <td >
                            {{$v->alipay}}
                        </td>
                        <th>
                            @if ($v->status == 0)
                           <button class="layui-btn layui-btn-sm" id="status">已打款</button>
                          @elseif($v->status == 1)
                          <button class="layui-btn layui-btn-sm layui-btn-danger" id="status">未打款</button>
                          @elseif($v->status == 2)
                          <button class="layui-btn layui-btn-sm layui-btn-danger" id="status">未通过</button>
                          @endif
                        </th>
                        <th>
                            {!!date('Y-m-d,H:i:s',$v->ctime)!!}
                        </th>
                        @if ($v->status == 0)
                        <td>已打款</td>
                        @elseif ($v->status == 1)
                        <td class="td-manage">
                            <a href="javascript:void(0)" class="layui-btn layui-btn-sm " id="dakuan" ids="{{$v->id}}">打款</a>

                           <a href="javascript:void(0)" class="remove layui-btn layui-btn-sm layui-btn-danger" title="Remove this item" id="wei" ids='{{$v->id}}'>未通过</a>
                         </td>

                         @elseif($v->status == 2)
                         <td>未通过</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
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

    //打款
    $('#dakuan').click(function(){
        var id = $(this).attr('ids');
        layer.confirm('确定要打款吗?',{icon:3,title:'打款提示'},function(index){
               $.post('/admin/dakuan',{id:id},function(data){
                    if(data == '1'){
                        layer.msg('打款成功');
                        location.reload();
                    }else{
                        layer.msg('打款失败');
                    }
               })
        });
    });

    //未打款
    $('#wei').click(function(){
        var id = $(this).attr('ids');
               $.post('/admin/wei',{id:id},function(data){
                    if(data == '1'){
                        location.reload();
                    }
        });
    })
});
</script>
@endsection