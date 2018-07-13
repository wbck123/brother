@extends('common.home')
@section('content')
<div class="proheader scolld">
	<div class="money"><em>￥</em>{{$account->money}}</div>
	<div class="with">可提现金额</div>
	<div class="wbtn"><span onclick="checkUser();">申请提现</span></div>
	<div class="hbom">
		<div class="txt">
			<div>
				<p>总收益</p>
				<p>￥{{$zong}}</p>
			</div>
		</div>
		<div class="txt">
			<div>
				<p>待审核</p>
				<p>￥{{$daizhifu}}</p>
			</div>
		</div>
		<div class="txt">
			<div>
				<p>已提现</p>
				<p>￥{{$yizhifu}}</p>
			</div>
		</div>
	</div>
</div>

<div class="pronav">
	<ul>
		<a href="/user/separate"><li><i></i>收益明细<span class="right"></span></li></a>
		<a href="/user/cashrecord/1"><li><i></i>提现记录<span class="right"></span></li></a>
		<a href="/bank"><li><i></i>我要办卡<span class="right"></span></li></a>
		<a href="/loginout" class="loginout"><li><i></i>退出登录<span class="right"></span></li></a>	</ul>
</div>
<script>
	function checkUser(){
		var herf = "/user/cash";
		location.href="/user/cash";
	}
</script>
@endsection