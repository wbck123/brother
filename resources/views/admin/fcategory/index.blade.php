@extends('common.admin')
@section('content')
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <xblock><button class="layui-btn" onclick="member_add('添加用户','/admin/fcategory/create','600','500')"><i class="layui-icon">&#xe608;</i>添加分类</button></xblock>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            分类名称
                        </th>
                        <th>
                            额度范围
                        </th>
                        <th>
                            排序
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
                            {{$res->name}}
                        </td>
                        <td >
                            {{$res->range}}
                        </td>
                        <td >
                            {{$res->sort}}
                        </td>
                    <td>
                      <button class="layui-btn layui-btn-sm" onclick="member_edit('编辑','/admin/fcategory/{{$res->id}}/edit','4','','510')">编辑</button>

                        <form action="/admin/fcategory/{{$res->id}}" method='post' style='display:inline'>
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
<!-- 右侧主体结束 -->
 @endsection

@section('js')
<script>
   /*用户-添加*/
    function member_add(title,url,w,h)
    {
        x_admin_show(title,url,w,h);
    }
    /*用户-编辑*/
  function member_edit (title,url,id,w,h) 
  {
     x_admin_show(title,url,w,h); 
  }
</script>
@endsection