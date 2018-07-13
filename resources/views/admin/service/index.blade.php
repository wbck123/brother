@extends('common.admin')
@section('content')
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            记录ID
                        </th>
                        <th>
                            协议标题
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                </thead>
                @foreach ($res as $res)
                <tbody>
                    <tr>
                        <td>
                            {{$res->id}}
                        </td>
                        <td>
                            {{$res->title}}
                        </td>
                    <td>
                         <a href="/admin/service/{{$res->id}}/edit" class="layui-btn layui-btn-sm ">修改</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
<!-- 右侧主体结束 -->
 @endsection
