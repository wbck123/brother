@extends('common.admin')

@section('content')

        <div class="page-content">
          <div class="content">
   <blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>名称</th>
                        <th>图片</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
@foreach($res as $k=>$v)
                    <tr>
                        <td >{{$v->id}}</td>
                        <td >{{$v->title}}</td>
                        <td ><img src="{{$v->pic}}" style="height: 50px"></td>
                        <td >{{$v->sort}}</td>

                    <td>
                      <a href="/admin/ad/{{$v->id}}/edit" class="layui-btn layui-btn-sm ">编辑</a>

                  <form action="/admin/ad/{{$v->id}}" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button class="layui-btn layui-btn-sm layui-btn-danger">删除</button>
                            </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
          </div>
        </div>
@endsection