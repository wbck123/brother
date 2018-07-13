@extends('common.admin')
@section('content')

<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
            <form action="/admin/bank/{{$res->id}}" method='post' class="mws-form" enctype="multipart/form-data">
                {{ csrf_field() }}
    			{{method_field('PUT')}}
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        银行名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" value="{{$res->name}}" required lay-verify="name"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        返佣价格
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="price"  value="{{$res->price}}"  required lay-verify="required|number"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        银行图标
                    </label>
                    <div class="uploader red">
                        <input type="file" class="filename" name="bpic" />
                    </div>
                    <div style="padding-top: 10px">
                    <img src="{{$res->bpic}}" alt="" width="100px">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        成功率
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="rate" required lay-verify="required|number" placeholder="请输入成功率"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red"> %</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        币种
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="ency" required lay-verify="name" placeholder="请输入币种"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        免息期
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="per" required lay-verify="name" placeholder="免息期"
                        autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                       <p style="color: red"> 天</p>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        查询网址
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="burl"   value="{{$res->burl}}"  required lay-verify="required|url"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        排序
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sort" required lay-verify="required|number"  value="{{$res->sort}}"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine" lay-filter="save" lay-submit id="bankedit">
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

  $('#bankedit').on('click',function(){
    var price = $('input[name=price]').val();
    var bpic = $('input[name=bpic]').val();
    var sort = $('input[name=sort]').val();

      var priceReg = /^\d{1,20}$/;
      if(!priceReg.test(price)){
        layer.msg('返佣价格格式不正确');
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