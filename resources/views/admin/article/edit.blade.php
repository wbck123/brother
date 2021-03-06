@extends('common.admin')
@section('content')
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

    <blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form action="/admin/article/{{$res->id}}" method='post' class="mws-form" enctype='multipart/form-data'>
                {{ csrf_field() }}

                {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        新闻分类
                    </label>
                   
                    <div class="layui-input-inline">
                        <select type="text" id="L_email" name="cid" required lay-verify="name"
                        autocomplete="off" class="layui-input">
                            @foreach($data as $k =>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label for="L_email" class="layui-form-label">
                        新闻标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="title" required lay-verify="name"
                        autocomplete="off" class="layui-input" style="width:690px" value="{{$res->title}}">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">新闻简介</label>
                    <div class="layui-input-inline">
                        <textarea placeholder="请输入内容" class="layui-textarea" name="desc" style="width:1000px">{{$res->desc}}</textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        新闻封面
                    </label>
                    <div class="layui-input-inline">
                        <input type="file" name="pic" class="btn btn-default" src="{{$res->pic}}">
                    </div>
                </div>
                <script>
                    var ue = UE.getEditor('editor');
                </script>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        新闻内容
                    </label>
                    <div class="layui-input-inline">
                        <script id="editor" name='content' type="text/plain" style="width:1000px;height:500px;">{!!$res->content!!}</script>
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