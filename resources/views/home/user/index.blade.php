@extends('common.home')
@section('content')
<div class="myheader scolld">
	<div class="title">
		<img src="./home/images/help.png" class="help" onclick="wenhao();" />
	</div>
	<div class="htop">
		<a href="/user/person">
		<img src="http://thirdwx.qlogo.cn/mmopen/ib8yXLELgR3UCVic4icGrd7HjjIj0C3IoKvk4LkmesiczWED0muYVxf8NbdGdGb1aGuQq0oPMibP1XjkJ2sUfNqqOpxqnviamn4jicT/132" />
		</a>
		<div>
			<h1>昵称：{{$users->nick}}</h1>
			<p>会员等级：
				@if($users->lev ==1)
				普通用户
				@else
				高级用户
				@endif
			</p>
			<p>用户ID：{{$users->vid}}</p>
			<p>推荐人：<span id="city">
				<?php
					if(!empty($users->lev1)){
						echo $users->lev1;
					}else{
						echo '无';
					}
				?>
			</span></p>
		</div>
	</div>
</div>
<div class="levmsg" id="level-info">
	<div class="msk"></div>
	<div class="lev">
		<div class="title">帮助中心<span onclick="hideMsg();">×</span></div>
		<div class="content">{!!$help->content!!}</div>
	</div>
</div>
<script>
	function wenhao(){
		$('#level-info .content').show();
		$('#level-info').show();
	}
	function hideMsg(){
		$('.levmsg .lev .content').hide();
		$('.levmsg').hide();
	}
</script>

<div class="mycontent">
	<div class="txt">
		<a href="/user/account">
			<div>
				<img src="./home/images/zhgl.png" />
				<span>账户管理</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/team/1">
			<div>
				<img src="./home/images/wdhy.png" />
				<span>我的好友</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/book">
			<div>
				<img src="./home/images/hysc.png" />
				<span>会员手册</span>
			</div>
		</a>
	</div>
	
	<div class="txt">
		<a href="/user/caips">
			<div>
				<img src="./home/images/bkjd.png" />
				<span>办卡进度</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/level">
			<div>
				<img src="./home/images/hysj.png" />
				<span>会员升级</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/kefu">
			<div>
				<img src="./home/images/zxkf.png" />
				<span>在线客服</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/qrcode/{{$id}}">
			<div>
				<img src="./home/images/tghb.png" />
				<span>推广海报</span>
			</div>
		</a>
	</div>
	
	<div class="txt">
		<a href="/user/person">
			<div>
				<img src="./home/images/grzl.png" />
				<span>我的资料</span>
			</div>
		</a>
	</div>
	<div class="txt">
		<a href="/user/notice">
			<div>
				<img src="./home/images/xtgg.png" />
				<span>系统公告</span>
			</div>
		</a>
	</div>	
		
	<div class="txt">
		<a href="/user/guide">
			<div>
				<img src="./home/images/xszn.jpg" />
				<span>新手指南</span>
			</div>
		</a>
	</div>
		<script>
		function sync_profile(){
			Ajax_query("/index.php?m=&c=Index&a=sync_profile",{id:"660029"});
		}


	</script>	
	<div class="txt">
		<a href="/user/ques">
			<div>
				<img src="./home/images/cjwt.png" />
				<span>常见问题</span>
			</div>
		</a>
	</div>
	
</div>


<script>
		
	//只有VIP等级用户查看
	function checkUser(){
		var level = "0";
		var url = "/index.php?m=&c=Index&a=level";
		if(level == "0" || level == ""){
			salert("升级为会员才可以浏览本页面，请立即升级会员！",1,function(){location.href=url});
			return false;
		}
		return true;
	}
</script>
<div style="clear:both;height:5rem"></div>

<script>
	$(window).scroll(function(){
		if($(window).scrollTop()>300){
			$(".scroll_top").show();
			
		}else{
			$(".scroll_top").hide();
		}
	});
</script>
@endsection
</body>
</html>