<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link rel="stylesheet" href="/admins/layui/css/layui.css">
	<style>
		.top{
			padding-top: 100px;
		}
	</style>
    </head>
    <body>

<button type="button" class="layui-btn layui-btn-danger" id="test7"><i class="layui-icon"></i>上传图片</button>
<div class="layui-inline layui-word-aux">
  这里以限制 60KB 为例
</div>



<div class="layui-upload">
  <button type="button" class="layui-btn" id="test1">上传图片</button>
  <div class="layui-upload-list">
    <img class="layui-upload-img" id="demo1">
    <p id="demoText"></p>
  </div>
</div>  


    </body>
    <script src="/admins/layui/layui.js"></script>
    <script>


layui.use('upload', function(){
      var $ = layui.jquery
      ,upload = layui.upload;
  var uploadInst = upload.render({
    elem: '#imgupload'
    ,url: '/upload'
    ,field:'photo'
    ,headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    ,before: function(obj){
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result);

        console.log(obj.ResultData);
      });
    }
    ,done: function(res){
      if(res.code > 0){
        return layer.msg('上传失败');
      }
    }
    ,error: function(){
      var demoText = $('#demoText');
      demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
      demoText.find('.demo-reload').on('click', function(){
        uploadInst.upload();
      });
    }
  });











    upload.render({
    elem: '#test7'
    ,url: '/upload'
    ,field:'photo'
    ,size: 60 //限制文件大小，单位 KB
    ,headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
    ,done: function(res){
      console.log(res)
    }
  });
});

    </script>
</html>