<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:36:"./template/default/index_school.html";i:1509523439;s:36:"./template/default/index_header.html";i:1506500650;s:37:"./template/default/public_gradeh.html";i:1504321935;s:36:"./template/default/index_footer.html";i:1509508525;}*/ ?>
<!DOCTYPE html>
<html>
<head>  
<title><?php echo config('web.WEB_AUT'); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
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

<link rel="stylesheet" href="__HOME__/css/thread.css">
<link rel="stylesheet" href="__HOME__/css/right.css">
<link rel="stylesheet" href="__ADMIN__/wangEditor/css/wangEditor.min.css">
<script type="text/javascript" src="__ADMIN__/wangEditor/js/wangEditor.min.js"></script>
<style type="text/css">
.wangEditor-menu-container .menu-item a {padding: 12px 0;}
.wangEditor-menu-container .menu-item {height: 37px;width: 37px;}
.wangEditor-menu-container .menu-group {padding: 0;}
.wangEditor-container {border: 1px solid #e6e6e6;}
.pagination {margin: 0;}
.layui-form-item {margin: 15px 0;}
.wangEditor-container .wangEditor-txt img {max-width: 100%;height: auto;}
</style>
<div class="tpt-wp cl">
	<div class="tpt-md-1 cl">
		<div class="tpt-ml-3 tpt-block-768">
			<img src="/uploads/20170522/d2ce50908375898206cccbc610917155.jpg" style="width: 100%" />
		</div>
		<div class="tpt-mr-7">
		    <div class="content">
		    <div class="tpt-thread">		    
		    <h1>运销驾校</h1>
		    <div class="wangEditor-txt">
		    学校介绍： 国家级重点技工学校江西赣州育才学校位于千里赣江第一城、国家历史文化名城赣州市。学校占地面积100亩，建筑面积约为11万平方位于赣州市中心城区，东临市政府、体育中心、市图书馆、博物馆；西接中央生态公园、市游泳馆；北临黄金广场；南望赣州三中。学校环境清幽、绿树成荫、薰衣草似锦，是求知成才的理想之地。 &lt;div&gt; 江西赣州育才学校，始创于1988年。2003年6月，被江西省劳动和社会保障厅批准设立为&amp;ldquo;江西赣州育才学校&amp;rdquo;，成为江西省首家民办学校。省级综合性高层次民办技能培训院校。2009年又被赣</div>
		    <div class="detail-info cl">
		        <div class="cl">
		        <div class="tpt-md-2 tpt-mat-10">
					<span class=""><em style="font-style: normal;">联系人：</em></span>
					<span>李教练</span>
				</div>
				<div class="tpt-md-2 tpt-mat-10">
					<span class=""><em style="font-style: normal;">Q　Q：</em></span>
					<span class=""><em style="font-style: normal;font-size: 18px;color: #4f99cf">1679026896</em></span>
				</div>
				</div>
				<div class="cl">
		        <div class="tpt-md-2 tpt-mat-10">
					<span class=""><em style="font-style: normal;">手机号：</em></span>
					<span class=""><em style="font-style: normal;font-size: 18px;color: #FF9E3F">15007044397</em></span>
				</div>
				<div class="tpt-md-2 tpt-mat-10">
					<span class=""><em style="font-style: normal;">地　址：</em></span>
					<span class="">南城县沙州镇黄师银三角</span>
				</div>
				</div>
		    </div>	
		    </div>
		    </div>
		</div>
	</div>
	<div class="tpt-md-1 tpt-mat-10">
		<div class="content">
			<div id="pinglun" class="tpt-tag-box cl"><span>驾校风采</span></div>
			<div class="tpt-banner cl">
			<div class="layui-carousel" id="banner">
			  <div carousel-item> 
			     <div><a target="_blank" href=""><img src="/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a.jpg" style="height: 380px;"></a></div>
			     <div><a target="_blank" href=""><img src="/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a.jpg" style="height: 380px;"></a></div>
			     <div><a target="_blank" href=""><img src="/uploads/20170522/ca5c823d63ed0ee6be50e495c0f4511a.jpg" style="height: 380px;"></a></div>
			  </div>
			</div>
			<script>
			layui.use('carousel', function(){
			  var carousel = layui.carousel;
			  carousel.render({
			    elem: '#banner'
			    ,width: '100%'
			    ,height: '380px'
			    ,interval: 4000
			    ,arrow: 'hover'
			  });
			});
			</script>
			</div>
		</div>
		<div class="content tpt-mat-10">
			<div id="pinglun" class="tpt-tag-box cl"><span>在线报名</span></div>
			<form class="layui-form">
			<div class="layui-form-item">
		    <label class="layui-form-label">联系人</label>
		    <div class="layui-input-block">
			  <input type="text" name="name" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<label class="layui-form-label">联系电话</label>
			<div class="layui-input-block">
			  <input type="tel" name="phone" lay-verify="phone" placeholder="电话号码" autocomplete="off" class="layui-input">
			</div>
			</div>

			<div class="layui-form-item">
			<div class="layui-input-block">
			<button class="layui-btn" lay-submit="" lay-filter="school_add">立即提交</button>
			</div>
			</div>
			</form>
		</div>
		<div class="content tpt-mat-10">
		    <?php if(config('web.WEB_FHF') != 0): ?>
		    <div class="fly-panel detail-box">
			<div id="pinglun" class="tpt-tag-box cl"><span>发表评论</span></div>
			<div class="cmt-item2 layui-form layui-form-pane">
			<form>
			<input type="hidden" value="" name="mid">
			<div class="layui-form-item layui-form-text">
			<div class="layui-input-block">
			<textarea id="textarea" name="content" required lay-verify="content" style="height:150px;width: 100%;"></textarea>
			</div>
			</div>
			<div class="layui-form-item">
			<button class="layui-btn layui-btn-normal" lay-submit="" lay-filter="comment_add">提交评论</button>
			</div>
			</form>
			</div>
			<div class="tpt-tag-tit cl"><h2>0 个回复</h2></div>
			
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>                                                                           
<script type="text/javascript">
var editor = new wangEditor('textarea');
editor.config.uploadImgUrl = '<?php echo url("index/upload/doUploadPic"); ?>';
editor.config.uploadImgFileName = 'FileName';
var W = document.documentElement.clientWidth || document.body.clientWidth;
if(W < 1008){
	editor.config.menus = [
	'bold',
	'underline',
	'italic',
	'forecolor',
	'link',
	'fullscreen',
	];
}else{
	editor.config.menus = [
	'bold',
	'underline',
	'italic',
	'strikethrough',
	'forecolor',
	'link',
	'unlink',
	'emotion',
	'img',
	'insertcode',
	'fullscreen',
	];
}
editor.config.pasteText = true;
editor.create();
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
</body>
</html>