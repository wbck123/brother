@extends('common.home')
@section('content')
<style>
	html,body{overflow: hidden;}
</style>
<link rel="stylesheet" href="/admins/layui/css/layui.css">
<script src="/admins/layui/layui.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="percontent scolld">

	<ul>
		<li>
			<span><i></i>平台编号</span>

			<span><input  id="true_name" type="text" disabled value="{{$person->vid}}"></span>
		</li>

		<li>
			<span><i></i>姓名</span>
			<span><input name="name" id="true_name" type="text" placeholder="请输入您的姓名" nullmsg="请输入您的姓名！" value="{{$person->name}}"></span>
		</li>
		
		<li>
			<span><i></i>身份证号</span>
			<span><input name="card" id="cardno" type="text" placeholder="请输入您的身份证号" nullmsg="请输入您的身份证号！" value="{{$person->card}}"></span>
		</li>

		<li>
			<span><i></i>电话</span>
			<span><input name="tel" id="mobile" type="tel" placeholder="请输入您的电话" nullmsg="请输入您的电话！" value="{{$person->tel}}"></span>
		</li>
		<li>
			
			<span><i></i>修改密码</span>
			<span><input name="pass" id="pass" type="password" placeholder="请输入您的APP登录密码" nullmsg="请输入您的APP登录密码！" value=""></span>
		</li>
	</ul>
		<div class="msg">完善个人资料后可以在APP和号码检测使用，使用手机号和您设定的密码进行登录！</div>
<input type="hidden" name="ids" value="{{$person->id}}"> 
	<button id="btn_sub">保存资料</button>
</div>
<script>
layui.use(['jquery','layer'], function(){
  var $ = jQuery = layui.$;
  $('#btn_sub').on('click',function(){

    var name = $('input[name=name]').val();
    var card = $('input[name=card]').val();
    var tel = $('input[name=tel]').val();
    var pass = $('input[name=pass]').val();
    var id = $('input[name=ids]').val();
    if( name ==""){
    	layer.msg('姓名不能为空');
        return false;
    }
    if( card ==""){
    	layer.msg('身份证号不能为空');
        return false;
    }
    if( tel ==""){
    	layer.msg('手机号不能为空');
        return false;
    }
  

      var cardReg = /^[1-9]\d{5}(18|19|([23]\d))\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9Xx]$/;
      if(!cardReg.test(card)){
        layer.msg('身份证格式不正确');
        return false;
      }

      var phoneReg = /^1[3456789]\d{9}$/; 
      if(!phoneReg.test(tel)){
        layer.msg('手机号格式不正确');
        return false;
      }

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      //发送ajax
   $.post('/baocunziliao',{
   		id:id,
   		name:name,
   		card:card,
   		tel:tel,
   		pass:pass,
   },function(data){
       if (data == 1) {
       		layer.msg('更新成功');
       }else{
       		layer.msg('更新失败');
       }
   })
});  
}); 
</script>
@endsection