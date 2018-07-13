<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>{{config('web.title')}}</title>
  <link rel="stylesheet" href="/admins/layui/css/layui.css">
  <link rel="stylesheet" href="/admins/css/style.css">
    <script src="/admins/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo" style="color: #FFF;font-size: 20px">金融行业后台管理系统</div>
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="/" >网站首页</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">记录管理</a>
        <dl class="layui-nav-child">
          <dd><a href="/admin/banka">办卡记录</a></dd>
          <dd><a href="/admin/order">订单记录</a></dd>
          <dd><a href="/admin/cash">提现记录</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          {{session('name')}}
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="/admin/logout">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item">
          <a class="" href="javascript:;"><i class="layui-icon">&#xe614;</i><cite>&nbsp;权限管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/auth/create"><i class="layui-icon">&#xe623;</i>管理员添加</a></dd>
            <dd><a href="/admin/auth/"><i class="layui-icon">&#xe623;</i>管理员列表</a></dd>
          </dl>
        </li>
      <li class="layui-nav-item">
          <a class="" href="javascript:;"><i class="layui-icon">&#xe614;</i><cite>&nbsp;导航管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/nav/create"><i class="layui-icon">&#xe623;</i>导航添加</a></dd>
            <dd><a href="/admin/nav/"><i class="layui-icon">&#xe623;</i>导航列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item"><a href="/admin/user"><i class="layui-icon">&#xe613;</i><cite>&nbsp;用户管理</cite></a></li>
        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe735;</i><cite>&nbsp;用户级别</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/group/create"><i class="layui-icon">&#xe623;</i>用户级别添加</a></dd>
            <dd><a href="/admin/group"><i class="layui-icon">&#xe623;</i>用户级别列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe705;</i>    <cite>新闻管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/newcate"><i class="layui-icon">&#xe623;</i>新闻分类</a></dd>
            <dd><a href="/admin/article/create"><i class="layui-icon">&#xe623;</i>新闻添加</a></dd>
            <dd><a href="/admin/article"><i class="layui-icon">&#xe623;</i>新闻列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe667;</i><cite>&nbsp;公告管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/notice/create"><i class="layui-icon">&#xe623;</i>发布公告</a></dd>
            <dd><a href="/admin/notice"><i class="layui-icon">&#xe623;</i>公告列表</a></dd>
          </dl>
        </li>


        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe64c;</i><cite>&nbsp;广告管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/ad/create"><i class="layui-icon">&#xe623;</i>添加广告</a></dd>
            <dd><a href="/admin/ad"><i class="layui-icon">&#xe623;</i>广告列表</a></dd>
          </dl>
        </li>

        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe621;</i><cite>&nbsp;银行管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/bank/create"><i class="layui-icon">&#xe623;</i>银行添加</a></dd>
            <dd><a href="/admin/bank/"><i class="layui-icon">&#xe623;</i>银行列表</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe705;</i><cite>&nbsp;记录管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/banka"><i class="layui-icon">&#xe623;</i>办卡记录</a></dd>
            <dd><a href="/admin/cash"><i class="layui-icon">&#xe623;</i>提现记录</a></dd>
            <dd><a href="/admin/order"><i class="layui-icon">&#xe623;</i>订单管理</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;"><i class="layui-icon">&#xe716;</i><cite>&nbsp;系统管理</cite></a>
          <dl class="layui-nav-child">
            <dd><a href="/admin/system"><i class="layui-icon">&#xe623;</i><cite>网站设置</cite></a></dd>
            <dd><a href="/admin/service"><i class="layui-icon">&#xe623;</i>服务协议</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
      @section('content')
      @show

    </div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
@section('js')
@show
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>