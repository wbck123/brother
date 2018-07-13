<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的团队</title>
<link type="text/css" rel="stylesheet" href="/home/team/css/jquery.mobile-1.4.5.min.css" />
<script type="text/javascript" src="/home/team/js/jquery-2.1.4.min.js" ></script>
<script type="text/javascript" src="/home/team/js/jquery.mobile-1.4.5.min.js" ></script>
<link rel="stylesheet" href="https://zhej.test.hbbeisheng.com/template/wap/default_new/public/css/pre_foot.css" type="text/css">

<style>
	*{text-decoration: none;margin: 0;padding: 0;list-style: none;}
		#hear{width: 100%;height: 44px;line-height: 45px;border-bottom: 1px solid #cccccc;}
		#hear a{font-weight: normal;color: black;}
		#hear li{text-align: center;float: left;height: 45px;}
		#hear li:nth-of-type(1){width: 33%;float: left;}
		#hear li:nth-of-type(2){width: 33%;float: left;}
		#hear li:nth-of-type(3){width: 34%;float: right;}
		#contentop li{ width: 90%; display: none;text-align: center;margin: 0 auto;margin-top: 12px;}
		#contentop .action{ display: block;}
		#contentop .usl{width: 100%;height: 110px;background:wheat;border: 1px solid #cccccc;margin-bottom: 10px;text-shadow: none;}			
		#contentop .alo{width: 100%;height: 110px;background: white;border: 1px solid #cccccc;margin-bottom: 10px;text-shadow: none;}
		#contentop span{font-size: 1.3em;color: #47B0D7;}
		#contentop .sty1{margin-top: 18px;}
		#contentop .sty2{margin-top: 13px;}
		#contentop .sty3{margin-top: 13px;}
		#contentop .sty4{text-align: right;font-size: 0.8em;margin-top: -20px;}
		#contentop .Buy{font-size: 0.8em;margin-top: 2px;}
		#contentop .Buy div:nth-of-type(1){text-align: left;padding-left: 15px;}
		#contentop .Buy div:nth-of-type(2){float: right;}
		#contentop .cllio {background:url(/home/team/img/20010.png)repeat-x;width: 93%;height:8px;margin: 0 auto;margin-top: 5px;}
</style>
<script>
		$(function(){
			$("#hear li").click(function(){
				$(this).css({
					borderBottom: "2px solid red",
					height:"43px"
				}).siblings().css({
					borderBottom: "none",
					height:"45px"
				});
			});					
				
			$("#hear li").click(function(){
				$(this).addClass("action").siblings().removeClass("action");
				var index = $(this).index();
				$("#contentop li").eq(index).css("display","block").siblings().css("display","none");
			});
		});
</script>
</head>
<body>
<div data-role="page">
<div data-role = "content-floud">			
	<div style="font-family: '微软雅黑';">
		<ul id="hear">
			<li class="action" style="border-bottom: 2px solid red;height: 43px;">
				<a href="#">直推好友<span style="color: red;">({{$total}})</span></a></li>
			<li><a href="#" >荐推好友<span style="color: red;">({{$total2}})</span></a></li>
			<li><a href="#" >其他好友<span style="color: red;">({{$total3}})</span></a></li>
		</ul>
		<ul id="contentop">
			<li class="action">
				@foreach($lev1 as $lev1)
				<div class="alo">
					<div class="ui-grid-a sty3" >
						<div class="ui-block-a">等级:
							@if($lev1->lev == 1)
							普通会员
							@elseif($lev1->lev == 2)
							城市经理
							@else
							其他会员
							@endif
						</div>
						<div class="ui-block-b">电话:{{$lev1->tel}}</div>
					</div>
					<div class="ui-grid-a sty2" >
						<div class="ui-block-a "><span>昵称:{{$lev1->nick}}</span></div>
						<div class="ui-block-b">ID:{{$lev1->vid}}</div>
					</div>
					<div class="cllio"></div>
					<p class="sty5">注册时间:{!!date('Y-m-d H:i:s',$lev1->vid)!!}&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
				@endforeach
			</li>
			<li>
				@foreach($lev2 as $lev2)
			   <div class="alo">
			   	
					<div class="ui-grid-a sty3" >
						<div class="ui-block-a">等级:
							@if($lev2->lev == 1)
							普通会员
							@elseif($lev2->lev == 2)
							城市经理
							@else
							其他会员
							@endif</div>
						<div class="ui-block-b">电话:{{$lev2->tel}}</div>
					</div>
					<div class="ui-grid-a sty2" >
						<div class="ui-block-a "><span>昵称:{{$lev2->nick}}</span></div>
						<div class="ui-block-b">ID:{{$lev2->vid}}</div>
					</div>
					<div class="cllio"></div>
					<p class="sty5">注册时间:{!!date('Y-m-d H:i:s',$lev2->vid)!!}&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
				@endforeach
			</li>
			<li>
				@foreach($lev3 as $lev3)
				<div class="usl">
					<div class="ui-grid-a sty3" >
						<div class="ui-block-a">等级:
							@if($lev3->lev == 1)
							普通会员
							@elseif($lev3->lev == 2)
							城市经理
							@else
							其他会员
							@endif</div>
						<div class="ui-block-b">电话:{{$lev3->tel}}</div>
					</div>
					<div class="ui-grid-a sty2" >
						<div class="ui-block-a "><span>昵称:{{$lev3->nick}}</span></div>
						<div class="ui-block-b">ID:{{$lev3->vid}}</div>
					</div>
					<div class="cllio"></div>
					<p class="sty5">注册时间:{!!date('Y-m-d H:i:s',$lev3->vid)!!}&nbsp;&nbsp;&nbsp;&nbsp;</p>
				</div>
				@endforeach
			</li>
		</ul>
	</div>			
</div>	
</div>
<div class="fixed bottom">
	<div class="distribution-tip" id="distribution-tip" style="display: none;"></div>
	<dl class="sub-nav nav-b5">
		<dd id="bottom_home" style="width:33.33%;">
			<a href="/">
				<div class="nav-b5-relative">
					<img src="/home/images/home_check.png"/>
					<span>首页</span>
				</div>
			</a>
		</dd>

		<dd id="bottom_ditui" style="width:33.33%;">
			<a href="/">
				<div class="nav-b5-relative">
					<img src="/home/images/ditui_uncheck.png"/>
					<span>升级</span>
				</div>
			</a>
		</dd>
		<dd id="bottom_member" style="width:33.33%;">
			<a href="/user">
				<div class="nav-b5-relative">
					<img src="/home/images/user_uncheck.png"/>
					<span>会员中心</span>
				</div>
			</a>
		</dd>
	</dl>
</div>

</body>
</html>

