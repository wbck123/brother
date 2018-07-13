@extends('lyout.admin')
@section('content')
        <div class="page-content">
          <div class="content">
            <form action="/admin/fcategory/{{$res->id}}" method='post' class="mws-form">
                {{csrf_field()}}

                 {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        分类名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" value="{{$res->name}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        额度范围
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="range" required lay-verify="required" value="{{$res->range}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required|number" value="{{$res->sort}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       *数字越小排名越靠前
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
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
@endsection
@section('js')
@endsection