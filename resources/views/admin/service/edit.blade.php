@extends('common.admin')

@section('content')
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

<blockquote class="layui-elem-quote f18">{{$res->title}}{{$title}}</blockquote>
            <form class="layui-form" action="/admin/service/{{$res->id}}" enctype='multipart/form-data' method='post'>

                {{csrf_field()}}

                {{method_field('PUT')}}

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        协议标题
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="L_username" name="name" value="{{$res->title}}" class="layui-input" disabled>
                    </div>
                </div>
                <script>
                    var ue = UE.getEditor('editor');
                </script>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        协议内容
                    </label>
                    <div class="layui-input-block">
                        <script id="editor" name='content' type="text/plain" style="width:1000px;height:500px;">{!!$res->content!!}</script>
                    </div>
                </div>
                
            </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="save" lay-submit="">
                        修改
                    </button>
                </div>
            </form>

@endsection