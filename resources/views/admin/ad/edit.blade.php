@extends('common.admin')
@section('content')

<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form action="/admin/ad/{{$res->id}}" method='post' class="mws-form" enctype="multipart/form-data">

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>广告名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="title" value="{{$res->title}}" required="" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>广告图片
                        <img src=""  alt="">
                    </label>
                    <div class="layui-upload">
                          <button type="button" class="layui-btn" id="test1">上传图片</button>
                          <div class="layui-upload-list">
                            <img class="layui-upload-img" id="demo1">
                            <p id="demoText"></p>
                          </div>
                        </div>  

                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>广告网址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="link" value="{{$res->link}}" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red">* 广告链接格式为http://www.baidu.com</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="sort" value="{{$res->sort}}" lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                {{ csrf_field() }}

                {{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="ad" lay-submit id="adedit">
                        修改
                    </button>
                </div>
            </form>
          </div>
        </div>
<script>
layui.use(['form','jquery','upload'], function(){
    var form = layui.form;
    form.render();
    var $ = jQuery = layui.$;
    $('#adedit').on('click',function(){
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
<!-- 
  var form = layui.form;
  form.render();
  var upload = layui.upload;
  var uploadInst = upload.render({
            elem: '#test1',
            url: '/admin/imgajax',
            acceptMime: 'image/jpg, image/png',
            data: {
                '_token': tag
            },
            choose: function(obj) {
                var files = obj.pushFile();
            },

            done: function(res) {
                if (res.status == 1) {
                    tu.src = res.data.url;
                    head.value=res.data.url;
                    return layer.msg('上传图片成功');
                } else {
                    layer.msg(res.message);
                }
            },
            error: function(upload) {
                return layer.msg('上传失败,请重新上传');
            }
        });
});
        layui.use(['jquery'], function(){
          var $ = jQuery = layui.$;
          
          $('#adedit').on('click',function(){
            alert($);
            // var url = $('input[name=link]').val();
            // var sort = $('input[name=sort]').val();


            //   var urlReg = /(http|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
            //   if(!urlReg.test(url)){
            //     layer.msg('查询网址格式不正确');
            //     return false;
            //   }

            //    var sortReg = /^\w{1,12}$/;
            //   if(!sortReg.test(sort)){
            //     layer.msg('排序格式不正确');
            //     return false;
            //   }
        }); 
</script> -->
@endsection