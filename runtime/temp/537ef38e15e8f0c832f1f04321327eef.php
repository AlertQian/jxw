<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:33:"./template/default/login_reg.html";i:1506484735;s:36:"./template/default/index_header.html";i:1506500650;s:37:"./template/default/public_gradeh.html";i:1504321935;s:36:"./template/default/index_footer.html";i:1506483663;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<title>注册 - Templet360</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
<link rel="stylesheet" href="__HOME__/css/style.css">
<script src="__ADMIN__/js/jquery-1.9.1.min.js"></script>
<script src="__ADMIN__/layui/layui.js"></script>
</head>
<body>
<div id="header" class="tpt-header">
	<div class="tpt-wp cl">
		<div class="tpt-logo"><a href="__ROOT__/"><img src="__HOME__/img/logo.png"></a></div>
		<div id="menu_list" class="tpt-block-1200 tpt-block-1920">
			<ul id="menu_nav" class="layui-nav">
				<li class="layui-nav-item"><a href="__ROOT__/">网站首页</a></li>
				<?php if(is_array($tptop) || $tptop instanceof \think\Collection || $tptop instanceof \think\Paginator): $k = 0; $__LIST__ = $tptop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($vo['shows'] == 1): ?>
				<li class="layui-nav-item">
				<?php if($vo['links'] != ''): ?>
				<a <?php if($vo['blank'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo $vo['links']; ?>"><?php else: ?><a href="javascript:;"><?php endif; ?><?php echo $vo['name']; ?></a>
				<?php if($vo['links'] == ''): ?><dl class="layui-nav-child"><?php endif; if(is_array($tptops) || $tptops instanceof \think\Collection || $tptops instanceof \think\Paginator): $k = 0; $__LIST__ = $tptops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k;if($vo['id'] == $vs['tid']): if($vs['shows'] == 1): ?><dd><a <?php if($vs['blank'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo $vs['links']; ?>"><?php echo $vs['name']; ?></a></dd><?php endif; endif; endforeach; endif; else: echo "" ;endif; if($vo['links'] == ''): ?></dl><?php endif; ?>
				</li>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		
		<div class="tpt-addtop tpt-none-1200 tpt-none-1920">
		
		<div id="menu_button">
		<i style="cursor: pointer;font-size: 32px;position: relative;top: -5px;" class="layui-icon">&#xe65f;</i>
		</div>
		
		<div class="tpt-add">
		<a href="__ROOT__/user/set.html">
		<i style="color: #FFFFFF;font-size: 30px;position: relative;top: -5px;" class="layui-icon">&#xe620;</i>
		</a>
		</div>

		</div>

		<div class="tpt-status">
		<?php if(\think\Session::get('validate') != ''): ?>
		<a class="tpt-avatar" href="__ROOT__/home/<?php echo $tptuser['userid']; ?>.html"><img src="<?php echo $tptuser['userhead']; ?>"></a>
		<a class="ava tpt-none-768 tpt-none-1024 tpt-none-1200" href="__ROOT__/home/<?php echo $tptuser['userid']; ?>.html"><?php echo $tptuser['username']; ?></a>
		<a class="tpt-none-768 tpt-none-1024 tpt-none-1200"><?php if($tptuser['userid'] == 1): ?>
<em>管理员</em>
<?php else: if($tptuser['point'] >= config('point.GRADE_AVIP') and $tptuser['point'] < config('point.GRADE_BVIP')): ?>
<em><?php echo config('point.GRADE_CVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_DVIP') and $tptuser['point'] < config('point.GRADE_EVIP')): ?>
<em><?php echo config('point.GRADE_FVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_GVIP') and $tptuser['point'] < config('point.GRADE_HVIP')): ?>
<em><?php echo config('point.GRADE_IVIP'); ?></em>
<?php endif; if($tptuser['point'] >= config('point.GRADE_JVIP')): ?>
<em><?php echo config('point.GRADE_KVIP'); ?></em>
<?php endif; endif; ?></a>
		<?php if($tptuser['reply'] != 0): ?>
		<a class="tpt-message" href="__ROOT__/user/message.html"><i class="iconfont">&#xe60a;</i><span><?php echo $tptuser['reply']; ?></span></a>
		<?php endif; ?>
		<a class="avb tpt-none-768 tpt-none-1024" href="__ROOT__/user/set.html"><i class="layui-icon" style="font-size: 24px;margin-right: 5px;float: left;position: relative;top: -1px;">&#xe620;</i>设置</a>
		<a class="avb tpt-none-768 tpt-none-1024 logout" href="javascript:void(0)"><i class="iconfont" style="font-size: 24px;margin-right: 5px;float: left;position: relative;top: 1px;">&#xe68e;</i>退出</a>
		<?php else: if(config('web.WEB_LOG') == 1): ?><a href="__ROOT__/user/login.html">登录</a><a href="__ROOT__/user/reg.html">注册</a><?php endif; if(config('web.WEB_LOG') == 3): ?><a class="login" href="javascript:void(0)"><i class="iconfont" style="font-size: 38px;float: left;position: relative;top: -2px;">&#xe606;</i></a><a href="__ROOT__/user/login.html">登录</a><a href="__ROOT__/user/reg.html">注册</a><?php endif; if(config('web.WEB_LOG') == 2): ?>
		<a class="login" href="javascript:void(0)"><i class="iconfont" style="font-size: 38px;margin-right: 15px;float: left;position: relative;top: -2px;">&#xe606;</i>立即登录</a>
        <?php endif; endif; ?>
		</div>
	</div>
</div>
<script>
layui.use('element', function(){
  var element = layui.element();
});
</script>
<script>
window.onresize = function(){
    var W = document.documentElement.clientWidth || document.body.clientWidth;
	if(W < 1008){
       $('#menu_nav').attr('class','layui-nav layui-nav-tree');
	   $("#menu_list").css("display", "none");
    }else{
       $('#menu_nav').attr('class','layui-nav');
	   $('#header').attr('class','tpt-header');
	   $('.layui-nav-item').attr('class','layui-nav-item');
    }
}
$(window).resize();
</script>
<script>
$("#menu_button").click(function(){
if($("#menu_list").css("display")=="none"){
$("#menu_list").show();
}else{
$("#menu_list").hide();
}
});
</script>

<link rel="stylesheet" href="__HOME__/css/user.css">
<div class="wp cl">
<div class="tpt-login cl">
<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
<ul class="layui-tab-title">
<li><a href="__ROOT__/user/login.html" class="jie-title">登录</a></li>
<li class="layui-this">注册</li>
</ul>
<div class="layui-tab-content">
<form class="layui-form layui-form-pane" method="post" style="padding: 10px 0 0 0;">
<div class="layui-form-item">
<label for="L_email" class="layui-form-label">注册邮箱</label>
<div class="layui-input-inline">
<input type="text" name="usermail" required lay-verify="required|email|emails|emailss" autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label for="L_username" class="layui-form-label">会员昵称</label>
<div class="layui-input-inline">
<input type="text" name="username" required lay-verify="required|names" autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label for="L_pass" class="layui-form-label">注册密码</label>
<div class="layui-input-inline">
<input type="password" name="password" required lay-verify="required|pass" autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label for="L_repass" class="layui-form-label">确认密码</label>
<div class="layui-input-inline">
<input type="password" name="passwords" required lay-verify="required|pass" autocomplete="off" class="layui-input">
</div>
</div>
<div class="layui-form-item">
<label for="L_repass" class="layui-form-label">验证码</label>
<div class="layui-input-inline">
<input type="text" name="code" required lay-verify="required" autocomplete="off" class="layui-input">
</div>
</div>
<div class="" style="float: left;margin-bottom: 20px;">
<img src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" style="float:left; cursor:pointer;" alt="captcha" />
</div>
<div class="layui-form-item">
<button class="layui-btn" lay-submit="" lay-filter="login_reg">立即注册</button>
</div>
</form>
</div>
</div> 
</div>
</div>
<script type="text/javascript">
layui.use('form',function(){
var form = layui.form,
jq = layui.jquery;

form.verify({
emails: function(value){
if(value.length < 10){
return '邮箱必须大于10位';
}
}
,emailss: function(value){
if(value.length > 32){
return '邮箱必须小于32位';
}
}
,names: function(value){
if(value.length > 12){
return '昵称必须小于12位';
}
}
,pass: [/(.+){6,12}$/, '密码必须6到12位']
,content: function(value){
layedit.sync(editIndex);
}
});
form.on('submit(login_reg)', function(data){
loading = layer.load(2, {
shade: [0.2,'#000']
});
var param = data.field;
jq.post('<?php echo url("index/login/reg"); ?>',param,function(data){
if(data.code == 200){
layer.close(loading);
layer.msg(data.msg, {icon: 1, time: 1000}, function(){
location.href = '__ROOT__/user/login.html';
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
<div class="tpt-footer footer tpt-mat-30 cl">
	<div class="tpt-wp cl">
		<div class="tpt-md-1">
			<div class="tpt-mds">
				<p class="bq">
Copyright© 2014-2017
					<span class="pipe">|</span>
                    <a class="banquan" target="_blank" href="<?php echo config('web.WEB_COM'); ?>">Powered by <?php echo config('web.WEB_AUT'); ?></a>
					<span class="tpt-none-768 tpt-none-1024">
					<span class="pipe">|</span>
					<a href="http://www.miitbeian.gov.cn/" target="_blank"><?php echo config('web.WEB_ICP'); ?></a>
					<span class="pipe">|</span>
					<a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo config('web.WEB_QQ'); ?>&site=qq&menu=yes" target="_blank">QQ:<?php echo config('web.WEB_QQ'); ?></a>
					</span>
				</p>
			</div>
		</div>
	</div>
</div>
<div id="zanzhus" class="tpt-zan cl" style="display: none;">
<div class="layui-tab">
  <h2>感谢您的支持，我会继续努力的</h2>
  <div class="layui-tab-content">
    <div class="layui-tab-item layui-show"><img src="__HOME__/img/alipay.png"></div>
    <div class="layui-tab-item"><img src="__HOME__/img/weipay.png"></div>
	<p>扫码打赏，账号：晴天（*洪）</p>
  </div>
  <ul class="layui-tab-title">
    <li class="layui-this"><span class="zanbox"></span><img src="__HOME__/img/ali.jpg" alt="支付宝"></li>
    <li><span class="zanbox"></span><img src="__HOME__/img/wei.jpg" alt="微信"></li>
  </ul>
  <h3>打开支付宝或微信扫一扫，即可进行扫码打赏哦</h3>
</div>
</div>
<script type="text/javascript">
layui.use(['layer','jquery','element'], function(){
  var layer = layui.layer,
  element = layui.element,
  jq = layui.jquery;
  jq('.logout').click(function(){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    jq.getJSON('<?php echo url("index/login/logout"); ?>',function(data){
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
  jq('.login').click(function(){
   layer.open({
		type: 2,
		title: 'QQ登陆',
		maxmin: false,
		shadeClose: true,
		shade: 0.1,
		area: ['500px', '500px'],
		content: '<?php echo config("web.WEB_COM"); ?>/user/qq.html',
		end: function(){location.reload();}
	});
  });
  jq('#zanzhu').click(function(){    
       layer.open({
			type:1,
			title:'',
			shadeClose:true,
			area:['450px','400px'],
			content:$('#zanzhus')
	   });
  });
  jq('#tougao').click(function(){
	var exp = "<?php echo \think\Session::get('validate'); ?>"
	if(exp == ""){
	    layer.msg('亲！请登录', {icon: 2, anim: 6, time: 1000});
	}else{
		if('<?php echo config("web.WEB_ADD"); ?>' == 1 && '<?php echo $tptuser['status']; ?>' == 1){
		   location.href = '__ROOT__/add.html';
		}else{
		   layer.msg('已关闭投稿', {icon: 2, anim: 6, time: 1000});
		}
	}
  });
})
</script>
</body>
</html>