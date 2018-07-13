@extends('common.home')
@section('content')
	<ul class="bnav scolld">
		<li class="shouc" _id="2">
					<a href="javascript:;"><span class="on">佣金列表</span></a>
				</li>
					<li>
			<a href="/"><span>佣金网贷</span></a>
		</li>
		<li>
			<a href="/"><span>佣金信用卡</span></a>
		</li>
	</ul>
	<div>
		<div class="bcontent" id="bc2" style="display:block;">
			{!!$book->content!!}			
		</div>
	</div>
@endsection