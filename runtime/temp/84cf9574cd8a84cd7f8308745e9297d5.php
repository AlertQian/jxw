<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:41:"./application/admin\view\login_index.html";i:1504669109;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tpt-Content内容管理系统 - TPTCMS</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="/favicon.ico" rel="shortcut icon">
  <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
  <link rel="stylesheet" href="__ADMIN__/css/global.css">
  <script src="__ADMIN__/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="__ADMIN__/layui/layui.js" type="text/javascript"></script>
</head>
<body id="login">
<div class="login">
<h2>TPTCMS后台管理</h2>
<form class="layui-form">
<div class="layui-form-item">
<input type="text" name="adminname" placeholder="请输入账号" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">
<input type="password" name="password" placeholder="请输入密码" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">
<input type="text" name="kouling" placeholder="请输入口令" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
<div class="layui-form-item">
<input style="width:100px;float:left;margin-right: 10px;" type="text" name="code" placeholder="验证码" required lay-verify="required" autocomplete="off" class="layui-input">
<img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" width="150" style="float:left; cursor:pointer;" alt="captcha" />
</div>
<div class="layui-form-item">
<button style="padding: 0 102px;" class="layui-btn" lay-submit="" lay-filter="login_index">立即登录</button>
</div>
</form>
<script>
layui.use('form',function(){
  var form = layui.form,
  jq = layui.jquery;

  form.on('submit(login_index)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("login/index"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("index/index"); ?>';
        });
      }else{
        layer.close(loading);
        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
      }
    });
    return false;
  });

})
</script>
</div>
<script>
layui.use(['layer','jquery'], function(){
  var layer = layui.layer,
  jq = layui.jquery;

  jq('.logi_logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("login/logout"); ?>',function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.reload();
        });
      }else{
        layer.close(loading);
        layer.msg(data.msg, {icon: 2, anim: 6, time: 1000});
      }
    });
  });

})
</script>
</body>
</html>