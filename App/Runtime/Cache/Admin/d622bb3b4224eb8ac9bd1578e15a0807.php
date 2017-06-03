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
	<form class="form form-horizontal" id="form-rule-add"  >
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入文章标题" id="title" name="title">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>选择标签：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<dl class="permission-list">
					<dt>
						<label>
							<input type="checkbox" value="1"  id="user-Character-1">
							请选择标签</label>
					</dt>
					<dd>
						<dl class="cl permission-list2">

							<dd>
								<?php foreach($info as $v){?>						
									<label class="">
									<input type="checkbox" value="<?php echo $v['id']?>" name="tag_ids[<?php echo $v['id']?>]" id="user-Character-1-0-0"><?php echo $v['tag_name']?></label>
								<?php }?>					
							</dd>

						</dl>
					</dd>
				</dl>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">文章封面：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
            
	            <div class="choosePic">  
	                <input type="file" id="Filedata" name="Filedata" class="UploadImg" multiple accept="image/*" >  
	                <input id="file_upload_image" name="image" type="hidden" multiple="true" value="">
	            </div>  
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>预览图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<img id="yulan" src="#">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>上级分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
		<select class="select" name="type_id" size="1">
						<?php foreach($list as $k => $v){?>
							<option value="<?php echo $v['id'] ?>"><?php echo str_repeat('--',$v['lev']*4).$v['type_name']?></option>
						<?php }?>	
					</select>
		</span> </div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">编辑作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="author" name="author">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea id="editor" style="height: 500px;" name="content"></textarea>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<button class="btn btn-primary radius" type="button" value="" onclick='_form()'>&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>



<!--引入编辑器-->
<script type="text/javascript" charset="utf-8" src="/Public/Js/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Js/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/Js/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
	var ue = UE.getEditor('editor');
	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}
	});

	$('.choosePic').change(function(){  
    $.ajaxFileUpload({  
        url: '/admin/image/oneFileupload',  
        type: 'post',  
        secureuri: false, //一般设置为false  
        fileElementId: 'Filedata', // 上传文件的id、name属性名  
        dataType: 'JSON',  
        success:function(list){ 
			var obj = JSON.parse(list);//由JSON字符串转换为JSON对象
            if(list.status==0){ 
                dialog.msg(list.message);                   
            } else {            	
                $("#file_upload_image").attr('value',obj.data);
                $("#yulan").attr('src','/Public/Uploads/'+obj.data); 
                                        
            }  
        } 
        
    });  
});  
	var SCOPE = {
    'submit_url' : "/admin/content/add",
    'jump_url': "/admin/content/index",
  };
	
			
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>