<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./application/admin\view\admin_index.html";i:1507698797;s:42:"./application/admin\view\index_header.html";i:1507643832;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
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
<body>
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">

<fieldset class="layui-elem-field layui-field-title">
<legend>管理修改</legend>
</fieldset>

  <form class="layui-form">
  <input type="hidden" name="adminid" value="1">
  
  <div class="layui-form-item">
    <label class="layui-form-label">账号修改</label>
    <div class="layui-input-block">
	  <input type="text" name="adminname" value="<?php echo $tptc['adminname']; ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">口令修改</label>
    <div class="layui-input-block">
	  <input type="text" name="kouling" value="<?php echo $tptc['kouling']; ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">登录验证</label>
    <div class="layui-input-block">
	  <input type="text" name="validate" value="<?php echo $tptc['validate']; ?>" placeholder="请输入内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
	  <button class="layui-btn" lay-submit="" lay-filter="admin_edits">立即提交</button>
      <button class="layui-btn layui-btn-primary" onclick="history.go(-1)">返回</button>
    </div>
  </div>
  </form>

</div>
</div>
<script>
layui.use(['form', 'element'],function(){
  var form = layui.form,
  element = layui.element,
  jq = layui.jquery;
  
  //提交
  form.on('submit(admin_edits)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("admin/edits"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("admin/index"); ?>';
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