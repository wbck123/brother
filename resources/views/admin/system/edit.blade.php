@extends('common.admin')

@section('content')
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>

  <div class="layui-form-item">
    <label class="layui-form-label">网站标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" lay-verify="required" autocomplete="off" value="{{$res->name}}" class="layui-input">
    </div>
  </div>
  <div class="layui-form-item">
    <label class="layui-form-label">网站关键字</label>
    <div class="layui-input-block">
      <input type="text" name="username" lay-verify="required" value="{{$res->key}}" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">网站描述</label>
    <div class="layui-input-block">
      <input type="text" name="username" lay-verify="required" value="{{$res->desc}}" autocomplete="off" class="layui-input">
    </div>
  </div>
 

    <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">微信公众号</label>
      <div class="layui-input-inline">
        <input type="tel" name="phone" autocomplete="off" class="layui-input">
      </div>
    </div>

    <div class="layui-inline">
      <label class="layui-form-label">联系电话</label>
      <div class="layui-input-inline">
        <input type="tel" name="phone" lay-verify="phone" autocomplete="off" class="layui-input">
      </div>
    </div>

    <div class="layui-inline">
      <label class="layui-form-label">备案编号</label>
      <div class="layui-input-inline">
        <input type="text" name="email" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>
  
  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">统计代码</label>
    <div class="layui-input-block">
      <textarea placeholder="请输入内容" class="layui-textarea w515"></textarea>
    </div>
  </div>
  
  <div class="layui-form-item">
    <button class="layui-btn sysadd" lay-submit="" lay-filter="demo2">保存信息</button>
  </div>

@endsection
