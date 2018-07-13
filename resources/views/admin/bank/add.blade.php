@extends('common.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form action="/admin/bank" method='post' class="mws-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        银行名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" placeholder="请输入银行名称"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        返佣价格
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price" required lay-verify="required|number" placeholder="请输入返佣价格"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        银行图标
                    </label>
                      <div class="layui-input-inline">
                        <input type="file"  name="bpic">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        成功率
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="rate" required lay-verify="required|number" placeholder="请输入成功率"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red"> %</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        币种
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="ency" required lay-verify="name" placeholder="请输入币种"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        免息期
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="per" required lay-verify="name" placeholder="免息期"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red"> 天</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        查询网址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="burl" required lay-verify="required|url" placeholder="请输入查询网址"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red">* 办卡进度查询网址 格式为http://</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        简介
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="desc" required lay-verify="required|url" placeholder="请输入一句话简介"
                        autocomplete="off" class="layui-input">
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

                <input type="hidden" value="" name="bpic" id="hidden">
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="bankadd">
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
  $('#bankadd').on('click',function(){

    var price = $('input[name=price]').val();
    var bpic = $('input[name=bpic]').val();
    var url = $('input[name=burl]').val();
    var sort = $('input[name=sort]').val();

      var priceReg = /^\d{1,20}$/;
      if(!priceReg.test(price)){
        layer.msg('返佣价格格式不正确');
        return false;
      }


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
layui.use('upload', function(){
var $ = layui.jquery
,upload = layui.upload;
  var uploadInst = upload.render({
    elem: '#imgupload'
    ,url: '/upload'
    ,field:'img'
    ,headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      }
    ,before: function(obj){
      obj.preview(function(index, file, result){
        $('#demo1').attr('src', result);
      });
    }
    ,done: function(res){
      if(res.code > 0){
        return layer.msg('上传失败');
      }else{
        return layer.msg('上传成功');
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
});
</script>
@endsection