@extends('common.admin')

@section('content')
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>

<form id="form1" class="layui-form" action="/admin/system" method="post">
  {{ csrf_field() }}
  <div class="layui-form-item">
    <label class="layui-form-label">网站标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入网站标题" value="{{config('web.title')}}" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">网站关键字</label>
    <div class="layui-input-block">
      <input type="text" name="keywords" lay-verify="required" autocomplete="off" class="layui-input" value="{{config('web.keywords')}}" placeholder="请输入网站关键词">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">网站描述</label>
    <div class="layui-input-block">
      <input type="text" name="desc" lay-verify="required" value="{{config('web.desc')}}" autocomplete="off" class="layui-input" placeholder="请输入网站描述">
    </div>
  </div>

      <div class="layui-form-item">
      <div class="layui-inline">
        <label class="layui-form-label">提现金额</label>
        <div class="layui-input-inline">
          <input type="tel" name="cashmax" lay-verify="required|number" autocomplete="off" class="layui-input" value="{{config('web.cashmax')}}" placeholder="请输入提现金额">
        </div>
      </div>

      <div class="layui-inline">
        <label class="layui-form-label">短信账户</label>
        <div class="layui-input-inline">
          <input type="tel" name="account" autocomplete="off" class="layui-input" value="{{config('web.account')}}" placeholder="请输入短信账户">
        </div>
      </div>

      <div class="layui-inline">
        <label class="layui-form-label">短信密码</label>
        <div class="layui-input-inline">
          <input type="text" name="info_pass" autocomplete="off" class="layui-input" value="{{config('web.info_pass')}}"  placeholder="请输入短信密码">
        </div>
      </div>
  </div>


    <div class="layui-form-item">
      <div class="layui-inline">
        <label class="layui-form-label">微信公众号</label>
        <div class="layui-input-inline">
          <input type="tel" name="weixin" autocomplete="off" class="layui-input" value="{{config('web.weixin')}}" placeholder="请输入微信公众号">
        </div>
      </div>

      <div class="layui-inline">
        <label class="layui-form-label">联系电话</label>
        <div class="layui-input-inline">
          <input type="tel" name="tel" lay-verify="phone" autocomplete="off" class="layui-input" value="{{config('web.tel')}}" placeholder="请输入电话号码">
        </div>
      </div>

      <div class="layui-inline">
        <label class="layui-form-label">备案编号</label>
        <div class="layui-input-inline">
          <input type="text" name="icp" autocomplete="off" class="layui-input" value="{{config('web.icp')}}" placeholder="请输入备案号">
        </div>
      </div>
  </div>
  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">统计代码</label>
    <div class="layui-input-block">
      <textarea name="tongji" class="layui-textarea w515">{{config('web.tongji')}}</textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <button class="layui-btn" lay-submit="" lay-filter="demo2">保存信息</button>
  </div>
</form>

@endsection
@section('js')
<script>
layui.use(['jquery','layer'], function(){
    var $ = jQuery = layui.$;

    })
</script>
@endsection