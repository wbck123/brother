@extends('common.home')
@section('content')
<div class="tu"><img src="/home/images/dl_banner@2x.png" width="100%" /></div>
	<div class="swiper-container scolld" style="margin-top: .5rem;">
		<div class="swiper-wrapper">
			<div class="swiper-slide items">
				@foreach($caips as $v)
				<div class="sbanner list-item">
						<a href="{{$v->burl}}">
							<img src="{{$v->bpic}}"/>
							<span>{{$v->name}}</span>
						</a>
				</div>
				@endforeach			
			</div>
		</div>
	</div>
@endsection