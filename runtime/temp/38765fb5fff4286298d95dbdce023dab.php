<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"./application/admin\view\index_home.html";i:1507703969;s:42:"./application/admin\view\index_header.html";i:1507643832;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
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
<div class="tpt—index fly-panel fly-panel-user">
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">欢迎使用Tpt-Content内容管理系统，先温馨提醒几个常见问题：</blockquote>
<table width="100%">
<tr>
<td class="tpt-raps">尽管本程序在发布前已经经过严格测试，但我们依然强烈建议各位用户时常备份；</td>
<td class="tpt-raps">不管您的网站是否整体使用本产品，还是部份使用本产品，都必须保留相关版权信息链接，如需要用于商业用途请联系官方授权；</td>
</tr>
<tr>
<td class="tpt-raps">安装完成后请将install安装文件删除，application文件改成只读，但extra文件保持可写；</td>
<td class="tpt-raps">您出于自愿而使用本产品，就必须了解使用本产品的风险，所导致的一切损失由使用者自行承担；</td>
</tr>
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">系统信息：</blockquote>
<table width="100%">
<tr><td width="110px">程序版本</td><td>Tpt-Content 2.1.1 内容管理系统 <a href="http://www.tpt360.com/" style="color:#FF5722;" target="_blank">查看最新版本</a></td></tr>
<tr><td>服务器类型</td><td><?php echo php_uname('s'); ?></td></tr>
<tr><td>PHP版本</td><td><?php echo PHP_VERSION; ?></td></tr>
<tr><td>Zend版本</td><td><?php echo Zend_Version(); ?></td></tr>
<tr><td>服务器解译引擎</td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>
<tr><td>服务器语言</td><td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td></tr>
<tr><td>服务器Web端口</td><td><?php echo $_SERVER['SERVER_PORT']; ?></td></tr>
</table>
<blockquote style="padding: 10px;border-left: 5px solid #009688;" class="layui-elem-quote">开发团队：</blockquote>
<table width="100%">
<tr><td width="110px">版权所有</td><td><a href="http://www.tpt360.com/" target="_blank">TPTCMS</a>开发团队保留所有权利</td></tr>
<tr><td>感谢贡献者</td><td>ThinkPHP，Layer</td></tr>
<tr><td>特别提醒您</td><td>本套程序基于ThinkPHP5开发框架，致力于为您创建一个高效简洁但安全稳定的网站程序。</td></tr>
</table>
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