<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:44:"./application/admin\view\category_index.html";i:1504417150;s:42:"./application/admin\view\index_header.html";i:1507643832;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
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
<style type="text/css">
.layui-form-checkbox {height: 22px;line-height: 20px;margin-right: 0px;padding-right: 20px;}
.layui-form-checkbox i {right: 3px;width: 20px;font-size: 16px;top: 2px;}
</style>
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">
<div class="tpt—btn">
<a href="<?php echo url('category/add'); ?>"><i class="layui-icon">&#xe61f;</i> 添加板块</a>
</div>

<form method="post" class="cl">
<table width="100%">
<tr>
<th width="5%" align="center">ID</th>
<th width="15%" align="center">名称</th>
<th width="10%" align="center">类型</th>
<th width="10%" align="center">显示</th>
<th width="10%" align="center">侧栏</th>
<th width="10%" align="center">图片</th>
<th width="20%" align="center">描述</th>
<th width="10%" align="center">时间</th>
<th width="10%" align="center">基本操作</th>
</tr>
<?php if(is_array($tptc) || $tptc instanceof \think\Collection || $tptc instanceof \think\Paginator): $i = 0; $__LIST__ = $tptc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<tr>
<td align="center"><?php echo $vo['id']; ?></td>
<td style="padding-left: 20px;"><?php if($vo['level'] != 0): ?>|----------<?php endif; ?><?php echo $vo['name']; ?></td>
<td align="center">
<?php if($vo['type'] == 1): ?>默认类型<?php endif; if($vo['type'] == 2): ?>其他类型<?php endif; ?>
</td>
<td align="center">
<a change="<?php echo $vo['id']; ?>" onclick="changeshows(this);" <?php if($vo['shows'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>>
<em>显示</em><i></i>
</a>
</td>
<td align="center">
<a change="<?php echo $vo['id']; ?>" onclick="changesidebar(this);" <?php if($vo['sidebar'] == 1): ?>class="layui-unselect layui-form-switch layui-form-onswitch"<?php else: ?>class="layui-unselect layui-form-switch"<?php endif; ?>>
<em>开启</em><i></i>
</a>
</td>
<td align="center"><?php if($vo['pic'] != ''): ?><img style="border: 1px solid #CDCDCD;padding: 3px;border-radius: 2px;" src="__ROOT__<?php echo $vo['pic']; ?>" height="25"><?php else: ?>暂无图片<?php endif; ?></td>
<td class="tpt-rap"><?php echo $vo['description']; ?></td>
<td align="center"><?php echo date("Y-m-d",$vo['time']); ?></td>
<td align="center">
<a class="layui-btn layui-btn-mini layui-btn-warm" href="<?php echo url('category/edit',array('id'=>$vo['id'])); ?>">修改</a> <a class="layui-btn layui-btn-mini layui-btn-danger del_btn" member-id="<?php echo $vo['id']; ?>" title="删除" nickname="<?php echo $vo['name']; ?>">删除</a>
</td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</form>
</div>
</div>
<script>
function changeshows(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
      data:{change:change},
	  url:"<?php echo url('category/changeshows'); ?>",
	  success:function(data){
		  if(data == 1){
			  $(o).attr("class","layui-unselect layui-form-switch");
	      }else{
			  $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
	      }
	  }
  });
}
function changesidebar(o){
  var change=$(o).attr("change");
  $.ajax({
	  type:"post",
	  dataType:"json",
      data:{change:change},
	  url:"<?php echo url('category/changesidebar'); ?>",
	  success:function(data){
		  if(data == 1){
			  $(o).attr("class","layui-unselect layui-form-switch");
	      }else{
			  $(o).attr("class","layui-unselect layui-form-switch layui-form-onswitch");
	      }
	  }
  });
}
</script>
<script>
layui.use('form',function(){
  var form = layui.form,
  jq = layui.jquery;

  jq('.del_btn').click(function(){
    var name = jq(this).attr('nickname');
    var id = jq(this).attr('member-id');
    layer.confirm('确定删除【'+name+'】?', function(index){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      jq.post('<?php echo url("category/dels"); ?>',{'id':id},function(data){
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


