
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/home/css/reset1.css" />
     <link rel="stylesheet" type="text/css" href="/home/css/header.css">
     <link rel="stylesheet" type="text/css" href="/home/css/payend.css">
    <link rel="stylesheet" type="text/css" href="/home/css/login.css">
    <script src="/admins/layui/layui.js"></script>
    <script src="/admins/layui/css/layui.css"></script>
   <style type="text/css" media="screen">
   /*邀请有礼活动弹框css*/
    .tan_box{
         width: 90%;
        height: 5.2rem;
        background: #FFF;
        border-radius: .1rem;
        position: fixed;
        z-index: 999;
        top: 50%;
        left: 5%;
        margin-top: -2.83rem;
        text-align: center;
        box-sizing: border-box;
        padding: 0 10%;
        display: none;
    }
    .tan_box p{
         width: 100%;
        margin: 1rem auto;
        font-size: 0.28rem;
        color: #323232;
        line-height: .55rem;
    }
    .tan_box>div{
      width: 100%;
      overflow: hidden;
    }
    .tan_box a{
         width: 40%;
        height: .95rem;
        box-sizing: border-box;
        border-radius: 800px;
        line-height: .95rem;
        font-size: .3rem;
    }
    .tan_box a:first-child{
         color: #FF6060;
        float: left;
        margin-left: 5%;
        border: 1px solid #FF6060;
    }
    .tan_box a:last-child{
         float: right;
        color: #FFF;
        background: #FF6060;
        margin-right: 5%;
    }
  </style>
    <title>登录</title>
</head>
<body>
    <div class="warp">
         <div class='denglu'>
          <!--邀请有礼活动新增-->
         <input type="hidden" id="getId" value="">
         <input type="hidden" id="getfrom" value=""> 

               
         <div class="tu"><img src="/home/images/dl_banner@2x.png"/></div>
         <div class="biaodan">
            <p>
              <input type="tel" class="phone" name="phone" id="mobile" placeholder="请输入11位手机号码">
            </p>
            <p>
             <span class="yan"><input type="tel" class="duanxin" placeholder="请输入短信验证码" name='code' id="mobile_code" style="width:72%"  pattern="[0-9]*"></span>
             <span class="anniu"><input type="button" id="btn" class="input"  value="获取验证码"/></span>
             
            </p>
         </div> 
         <div class="agree">
            <span class="input"><input type="checkbox" name="check" id="for" class="input_check" checked="checked"><label for="for"></label></span>&nbsp我已同意并注册 <span class="server"><a href="/mobile/index.php/twologin/reg_protocol">《服务协议》</a></span>          
        </div>
        <input type='button' value="立即登录" class="deng" id="deng">
        <p class="detail"><img src="/home/images/dianhua@2x.png" alt="图片"><span>如有疑问请咨询客服</span><span onclick="phone()">18904970363</span></p>
        </div>
    </div>
 <script>
	layui.use(['jquery', 'layer'], function(){ 
	  var $ = layui.$ 
	  ,layer = layui.layer;
	  
	 	//检查手机号
	 	$('#btn').click(function(){
		 	var tel = $('input[name=phone]').val();

				 var phoneReg = /^1[3456789]\d{9}$/;
				 if( tel == "" ){
				 	layer.msg('手机号不能为空');
				 	return false;
				 } 
			      if(!phoneReg.test(tel)){
			        layer.msg('请输入有效的手机号码');
			        return false;
			      }
		//发送Ajax
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
		$.ajax({
	          type : "POST",
	          url : "/register/yzm",
	          data : {tel:tel},
	          cache : false,
	          dataType : "json",
	          beforeSend : function() {
	          },
	          success : function(msg) {
	          	if(msg ==1 ){
	          	// if(msg.info==2){
	          	// 	settime(59);
	          	layer.msg('发送成功');
	          	  }else{
	          	  	layer.msg('发送失败');
	          	  }
	          }
		     });
			return false;
	 	});

	    function settime(){
			$('#btn').attr("disabled","disabled");
			var time=59;
			var timer=setInterval(function(){
				var temp=time--;
				$('#btn').attr("value",""+temp+"秒后重新获取");
				if(temp<=0){
					$('#btn').removeAttr("disabled");
					$('#btn').attr("value","获取验证码");
					clearInterval(timer);
					return
				}
			},1000)
	    }
});
</script>
</body>

</html>
