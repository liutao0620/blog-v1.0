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
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/login.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/H-ui.admin.js"></script>

</head> 
<body>
<article class="page-container">
    <form class="form form-horizontal" id="form-share-add" method="post" >

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>链接地址：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" autocomplete="off" value="<?php echo $info['git_url']?>"   name="git_url">
            </div>
        </div>
        <div class="row cl">
        <input type='hidden' name="id" value="<?php echo $info['id'] ?>"></input>
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                
                <button class="btn btn-primary radius" type="button" value="" onclick="_form()">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</article>


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });        
    });
   var SCOPE = {
    'submit_url' : "/admin/share/save",
    'jump_url': "/admin/share/index",
  }; 
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>