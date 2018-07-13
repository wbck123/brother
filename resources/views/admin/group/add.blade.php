@extends('common.admin')
@section('content')
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
            <form action="/admin/group" method='post' class="mws-form">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        用户组别
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" placeholder="请输入用户组别"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        升级费用
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price" required lay-verify="required|number" placeholder="请输入升级费用"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        阅读权限
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="weight" required lay-verify="required|number" placeholder="请输入阅读权限"
                        autocomplete="off" class="layui-input">
                    </div>

                    <div class="layui-form-mid layui-word-aux">
                       * 阅读权限为0-10之间的整数
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required|number" placeholder="请输入排列序号"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="groupadd">
                        添加
                    </button>
                </div>
            </form>
          </div>
        </div>
<script>
layui.use('form', function(){
  var form = layui.form;
  form.render();
}); 
layui.use(['jquery'], function(){
  var $ = jQuery = layui.$;
  
  $('#groupadd').on('click',function(){
    var price = $('input[name=price]').val();
    var weight = $('input[name=weight]').val();
    var sort = $('input[name=sort]').val();

      var priceReg = /^\d{1,20}$/;
      if(!priceReg.test(price)){
        layer.msg('升级费用格式不正确');
        return false;
      }

    var weightReg = /^\w{1,12}$/; 
      if(!weightReg.test(weight)){
        layer.msg('阅读权限格式不正确');
        return false;
      }

       var sortReg = /^\w{1,12}$/;
      if(!sortReg.test(sort)){
        layer.msg('排序格式不正确');
        return false;
      }
});  

});  
</script>
@endsection