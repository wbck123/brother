@extends('common.home')

@section('content')

<div class="icontent scolld" style="margin-top:.5rem;">
	<ul class="items">
		@foreach($res as $res)
		<a href="/bank/detial/{{$res->id}}/1" class="list-item">
			<li>
						<img src="{{$res->bpic}}" />
						<div>
							<h1>{{$res->name}} <span>下卡率 : <em>92.00%</em></span></h1>
							<p>卡片等级 : 
								<em>
								普卡&nbsp;白银卡&nbsp;金卡&nbsp;								</em> 
								申请人数 : <em>{{$res->num}}</em></p>
							<p>发卡快</p>
						</div>
			</li>
					<li style="height: 2.5rem;padding-left: 1.2rem;line-height: 2.5rem;font-size: 1.25rem;">{{$res->desc}}</li>				
		</a>
		@endforeach	
	</ul>
</div>
<div class="page" style="display:none; text-align:center; padding:20px;"><div><span class="rows">共 8 条记录</span>     </div></div>
<script>
$('.items').infiniteScroll({
	path: '.page .next',
	append: '.list-item',
	history: false,
});
</script>

@endsection