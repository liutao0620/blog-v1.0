<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/Public/favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/H-ui.login.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/Admin/skin/yellow/skin.css" id="skin"/>
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" />


<title><?php echo $configinfo['site_name']?></title>
<meta name="keywords" content="<?php echo $configinfo['site_keyword']?>">
<meta name="description" content="<?php echo $configinfo['description']?>">
<script type="text/javascript" src="/Public/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/Js/dialog/layer.js"></script>
<script type="text/javascript" src="/Public/Js/dialog.js"></script>

<script type="text/javascript" src="/Public/Admin/js/login.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="/Public/Js/ajaxfileupload.js"></script>
<script type="text/javascript" src="/Public/Js/jquery.base64 .js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
</head> 
<body>

<article class="page-container">
	<form class="form form-horizontal" id="form-rule-add" method="post" action="">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['type_name'];?>" placeholder="请输入栏目名称" id="type_name" name="type_name">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目类型：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input type="radio" name="model_id" value="1" <?php echo $info['model_id'] == 1 ? 'checked':''?>>
					<label for="model_id-2">文章模型</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="model_id-2" name="model_id" value="2" <?php echo $info['model_id'] == 2 ? 'checked':''?>>
					<label for="model_id-2">独立模型</label>
				</div>

				<div class="radio-box">
					<input type="radio" id="model_id-2" name="model_id" value="3" <?php echo $info['model_id'] == 3 ? 'checked':''?>>
					<label for="model_id-2">作品展示</label>
				</div>
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">上级分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
		<select class="select" name="p_id" size="1">
			<option value="0" >顶级分类</option>
			<?php foreach($list as $k => $v){?>
			                <?php if(!in_array($v['id'],$ids)):?>
							<option value="<?php echo $v['id']?>" <?php echo $v['id'] == $info['p_id'] ? 'selected':''?>><?php  echo str_repeat('--',$v['lev']*4).$v['type_name'];?>
							</option>
						<?php endif ?>
			<?php }?>				
					</select>
		</span> </div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目关键词：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['type_keywords']?>" placeholder="请输入栏目关键词" id="type_keywords" name="type_keywords">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>栏目描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="type_description" style="width: 100%;height: 150px;"><?php echo $info['type_description']?></textarea>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $info['order_by']?>" placeholder="请输入栏目名称" id="order_by" name="order_by">
			</div>
		</div>



		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input type="hidden" value="<?php echo $info['id'];?>" name="id"/>

				<a class="btn btn-primary radius"   onclick="_form()" >&nbsp;&nbsp;提交&nbsp;&nbsp;</a>
			</div>
		</div>
</form>	


</article>

<script type="text/javascript">
	var SCOPE = {
    'submit_url' : "/admin/type/save",
    'jump_url': "/admin/type/index",
  };
	$(function(){
		$('.skin-minimal input').iCheck({
			checkboxClass: 'icheckbox-blue',
			radioClass: 'iradio-yellow',
			increaseArea: '20%'
		});
		
	});
	
</script>

</body>
</html>