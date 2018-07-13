
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>金融行业后台</title>
  <link rel="stylesheet" href="/admins/layui/css/layui.css">
  <link rel="stylesheet" href="/admins/css/style.css">
    <script src="/admins/layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<blockquote class="layui-elem-quote f18">{{$title}}</blockquote>
        <div class="page-content">
          <div class="content">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        姓名
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_email" name="name" required lay-verify="name" disabled value=" {{$res->name}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        手机号
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="tel" required lay-verify="required" disabled value=" {{$res->tel}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        身份证号码
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="card" required lay-verify="required" disabled value=" {{$res->card}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        支付宝账户
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="alipay" required lay-verify="required" disabled value=" {{$res->alipay}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        上级
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="lev1" required lay-verify="required" disabled value=" {{$res->lev1}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        上上级
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="lev2" required lay-verify="required" disabled value=" {{$res->lev2}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        上上上级
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="lev3" required lay-verify="required" disabled value=" {{$res->lev3}}" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        余额
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="money" required lay-verify="required" disabled value="¥ {{$res->money}} 元" 
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
          </div>
        </div>

</body>
</html>
