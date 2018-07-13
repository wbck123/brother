@extends('common.home')

@section('content')

<style>

.pbottom span {
    width: 47%;
    height: 4.2rem;
    font-size: 1.6rem;
    text-align: center;
    line-height: 4.5rem;
    display: block;
    background: #0487D5;
    border-radius: 6px;
    color: #fff;
    margin: 1.5%;
    float: left;
}

</style>
<div class="pheader scolld">
	<img src="{{$res->bpic}}" />
	<div>
		<h1>{{$res->name}}</h1>
		<p>申卡成功率：<em>96.00%</em></p>
		<p>{{$res->name}}</p>
	</div>
</div>
<div class="pmark">
	<ul>
		<li>
			<div>
				<span>卡片等级</span>
				<span>
					普卡&nbsp;白银卡&nbsp;				</span>
			</div>
		</li>
		<li>
			<div>
				<span>年费</span>
				<span>200元/年</span>
			</div>
		</li>
		<li>
			<div>
				<span>申请人数</span>
				<span>{{$res->num}}</span>
			</div>
		</li>
	</ul>
	<ul>
		<li>
			<div>
				<span>下卡额度</span>
				<span>1万元-5万元</span>
			</div>
		</li>
		<li>
			<div>
				<span>卡片币种</span>
				<span>人民币</span>
			</div>
		</li>
		<li>
			<div>
				<span>免息期</span>
				<span>1-26天</span>
			</div>
		</li>
	</ul>
</div>
<div class="ptai">
	<ul>
		<li><span>申请条件：</span><span>年满十八周岁</span></li>
		<li><span>平台名称：</span><span>{{$res->name}}</span></li>
	</ul>
</div>
<input type="hidden" name="bankaid" value="{{$id}}" />

<div class="pcontent">
	<div class="title">
		<span>申请攻略</span>
	</div>
	<div class="content">
		内容
	</div>
</div>
<div class="pcontent">
	<div class="title">
		<span>产品专属二维码</span>
	</div>
	<div class="content" style="padding:1rem;">
		{!! QrCode::color(255,0,255)->size(200)->generate(Request::url()); !!}

	</div>
</div><div style="clear:both;height:5.2rem;"></div>
<div class="pbottom">
	<span id="shenqing"  style="float:right;">立即申请</span>
</div>
  <link rel="stylesheet" href="/admins/layui/css/layui.css">
  <link rel="stylesheet" href="/admins/css/style.css">
  <script src="/admins/layui/layui.js"></script>
<script>
layui.use(['jquery','layer'], function(){
    var $ = jQuery = layui.$;
    var id = $('input[name=bankaid]').val();
    var cid = 1;//为银行产品编号
    	$('#shenqing').on('click',function(){
    		layer.open({
				  type: 2,
				  area: ['550px', '600px'],
				  fixed: false, //不固定
				  maxmin: true,
				  content: '/shenqing/'+id+'/'+cid
			});
    	})
})
</script>
@endsection

