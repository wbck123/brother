<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{config('web.title')}}</title>
    <meta name="keywords" content="{!!config('web.keywords')!!}">
    <meta name="description" content="{!!config('web.desc')!!}">
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi,maximum-scale=1.0, user-scalable=no ">
    <link rel="stylesheet" href="/home/css/style.css" type="text/css">
</head>
<body>
	<div class="theader scolld">
	<div class="title">{{$res->title}}</div>
	<div class="remark">
		<span class="look">{{config('web.title')}} &nbsp;{{$res->num}}人观看</span>
		<span class="time">{!!date('Y-m-d',$res->ctime)!!}</span>
		
	</div>
</div>
<div class="tcontent">
	{!!$res->content!!}
</div>	
</body>
</html>


