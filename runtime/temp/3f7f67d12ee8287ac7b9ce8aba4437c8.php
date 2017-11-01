<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:41:"./application/admin\view\school_edit.html";i:1509501065;s:42:"./application/admin\view\index_header.html";i:1507643832;s:42:"./application/admin\view\index_footer.html";i:1504421376;}*/ ?>
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
.layui-upload-img {width: 92px;height: 92px;margin: 0 10px 10px 0;}
.img-del{color: #fd3d00;position: relative;top: -45px;left: -20px;font-size: 20px;cursor: pointer;background: #fff;border-radius: 50%}
.imgbox{display: inline-block;}
</style>
<body>
<div class="fly-panel fly-panel-user">
<div class="tpt—admin">
<fieldset class="layui-elem-field layui-field-title">
<legend>添加内容</legend>
</fieldset>
<form class="layui-form">
  <input type="hidden" name="id" value="<?php echo $tptc['id']; ?>">
  <div class="layui-form-item">
    <label class="layui-form-label">标题</label>
    <div class="layui-input-block">
      <input type="text" name="title" value="<?php echo $tptc['title']; ?>" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
    </div>
  </div>
  
  <div class="layui-form-item">
    <label class="layui-form-label">形象图</label>
	  <button type="button" class="layui-btn" id="imag"><i class="layui-icon">&#xe67c;</i>上传形象图</button>
    <input type="hidden" name="pic" class="layui-input" style="position: absolute;left: 0;top: 0;" value="<?php echo $tptc['pic']; ?>">
    <div class="layui-input-block">
    <div class="layui-upload-list">
     <?php if($tptc['pic'] == null): ?>
     <div class="imgbox">
      <img class="layui-upload-img" id="demo1" src="<?php echo $tptc['pic']; ?>">
     </div> 
     <?php endif; ?>
    </div>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">场景图</label>
    <button type="button" class="layui-btn" id="pics">场景图上传</button> 
    <div class="layui-input-block">
      <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
        预览图：
        <div class="layui-upload-list" id="demo2">
          <?php if(isset($imgsarr)): if(is_array($imgsarr) || $imgsarr instanceof \think\Collection || $imgsarr instanceof \think\Paginator): $i = 0; $__LIST__ = $imgsarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
              <div class="imgbox">
                <img src="<?php echo $vo; ?>" class="layui-upload-img"><i class="layui-icon img-del">&#x1007;</i>
              </div>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
        <input type="hidden" name="imgs" class="layui-input" value="<?php echo $tptc['imgs']; ?>">
      </blockquote>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">联系人</label>
    <div class="layui-input-block">
      <input type="text" name="name" value="<?php echo $tptc['name']; ?>" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">联系电话</label>
    <div class="layui-input-block">
      <input type="tel" name="phone" value="<?php echo $tptc['phone']; ?>" lay-verify="phone" placeholder="电话号码" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">Q Q</label>
    <div class="layui-input-block">
      <input type="text" name="qq" value="<?php echo $tptc['qq']; ?>" lay-verify="required|number" placeholder="QQ号码" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">联系地址</label>
    <div class="layui-input-block">
      <input type="text" name="address" value="<?php echo $tptc['address']; ?>" required lay-verify="required" placeholder="必填内容" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">内容</label>
    <div class="layui-input-block">
      <textarea id="textarea" name="content" required lay-verify="required" style="height:500px;width: 100%;"><?php echo $tptc['content']; ?></textarea>
    </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
	    <button class="layui-btn" lay-submit="" lay-filter="school_edit">立即提交</button>
      <button class="layui-btn layui-btn-primary" onclick="history.go(-1)">返回</button>
    </div>
  </div>

</form>
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
  jq = layui.jquery,
  str =$('input[name=imgs]').val();
  var arr =new Array();
  upload.render({
    url: '<?php echo url("upload/upimage"); ?>'
    ,elem:'#imag'
    ,before: function(input){
      loading = layer.load(2, {
        shade: [0.2,'#000']
      });
      input.preview(function(index, file, result){
        $('#demo1').attr('src', result);
      });
    }
    ,done: function(res){
      layer.close(loading);
      jq('input[name=pic]').val(res.path);
      layer.msg(res.msg, {icon: 1, time: 1000});
    }
  }); 
  
  upload.render({
    elem: '#pics'
    ,url: '<?php echo url("upload/upimage"); ?>'
    ,multiple: true
    ,before: function(obj){
      //预读本地文件示例，不支持ie8
      obj.preview(function(index, file, result){
        $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
      });
    }
    ,done: function(res){
      //上传完毕
      if(str.length == 0){
        arr.push(res.path);
        str = arr.join(',');
      }else{
        str =str+","+res.path;
      }
      jq('input[name=imgs]').val(str);
    }
  });

  form.on('submit(school_edit)', function(data){
    loading = layer.load(2, {
      shade: [0.2,'#000']
    });
    var param = data.field;
    jq.post('<?php echo url("school/edit"); ?>',param,function(data){
      if(data.code == 200){
        layer.close(loading);
        layer.msg(data.msg, {icon: 1, time: 1000}, function(){
          location.href = '<?php echo url("school/index"); ?>';
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
<script type="text/javascript">
  $(function(){
    $(".img-del").click(function(e){
      e.preventDefault();
      var src=$(this).prev('img').attr('src'),
          imgs=$("input[name=imgs]").val(),
          $this=$(this),
          tag=",";
          $.ajax({
            url:'<?php echo url("school/delimg"); ?>',
            type:"post",
            data:{src:src},
            dataType:"json",
            success:function(data){
              if(data == 1){
                if(imgs.indexOf(tag) !== -1){
                  if($this.parent('.imgbox').index() == 0){
                    srcurl=src+tag;
                  }else{
                    srcurl=tag+src;
                  }
                  delimg=imgs.replace(srcurl,'');
                }else{
                  srcurl=src;
                  delimg=imgs.replace(srcurl,'');
                }
                $("input[name=imgs]").val(delimg);
                $this.parent('.imgbox').remove();
              }else{
                layer.msg("系统有误", {icon: 2,anim: 6, time: 1000});
              }
            },
            error:function(data){
              layer.msg("删除失败", {icon: 2,anim: 6, time: 1000});
            }
          })
          
    })
  })
</script>
</div>
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