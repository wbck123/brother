
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no"> 
    <title>账号注册</title>
  <link rel="stylesheet" href="/admins/layui/css/layui.css">
  <link rel="stylesheet" href="/admins/css/style.css">
    <script src="/admins/layui/layui.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="http://www.17sucai.com/preview/292087/2018-03-07/H5%E6%B3%A8%E5%86%8C/css/amazeui.min.css">

    <style>
        html { font-size: 10px; }
        html,body { background-color: #f0eff4; }
        body { padding-bottom: 0;margin: 0;}
        * { padding: 0;margin: 0; }
        header {position: fixed;top: 0;left: 0;z-index: 999;width: 100%;height: 49px; background-color: #333; color: #fff;}
        header .back { position: absolute;top: 0;left: 0; display: inline-block;padding-left: 5px; font-size: 30px; }
        header p { margin: 0;line-height: 49px; font-size: 16px;text-align: center; }
        .register { padding: 8px 6px; font-size: 14px;}
        .res-item {position: relative;  width: 100%; border-radius: 4px; margin-bottom: 8px;background-color: #fff; }
        .res-icon {position: absolute;left: 8px;top: 5px;z-index: 100; display: inline-block;font-size: 18px;color: #9c9c9c; }
        .res-item .input-item {display: inline-block;width: 100%;padding-left: 31px;height: 40px;border: none; font-size: inherit;}
        .res-item .input-item:focus { 
            outline-offset: 0;
            outline: -webkit-focus-ring-color auto -2px;
            background-color: #fefffe;
            border: 1px solid #e21945;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 5px rgba(226,25,69,.3);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 5px rgba(226,25,69,0.3);
        }
        .res-item .input-item:focus + .res-icon { color: #e21945; }
        .yanzhengma {position: absolute;right: 10px;top: 5px; z-index: 100;  display: inline-block;padding: 0.5rem 0.8rem;font-size: 14px; border: none;background-color: #e21945;color: #fff;border-radius: 8px; }
        .yanzhengma:disabled { background-color: #ddd; }
        .res-btn { margin-top: 10px;padding: 0 5px; }
        .res-btn button {  background-color: #e21945;font-size: 14px; color: #fff;border-radius: 8px; }
        .res-btn button:focus { color: #fff; }
    </style>
</head>
<body>
    <!--[if lte IE 9]>
    <p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a
      href="http://browsehappy.com/" target="_blank">升级浏览器</a>
      以获得更好的体验！</p>
    <![endif]-->
   <div class="tu"><img src="/home/images/dl_banner@2x.png" width="100%" /></div>
    <div class="register">
        <div class="res-item">
            <input type="hidden" name="id" value="{{$id}}">
            <input type="tel" name="tel" placeholder="手机号" class="input-item mobile">
            <i class="res-icon am-icon-phone"></i>
        </div>
        <div class="res-item">
            
            <input type="text" placeholder="验证码"  name="code" class="input-item yanzheng">
            <i class="res-icon am-icon-mobile"></i>
            <button type="button"  class="yanzhengma">发送验证码</button>
        </div>
        <div class="res-btn">
            <button type="button" id="res-btn" class="am-btn am-btn-block">立即注册</button>
        </div>
    </div>

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="/static/wechatMember/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script>

      
//获取验证码
layui.use(['jquery','layer'], function(){
  var $ = jQuery = layui.$;
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

//获取验证码
   $('.yanzhengma').on('click',function(){

    var tel = $('input[name=tel]').val();

    if(tel == ""){

      layer.msg('手机号码不能为空');

        return false;
    }

    var phoneReg = /^1[3456789]\d{9}$/; 

      if(!phoneReg.test(tel)){

        layer.msg('手机号码格式错误');

        return false;

      }

       var times = 200;
                function roof(){
                    if(times == 0){
                        $('.yanzhengma').text('发送验证码('+times+'s)');
                        $('.yanzhengma').prop('disabled',false);
                        $('.yanzhengma').text('发送验证码');
                        times = 10;
                        return
                    }
                    $('.yanzhengma').text('发送验证码('+times+'s)');
                    times--;

                    setTimeout(roof,1000);
                }
            $(this).prop('disabled',true);
            roof();

                $.post('/yzm',{tel:tel},function(data){
                       if(data ==1){
                          layer.msg('发送成功');
                       }else{
                        layer.msg('发送失败');
                       }
                   })
            });

//确认注册
//
      
    $('#res-btn').on('click',function(){

      var tel = $('input[name=tel]').val();
      var code = $('input[name=code]').val();
      var id = $('input[name=id]').val();
      if(code == ""){
        layer.msg('验证码不能为空!');
      }
 
          $.post('/doregister',{tel:tel,code:code,id:id},function(data){
                   if(data ==2){
                      layer.msg('登录成功');
                      window.location.href = "/user";
                   }else if(data ==3){
                      layer.msg('验证码错误');
                   }else{
                    layer.msg('注册失败');
                   }
               });
          })
  })

    </script>

</body>
</html>
