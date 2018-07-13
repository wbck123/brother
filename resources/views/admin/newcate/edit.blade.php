@extends('common.admin')
@section('content')
        <div class="page-content">
          <div class="content">
            <form action="/admin/newcate/{{$res->id}}" method='post' class="mws-form">
                {{ csrf_field() }}

                {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_name" class="layui-form-label">
                        分类名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_name" name="name" required lay-verify="name"
                        autocomplete="off" class="layui-input" value="{{$res->name}}">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit>
                        修改
                    </button>
                </div>
            </form>
          </div>
        </div>
@endsection
@section('js')
@endsection