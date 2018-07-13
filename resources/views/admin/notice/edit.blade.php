@extends('common.admin')
@section('content')
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
            <form action="/admin/notice/{{$res->id}}" method='post' class="mws-form">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        公告标题
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="title" required lay-verify="name" value="{{$res->title}}" 
                        autocomplete="off" class="layui-input" style="width: 600px">
                    </div>
                </div>
                  <script>
                    var ue = UE.getEditor('editor');
                </script>
                 <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        公告内容
                    </label>
                    <div class="layui-input-block">
                        <script id="editor" name='content' type="text/plain" style="width:1000px;height:500px;"> {!!$res->content!!}</script>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required" value="{{$res->sort}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       *数字越小排名越靠前
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    
                {{ csrf_field() }}
                {{method_field('PUT')}}
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="noticeedit">
                        修改
                    </button>
                </div>
            </form>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
<script>
layui.use('form', function(){
  var form = layui.form;
  form.render();
}); 
layui.use(['jquery'], function(){
  var $ = jQuery = layui.$;
  
  $('#noticeedit').on('click',function(){

    var sort = $('input[name=sort]').val();

       var sortReg = /^\w{1,12}$/;
      if(!sortReg.test(sort)){
        layer.msg('排序格式不正确');
        return false;
      }
});  

});  
</script>
@endsection