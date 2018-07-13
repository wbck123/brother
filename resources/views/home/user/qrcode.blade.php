@extends('common.home')
@section('content')
	{!! QrCode::format('png')->size(200)->generate(config('app.url').'register?id='.$id,public_path('qrcodes/qrcode'.$id.'.png')); !!}

	<?php
	$path = 'http://jinrong.ezhongheng.com/qrcodes/qrcode'.$id.'.png';

dd($path);
	?>
@endsection