<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
  <title>云之讯 - 验证短信测试Demo</title>
  <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
 </head>
<body style="background-color:#48c690">
<br>
<p style="text-align:center"><b>测试短信验证码</b></p>
<p style="text-align:center;color:#FF0000">测试前，请先阅读《请先读我（重要）.doc》并配置好相应参数,<a href="http://docs.ucpaas.com/doku.php?id=error_code" target="black">点击查看错误码</a></p>
  <div style="margin:0 auto;width:350px;height:150px">
    <form id="myForm" action="/yzm" method="post">
      <table>
        <tr>
          <td>接收短信的手机号: </td>
          <td><input type="text" name="yzmtel" size="20" style="margin-right:0px"> </td>
        </tr>
        <tr>
          <td>验证码: </td>
          <td><input type="text" name="yzm" size="20" style="margin-right:0px"></td>
        </tr>
        <tr>
          {{csrf_field()}}
          <td><a href="#" onclick="document.getElementById('myForm').submit();"></td>
          <td><input type="submit" value="提交测试" style="margin-left: 0px;width:100px;"/></td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>