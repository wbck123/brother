@extends('common.admin')
@section('content')
        <div class="page-content">
          <div class="content">
            <form action="/admin/group/{{$res->id}}" method='post' class="mws-form">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        用户组别
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" value='{{$res->name}}'
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        升级费用
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price" required lay-verify="required" value='{{$res->price}}'
                        autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        阅读权限
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="weight" required lay-verify="required" value='{{$res->weight}}'
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required" value='{{$res->sort}}'
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       *数字越小排名越靠前
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                        {{csrf_field()}}

                        {{method_field('PUT')}}
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="groupedit">
                        修改
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
  
  $('#groupedit').on('click',function(){
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