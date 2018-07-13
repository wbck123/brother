<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统公告</title>
	<link rel="stylesheet" href="/admins/layui/css/layui.css">
    <script src="/admins/layui/layui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />  
</head>
<body>

<div class="layui-collapse" lay-accordion="">
  @foreach($notice as $k=>$v)
  <div class="layui-colla-item">
    <h2 class="layui-colla-title" style="font-size: 18px">{{$v->title}}</h2>
    <div class="layui-colla-content layui-show" style="width: 100%">
      {!!$v->content!!}
    </div>
  </div>
  @endforeach
</div>
<script>
layui.use(['element', 'layer'], function(){
  var element = layui.element;
  var layer = layui.layer;
  
  //监听折叠
  element.on('collapse(test)', function(data){
    layer.msg('展开状态：'+ data.show);
  });
});
</script>
</body>
</html>