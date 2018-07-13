@extends('common.home')
@section('content')
<div class="levimg scolld">
		<img src="/home/images/233059998433002448.jpg" />
	</div>
	<div class="lev-t">
		<h1>皮皮侠联盟会员</h1>
	</div>
	<div class="points">
		<i class="fa fa-check-circle-o"></i> 网贷每日更新
		<span class="pull-right">
			<i class="fa fa-check-circle-o"></i> 高额推广奖励
		</span>
		<span class="pull-left">
			<i class="fa fa-check-circle-o"></i> 自助办卡提额
		</span>
	</div>
	<div class="lecontent">
		<div class="title">请选择会员权限</div>
		<ul class="level">
			<li class="active" _id="1" _money="98.00">渠道经理</li>
			<li class="" _id="2" _money="298.00">团队经理</li>		
			<li class="" _id="3" _money="598.00">城市经理</li>
		</ul>
		<div class="txt">
			<div class="write">
				<span>姓名<i class="line"></i></span>
				<span><input name="name" type="text" placeholder="请输入您的姓名！" /></span>
			</div>
			<div class="write">
				<span>手机号<i class="line"></i></span>
				<span><input name="mobile" id="mobile" type="tel" placeholder="请输入您的手机号！" /></span>
			</div>
			<div class="write">
				<span>验证码<i class="line"></i></span>
				<span><input name="code" type="tel" placeholder="请输入验证码！" /></span>
				<b onclick="sendSms(this,'charge');">获取验证码</b>
			</div>
			<div class="write"  style="padding-left: 8%;width:92%;height:7rem;">
				<input id="isCheckAll" checked type="checkbox">
				我已经阅读并同意
				<p class="mychecksOne">
					<a href="javascript:;" onclick="zxXy();">《{{$xieyi->title}}》</a>
					<a href="javascript:;" onclick="showMsg();">《{{$xieyi->title}}》</a>
				</p>
			</div>
		</div>
	</div>
	<div class="levmsg" id="level-bzj">
		<div class="msk"></div>
		<div class="lev">
			<div class="title">{{$xieyi->title}}<span onclick="hideMsg();">×</span></div>
			<div class="content ct1">
					{!!$xieyi->content!!}
			</div>
			<div class="content ct5">
				{!!$xieyi->content!!}
			</div>		
		</div>
	</div>
	<div class="levmsg" id="level-info">
		<div class="msk"></div>
		<div class="lev">
			<div class="title">{{$xieyi->title}}<span onclick="hideMsg();">×</span></div>
				<div class="content">
					
		</div>
	</div>
	<input name="lid" id="lid" type="hidden" value="1" />
	<div style="height:5rem;clear:both;width:100%;"></div>
	<div class="levfoot">
		<div>
			金额：<span>98.00</span>元
		</div>
		<div>
			<button onclick="subForm()">立即加入</button>
		</div>
	</div>
	<script>
		var id = "1";
			money = "98.00";
		
		
		$('.level li').click(function(){
			$('.level li').removeClass('active');
			$(this).addClass('active');
			id = $(this).attr("_id");
			money = $(this).attr("_money");
			$('#lid').val(id);
			$('.levfoot span').html($(this).attr("_money"));
		});
		function showMsg(){
			$('#level-bzj .lev .content').hide();
			$('#level-bzj .ct'+id).show();
			$('#level-bzj').show();
		}
		function hideMsg(){
			$('.levmsg .lev .content').hide();
			$('.levmsg').hide();
		}
		function zxXy(){
			$('#level-info .content').show();
			$('#level-info').show();
		}
		function subForm(){
			var iswechat = "";
			var data = {
				"lid":$("#lid").val(),
				"name":$('input[name="name"]').val(),
				"mobile":$('input[name="mobile"]').val(),
				"code":$('input[name="code"]').val(),
			}
			if(data.name == ""){
				alert('请输入您的姓名！');
				return false;
			}
			if(checkMobile(data.mobile) == false){
				return false;
			}
			if(data.code == ""){
				alert('请输入短信验证码！');
				return false;
			}
			if($('#isCheckAll:checked').val() == "" || $('#isCheckAll:checked').val() == undefined ){
				alert('请确定阅读在线使用服务协议和保证金及退还说明！');
				return false;
			}
			if(iswechat == "1"){
				$('#loading').show();
				$.post("/index.php?m=&c=Index&a=level",data,function(d){
					console.log(d);
					if(d){
						$('#loading').hide();
						if(d.status){
							var jsapi =  d.info;
							var jsApiParameters = eval('(' +jsapi + ')');
							WeixinJSBridge.invoke(
								'getBrandWCPayRequest',
								jsApiParameters,
								function(res){
									WeixinJSBridge.log(res.err_msg);
									if(res.err_msg == "get_brand_wcpay_request:ok"){
										alert('升级会员成功');
										location.href=d.url;
									}else if(res.err_msg == "get_brand_wcpay_request:cancel"){
										alert('您取消了支付');
									}else{
										alert('支付失败，请重试！');
									}
								}
							);
						}else{
							alert(d.info);
						}
					}else{
						alert('请求失败!')
					}
				});
			}else{				
				location.href="/index.php?m=&c=Index&a=level&ispay=1&uid=660029&name="+data.name+"&lid="+data.lid+"&mobile="+data.mobile+"&code="+data.code;		
			}
		}
	</script>

@endsection