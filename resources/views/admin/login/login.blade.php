<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$title}}</title>
<link rel="stylesheet" type="text/css" href="/admins/css/login.css" />
<link rel="stylesheet" type="text/css" href="/admins/css/body.css"/>
</head>
<body>
<div class="container">
  <section id="content">
    <form action="/admin/dologin" method="post">
      <h1>会员登录</h1>

    @if(session('error'))
        <div class="mws-form-message warning">
          {{session('error')}}
        </div>
    @endif

      <div>
        <input type="text" placeholder="手机号" required="" id="username" name="tel" />
      </div>
      <div>
        <input type="password" placeholder="密码" required="" id="password"  name="pwd" />
      </div>
       <div class="">
        <span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
      </div>
      <div>
        {{csrf_field()}}
        <input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
      </div>
    </form><!-- form -->
     <div class="button">
      <span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>
      <a href="#">皮皮侠联盟</a>
    </div> <!-- button -->
  </section><!-- content -->
</div>
<!-- container -->


<br><br><br><br>
</body>
</html>