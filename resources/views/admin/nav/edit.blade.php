@extends('common.admin')
@section('content')

<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form action="/admin/nav/{{$res->id}}" method='post' class="mws-form" enctype="multipart/form-data">

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>导航名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="title" value="{{$res->title}}" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>导航图片
                        <img src=""  alt="">
                    </label>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>导航图片
                        <img src=""  alt="">
                    </label>
                    <input type="file" name="pic">
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>导航网址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="link" value="{{$res->link}}" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red">* 导航链接格式为http://www.baidu.com</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="sort" value="{{$res->sort}}" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                {{ csrf_field() }}

                {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="ad" lay-submit id="adedit">
                        修改
                    </button>
                </div>
            </form>
          </div>
        </div>
<script>
layui.use(['form','jquery','upload'], function(){
    var form = layui.form;
    form.render();
    var $ = jQuery = layui.$;
    $('#adedit').on('click',function(){
        var url = $('input[name=link]').val();
        var sort = $('input[name=sort]').val();
        var urlReg = /(http|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
        if(!urlReg.test(url)){
            layer.msg('查询网址格式不正确');
            return false;
        }
        var sortReg = /^\w{1,12}$/;
         if(!sortReg.test(sort)){
            layer.msg('排序格式不正确');
            return false;
        }
    });

});
</script>
@endsection