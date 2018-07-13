@extends('common.admin')

@section('content')
   <blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
	<div class="page-content">
          <div class="content">
            <form action="/admin/nav" method="post" class="layui-form" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>导航名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="title" required="" lay-verify="title" placeholder="请输入导航名称"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>导航图片
                        <img src=""  alt="">
                    </label>
                    <input type="file" name="pic">
                </div>

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>导航连接
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="link" placeholder="请输入导航链接" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red">* 导航链接格式为http://www</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required|number" placeholder="请输入排列序号"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    {{csrf_field()}}
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button  class="layui-btn" lay-filter="add" lay-submit="" id="adadd">
                        添加
                    </button>
                </div>
            </form>
          </div>
        </div>
<script>
layui.use('form', function(){
  var form = layui.form;
  form.render();
});
layui.use('jquery', function(){
  var $ = jQuery = layui.$;

  $('#adadd').on('click',function(){
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