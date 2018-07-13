<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{config('web.title')}}_申请提现</title>
<link rel="stylesheet" href="/home/css/common.css" type="text/css">
<link rel="stylesheet" href="/home/css/font-awesome.min.css">
<link rel="stylesheet" href="/home/css/swiper.min.css" type="text/css">
<link rel="stylesheet" href="/admins/layui/css/layui.css">
<link rel="stylesheet" href="/admins/css/style.css">
<script src="/admins/layui/layui.js"></script>
<style>
	.tijiao{
    display: block;
    width: 100%;
    background: #2196F3;
    color: #fff;
    text-align: center;
    height: 4rem;
    line-height: 4rem;
    font-size: 1.5rem;
    border-radius: .2rem;
}
</style>
</head>
<body>
	<form action="/user/cash" method='post'>
    {{ csrf_field() }}
	<div class="withdrawadd-main scolld">
		<div class="withdrawadd-avail">
			<label>可提现金额:</label><br/>
			<span class="red">￥{{$user->money}}</span>
		</div>
		<div class="withdrawadd-info gray">
			提现说明:提现金额必须{{config('web.cashmax')}}元起，必须填写真实姓名，否则无法通过审核！
		</div>
		<div class="withdrawadd-accept">
			<label>申请提现：</label><br/>
			<div class="input-group">
				<input type="tel" class="form-control" name="money" placeholder="0.00" />
				<span class="input-group-addon" id="basic-addon1">元</span>
			</div>
		</div>
		<div class="withdrawadd-accept">
			<label>支付宝姓名：</label><br/>
			<div class="input-group">
				<input type="text" class="form-control" id="zfbname"  name="name" placeholder="请输入您的支付宝姓名" value="{{$user->name}}" />
			</div>
		</div>
		<div class="withdrawadd-accept">
			<label>支付宝账号：</label><br/>
			<div class="input-group">
				<input type="text" class="form-control" name="alipay" id="zfb" placeholder="请输入您的支付宝账号" value="{{$user->alipay}}"/>
			</div>
		</div>
		<div style=" padding:1rem 0;font-size:1.5rem;">审核通过后将通过支付宝给您转账</div>
		<div class="depositadd-btn">
			<button class="tijiao">提交申请</button>
		</div>
	</div>
</form>
	<div style="padding: 1rem 2.5rem;font-size: 1.4rem;color: #666666;">
		<p>提现时请确保您的支付宝账号及姓名的准确性，确保及时到账</p>
		<p>提现时间：周一到周五，9:00-17:00。提现当天到账，感谢您的支持！</p>
	</div>
<script>
layui.use(['jquery','layer'], function(){
  var $ = jQuery = layui.$;

		$('.tijiao').on('click',function(){
		  var money = $('input[name=money]').val();
		  var alipay = $('input[name=alipay]').val();
		  var name = $('input[name=name]').val();

		  if( money == ""){
		  	layer.msg('提现不能为空');
		        return false;
		  }

		  if( alipay == ""){
		  	layer.msg('支付宝不能为空');
		        return false;
		  }

		  if( name == ""){
		  	layer.msg('姓名不能为空');
		        return false;
		  }
});  
});

</script>

</body>
</html>

