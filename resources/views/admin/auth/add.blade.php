@extends('common.admin')
@section('content')

<div class="page-content">
    <div class="content">
    <blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
            <form action="/admin/auth" method='post' class="mws-form">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        姓名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" placeholder="请输入管理员姓名"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        手机号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="tel" name="tel" required lay-verify="required|phone" placeholder="请输管理员登录手机号"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_username" name="pwd" required lay-verify="required" placeholder="请输入登录密码"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       *请填写6-12为密码
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        重复密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_username" name="repwd" required lay-verify="required" placeholder="请重复输入登录密码"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       *请重复填写6-12为密码
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="authadd">
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
layui.use(['jquery'], function(){
  var $ = jQuery = layui.$;
  
  $('#authadd').on('click',function(){
    var tel = $('input[name=tel]').val();
    var name = $('input[name=name]').val();
    var pwd = $('input[name=pwd]').val();

      var nameReg = /^[\u4E00-\u9FA5]+$/;
      if(!nameReg.test(name)){
        layer.msg('只能输入中文姓名');
        return false;
      }

    var phoneReg = /^1[3456789]\d{9}$/; 
      if(!phoneReg.test(tel)){
        layer.msg('请输入有效的手机号码');
        return false;
      }

       var pwdReg = /^\w{6,12}$/;
      if(!pwdReg.test(pwd)){
        layer.msg('请检查密码,密码位数为6-12位');
        return false;
      }
});  

});  
</script>
@endsection

