<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:35:"./template/default/index_index.html";i:1509506491;s:36:"./template/default/index_header.html";i:1506500650;s:37:"./template/default/public_gradeh.html";i:1504321935;s:36:"./template/default/school_right.html";i:1509352143;s:36:"./template/default/index_footer.html";i:1509091689;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<title><?php echo config('web.WEB_TIT'); ?></title>
<meta name="keywords" content="<?php echo config('web.WEB_KEY'); ?>">
<meta name="description" content="<?php echo config('web.WEB_DES'); ?>">
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

<link rel="stylesheet" href="__HOME__/css/blog.css">
<link rel="stylesheet" href="__HOME__/css/right.css">
<div class="tpt-wp cl">
<div class="tpt-ml-7">
<div class="tpt-con1">
<?php if(config('web.WEB_FTP') != 0): ?>
<div class="tpt-banner cl">
<div class="layui-carousel" id="banner">
  <div carousel-item>
    <?php if(is_array($tptb) || $tptb instanceof \think\Collection || $tptb instanceof \think\Paginator): $i = 0; $__LIST__ = $tptb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div><a target="_blank" href="<?php echo $vo['links']; ?>"><img src="__UPLO__<?php echo $vo['pic']; ?>" style="height: 320px;"></a></div>
	<?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<script>
layui.use('carousel', function(){
  var carousel = layui.carousel;
  carousel.render({
    elem: '#banner'
    ,width: '100%'
    ,height: '320px'
    ,interval: 4000
    ,arrow: 'always'
  });
});
</script>
</div>
<?php endif; ?>

<div class="tpt-dingzhi tpt-none-768 tpt-none-1024 tpt-none-1200 cl">
<h3>顶置推荐</h3>
<ul>
<li>
<a href="/thread/7.html">
<img src="/uploads/20170522/058eea7197f4c811b2d86e48f4058191_thumb_240_160.jpg" alt="计葵生：从陆金所看金融科技的发展要点与未来">
</a>
<h2><a href="/thread/7.html" title="计葵生：从陆金所看金融科技的发展要点与未来">计葵生：从陆金所看金融科技的发展要点与未来</a></h2>
</li>
<li>
<a href="/thread/3.html">
<img src="/uploads/20170522/bcbfb625b22faf777e1859cda801d29f_thumb_240_160.jpg" alt="ZEALER布局短视频MCN，优质的泛科技视频都在这里">
</a>
<h2><a href="/thread/3.html" title="ZEALER布局短视频MCN，优质的泛科技视频都在这里">ZEALER布局短视频MCN，优质的泛科技视频都在这里</a></h2>
</li>
<li>
<a href="/thread/2.html">
<img src="/uploads/20170522/933f738aa5481a9d007b802351b17cb8_thumb_240_160.jpg" alt="AAAI协会主席 Rao：中国AI研究进步喜人，创业风气无处不在 | GAIR 2017">
</a>
<h2><a href="/thread/2.html" title="AAAI协会主席 Rao：中国AI研究进步喜人，创业风气无处不在 | GAIR 2017">AAAI协会主席 Rao：中国AI研究进步喜人，创业风气无处不在 | GAIR 2017</a></h2>
</li>
</ul>
</div>

<div class="tpt-none-768 tpt-none-1024 tpt-none-1200 tpt-bottom"></div>

<ul class="tpt-list">
<h3>最新文章</h3>
<li class="tpt-list-li">
<div class="mod-angle">热</div><a href="/thread/8.html" class="tpt-list-avatar">
<img src="/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a_thumb_240_160.jpg" alt="从 I/O 大会看谷歌如何推动 VR/AR 的生态发展和技术边界 | Google I/O 2017">
</a>
<h2 class="tpt-tip"><a href="/thread/8.html">从 I/O 大会看谷歌如何推动 VR/AR 的生态发展和技术边界 | Google I/O 2017</a></h2>
<p>
<span><a href="/home/8.html"><img src="/uploads/20170401/7.jpg" alt="再贱就再见">再贱就再见</a></span>
<span class="tpt-none-768">2017-05-22 03:28:17</span>
<span class="tpt-list-hint" style="padding-right: 0;"> 
<i class="iconfont" title="回答">&#xe655;</i> 21<i class="iconfont" title="人气">&#xe6c0;</i> 1289</span>
</p>
<p class="tpt-none-768">
谷歌的故事一切还要从说起三年前大会上推出纸盒眼镜你可以自己拼装把手机放进去观看度的视频或是玩一款小游戏当时所有人都以为谷歌在跟大家开玩笑后来...
</p>
<p style="padding-top: 0;line-height: 20px;">
<span class="tpt-none-768 tpt-none-1024 tpt-none-1200 y" style="padding-right: 0;"><a href="/view/6.html">虚拟现实</a></span>
</p>
</li>
</ul>
<div class="pages"><?php echo $tptcs->render(); ?></div>
</div>
</div>

<div class="tpt-mr-3">
<div class="tpt-con2">
<div class="tpt-stat cl">
<div class="tpt-tsearch cl">
<form action="/search.html">
<input placeholder="搜索" type="text" name="ks" value="" required="" lay-verify="required" autocomplete="off">
<button><i class="iconfont"></i></button>
</form>
</div>
<div class="tpt-stat-list cl">
<ul>
<li><span>12</span>驾校总数</li>
<li style="border-left: 1px solid #f1f1f1;border-right: 1px solid #f1f1f1;"><span>211</span>会员总数</li>
<li><span>42</span>评论总数</li>
</ul>
</div>
<div class="tpt-grid-org cl">
<h2>欢迎打赏投稿</h2>
<a style="border: 1px solid #5FB878;background-color: #5FB878;color: #FFF;padding: 0 28px;" id="tougao" class="layui-btn">我要投稿</a>
<a style="border: 1px solid #FF5722;background-color: #FF5722;color: #FFF;padding: 0 28px;" id="zanzhu" class="layui-btn">我要打赏</a>
</div>
</div>

<?php if(config('web.WEB_FTJ') != 0): ?>
<div class="tpt-sidebar cl">
	<h3>热门推荐</h3>
	<ul class="tpt-c cl">
		<?php if(is_array($tptf) || $tptf instanceof \think\Collection || $tptf instanceof \think\Paginator): $i = 0; $__LIST__ = $tptf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li><a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a><span><i class="iconfont" title="人气">&#xe6c0;</i> <?php echo $vo['view']; ?><span></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<?php endif; if(config('web.WEB_FJX') != 0): ?>
<div class="tpt-sidebar cl">
	<h3>精选内容</h3>
	<ul class="tpt-c cl">
	    <?php if(is_array($tpte) || $tpte instanceof \think\Collection || $tpte instanceof \think\Paginator): $i = 0; $__LIST__ = $tpte;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li><a href="__ROOT__/thread/<?php echo $vo['id']; ?>.html"><?php echo $vo['title']; ?></a><span><i class="iconfont" title="人气">&#xe6c0;</i> <?php echo $vo['view']; ?><span></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<?php endif; ?>
</div>
</div>

</div>
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
<!-- <button class="layui-btn layui-btn-danger zanzhu">打赏支持</button>
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
</div> -->
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
  jq('.zanzhu').click(function(){    
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