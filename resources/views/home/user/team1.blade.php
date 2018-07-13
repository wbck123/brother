@extends('common.home')
@section('content')
<ul class="tnav scolld">
		<li _model="1">
		<a href="/user/team/1">直推好友({{$total}})</a>
		</li>
		<li _model="2">
			<a href="/user/team/2">荐推好友({{$total2}})</a>
		</li>
		<li _model="3">
			<a href="/user/team/3">其他好友({{$total3}})</a>
		</li>		
	</ul>
	<script>
		var model = "{{$id}}";
		$(function(){
			$('.tnav li').each(function(){
				if($(this).attr("_model") == model){
					$(this).find('a').addClass('on');
				}
			});
		});
	</script>
	<div class="tcon">
		<ul class="items">
			@foreach($lev1 as $lev1)
			<li class="list-item">
				<div class="txt">
					<img src="http://thirdwx.qlogo.cn/mmopen/ajNVdqHZLLAeLia2KRWRbXBxUdtGcCSQxHdr8lkraBS5ibtibO9o8QlacpbicqXIG4APvCvN9uxq5ArWy3Aqe0OZog/132" />
					<h1>ID:{{$lev1->vid}}({{$lev1->nick}})</h1>
					<p>电话:{{$lev1->tel}}</p>
					<p>等级：普通会员</p>
					<p>注册时间：2018-07-09 13:58:58</p>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
@endsection