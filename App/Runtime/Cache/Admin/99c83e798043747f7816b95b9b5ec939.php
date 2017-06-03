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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form class="form form-horizontal" id="form-rule-add" >
        <div id="tab-system" class="HuiTab">
            <div class="tabBar cl">
                <span>基本设置</span>
                <span>安全设置</span></div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站名称：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-title"  value="<?php echo $info['site_name']?>" class="input-text" name="site_name">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站跟地址：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-title"  value="<?php echo $info['site_url']?>" class="input-text" name="site_url">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站关键词：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-title"  value="<?php echo $info['site_keyword']?>" class="input-text" name="site_keyword">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站版本：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-version"  value="<?php echo $info['site_version']?>" class="input-text" name="site_version">
                    </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-description"  value="<?php echo $info['description']?>" class="input-text" name="description">
                    </div>
                </div>


                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>底部版权信息：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-copyright"  value="<?php echo $info['copyright_information']?>" class="input-text" name="copyright_information">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">备案号：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" id="website-icp" placeholder="京ICP备00000000号" value="<?php echo $info['case_number']?>" class="input-text" name="case_number">
                    </div>
                </div>
<!--                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">统计代码：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea"></textarea>
                    </div>
                </div>-->
            </div>
            <div class="tabCon">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">允许访问后台的IP列表：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="allow_ip" id=""><?php echo $info['allow_ip']?></textarea>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">后台登录失败最大次数：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="<?php echo $info['failure_number']?>" id="" name="failure_number" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button  class="btn btn-primary radius" type="button" onclick="_form()"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
            </div>
        </div>
    </form>
</div>


<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });
    $.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
    var SCOPE = {
    'submit_url' : "/admin/base/add",
    'jump_url': "/admin/base/index",
  };    
</script>
<!--/请在上方写此页面业务相关的脚本-->

</body>
</html>