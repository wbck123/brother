@extends('common.home')
@section('content')
	{!! QrCode::color(255,0,255)->size(200)->generate(Request::url()); !!}
@endsection