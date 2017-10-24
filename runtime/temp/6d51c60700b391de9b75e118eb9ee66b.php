<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:42:"./application/admin\view\content_edit.html";i:1504671034;s:42:"./application/admin\view\index_header.html";i:1507643832;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
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
<link rel="stylesheet" href="__ADMIN__/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="__ADMIN__/wangEditor/js/wangEditor.min.js"></script>
<style type="text/css">
.tpt_sels a{padding-right:15px;position:relative}
.tpt_sels a{padding:0 20px 0 8px;color:#3B6268;background:#FFFFBA;border:1px #F8E06E solid;margin-right:5px;margin-bottom:5px;font-size:14px;height:26px;line-height:26px;display:block;float:left}
.tpt_pres a.selected{padding:0 8px;color:#3B6268;background:#FFFFBA;border:1px #F8E06E solid;margin-right:5px;margin-bottom:5px;font-size:14px;height:26px;line-height:26px;display:block;float:left}
.tpt_pres a{padding:0 8px;color:#fff;background:#5AC7A9;border:1px #5AC7A9 solid;margin-right:5px;margin-bottom:5px;font-size:14px;height:26px;line-height:26px;display:block;float:left}
.tpt_sels a em{width: 12px;height: 12px;font-style: normal;display: block;position: absolute;top: 7px;right: 4px;z-index: 2;background: url(__ADMIN__/img/sx.png) no-repeat 0 0;}
.cl{zoom:1}
.cl:after{content:'\20';display:block;height:0;clear:both;visibility:hidden}
.wangEditor-menu-container .menu-item a {padding: 12px 0;}
.wangEditor-menu-container .menu-item {height: 37px;width: 37px;}
.wangEditor-menu-container .menu-group {padding: 0;}
.wangEditor-container {border: 1px solid #e6e6e6;}
</style>
<body>
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">
<fieldset class="layui-elem-field layui-field-title">
  <legend>修改内容</legend>
</fieldset>
   
<form class="layui-form">
  <input type="hidden" name="id" value="<?php echo $tptc['id']; ?>">

  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" value="<?php echo $tptc['title']; ?>" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item" style="width: 300px;">
    <label class="layui-form-label">所在栏目</label>
    <div class="layui-input-block">
      <select name="tid">
	  <?php if(is_array($tptcs) || $tptcs instanceof \think\Collection || $tptcs instanceof \think\Paginator): $i = 0; $__LIST__ = $tptcs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <option <?php if($tptc['tid'] == $vo['id']): ?>selected="selected"<?php endif; ?> value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
      <?php endforeach; endif; else: echo "" ;endif; ?>
	  </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">图片</label>
	<a class="layui-btn" id="image" style="float: left;"><i class="layui-icon">&#xe67c;</i>上传图片</a>
    <div class="layui-input-block" style="margin-left: 220px;">
	  <input type="text" name="pic" value="<?php echo $tptc['pic']; ?>" class="layui-input" style="position: absolute;left: 0;top: 0;">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">描述</label>
    <div class="layui-input-block">
      <textarea name="description" autocomplete="off" class="layui-textarea"><?php echo $tptc['description']; ?></textarea>
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">内容</label>
    <div class="layui-input-block">
      <textarea id="textarea" name="content" required lay-verify="required" style="height:500px;width: 100%;"><?php echo $tptc['content']; ?></textarea>
    </div>
  </div>

  <div class="tpt_item">
	<input type="hidden" name="keywords" value="<?php echo $tptc['keywords']; ?>">
	<div id="tpt_sel" class="tpt_sels tpt-none-750" style="margin-top: 20px;">
	<span style="margin: 0 0 5px 110px;float: left;">
	<?php if($tptc['keywords'] != ''): $arr=explode(',', $tptc['keywords']);foreach ($arr as $k=>$v){echo "<a href='javascript:;'>$v<em></em></a>";}endif; ?>
	</span>
	<div class="layui-form-item" style="margin-bottom: 10px;">
	<label class="layui-form-label">标签</label>
	<div class="layui-input-block">
	<input id="tpt_input" type="text" value="" autocomplete="off" class="layui-input" style="width: 400px;float: left;margin-right: 20px;">
	<button class="layui-btn" id="tpt_btn" type="button" style="background: #FF5722;margin-bottom: 10px;"">添加标签</button>
	</div>
	</div>
	</div>
	<div id="tpt_pre" class="tpt_pres cl tpt-none-750" style="margin: 0 0 15px 110px;">
	<?php if(is_array($tagss) || $tagss instanceof \think\Collection || $tagss instanceof \think\Paginator): $i = 0; $__LIST__ = $tagss;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;if($tag != ''): ?><a href="javascript:;"><?php echo $tag; ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
	  <button class="layui-btn" lay-submit="" lay-filter="content_edit">立即提交</button>
      <button class="layui-btn layui-btn-primary" onclick="history.go(-1)">返回</button>
    </div>
  </div>

</form>
</div>
</div>
<script type="text/javascript" src="__ADMIN__/js/keywords.js"></script>
<script type="text/javascript">
    var editor = new wangEditor('textarea');
	editor.config.uploadImgUrl = '<?php echo url("upload/doUploadPic"); ?>';
	editor.config.uploadImgFileName = 'FileName';
	editor.create();
</script>
<script>
layui.use(['form', 'upload'],function(){
  var form = layui.form,
  upload = layui.upload,
  jq = layui.jquery;
  
  upload.render({
    url: '<?php echo url("upload/upimage"); ?>'
    ,elem:'#image'
    ,before: function(input){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
    }
    ,done: function(res){
      layer.close(loading);
      jq('input[name=pic]').val(res.path);
      layer.msg(res.msg, {icon: 1, time: 1000});
    }
  }); 

  form.on('submit(content_edit)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("content/edit"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("content/index"); ?>';
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