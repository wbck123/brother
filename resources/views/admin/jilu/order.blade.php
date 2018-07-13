@extends('common.admin')

@section('content')
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
                            用户姓名
                        </th>
                        <th>
                            手机号
                        </th>
                        <th>
                            身份证号
                        </th>
                        <th>
                            所属银行
                        </th>
                        <th>
                            返佣金额
                        </th>
                        <th>
                            时间
                        </th>
                        <th>
                            状态
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td >
                            1
                        </td>
                        <td >
                            1
                        </td>
                        <td>
                            1
                        </td>
                        <td >
                            1
                        </td>
                        <th>
                            1
                        </th>
                        <th>
                            1
                        </th>
                        <th>
                            1
                        </th>
                        <th>
                            1
                        </th>
                        <td class="td-manage">
                            <form action="/admin/artice/" method='post' style='display:inline'>
                                {{csrf_field()}}

                                {{method_field('DELETE')}}
                                <button class="layui-btn layui-btn-sm layui-btn-danger">删除</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
@endsection