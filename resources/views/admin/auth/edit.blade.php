@extends('common.admin')
@section('content')
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
<form class="layui-form" action="/admin/auth/{{$res->id}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}
  <div class="layui-form-item">
    <label class="layui-form-label">姓名</label>
    <div class="layui-input-inline">
      <input type="text" name="name" value="{{$res->name}}" autocomplete="off" class="layui-input">
    </div>
  </div>

    <div class="layui-form-item">
    <label class="layui-form-label">手机号码</label>
    <div class="layui-input-inline">
      <input type="text" name="tel" value="{{$res->tel}}" autocomplete="off" class="layui-input" lay-verify="required|phone">
    </div>
  </div>

  <div class="layui-form-item" pane="">
    <label class="layui-form-label">单选框</label>
    <div class="layui-input-block">
      <input type="radio" name="status" value="0" title="启用" @if($res->status == '0') checked='checked' @endif>
      <input type="radio" name="status" value="1" title="禁止"@if($res->status == '1') checked='checked' @endif>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formDemo" id="authedit">修改</button>
    </div>
  </div>
</form>
<script>
  layui.use('form', function(){
  var form = layui.form;
  form.render();
});  

layui.use(['jquery'], function(){
  var $ = jQuery = layui.$;
  
  $('#authedit').on('click',function(){
    var tel = $('input[name=tel]').val();
    var name = $('input[name=name]').val();
    var pwd = $('input[name=pwd]').val();

    var phoneReg = /^1[3456789]\d{9}$/; 
      if(!phoneReg.test(tel)){
        layer.msg('请输入有效的手机号码');
        return false;
      }

      var nameReg = /^[\u4E00-\u9FA5]+$/;
      if(!nameReg.test(name)){
        layer.msg('只能输入中文姓名');
        return false;
      }
});  

});  
</script>
@endsection
