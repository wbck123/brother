@extends('common.home')

@section('content')
<ul class="tnav scolld">
		<li _model="1">
			<a href="/user/cashrecord/1">未审核</a>
		</li>
		<li _model="2">
			<a href="/user/cashrecord/2">已完成</a>
		</li>
		<li _model="3">
			<a href="/user/cashrecord/3">被拒绝</a>
		</li>			
</ul>
	<script>
		var model = "{{$ids}}";
		$(function(){
			$('.tnav li').each(function(){
				if($(this).attr("_model") == model){
					$(this).find('a').addClass('on');
				}
			});
		});
	</script>
	<div class="wcon">
		<ul>
			<li>
				
				<a href=""></a>
					<div class="txt">
						<img src="http://thirdwx.qlogo.cn/mmopen/ajNVdqHZLLAeLia2KRWRbXBxUdtGcCSQxHdr8lkraBS5ibtibO9o8QlacpbicqXIG4APvCvN9uxq5ArWy3Aqe0OZog/132">
						<div class="fltxt">
							2018年提现
						</div>
					</div>
				<span>2018年提现</span>
				<p>2018年提现</p>
				
			</li>
			<!-- <div class="nolist">啊哦~，没有该类数据哟~！</div>		 -->
		</ul>
	</div>

@endsection