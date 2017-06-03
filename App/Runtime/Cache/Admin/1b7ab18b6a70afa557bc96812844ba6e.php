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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>分享管理 <span class="c-gray en">&gt;</span> 分享列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form method="get">
        <div class="text-c">
            <input type="text" class="input-text" style="width:250px" placeholder="输入链接地址" id="" name="git_url" value="">
            <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="_add('添加友情链接','/admin/share/add.html','400','200')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加分享链接</a></span>  </div>
        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th scope="col" colspan="10">分享列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th>链接地址</th>
                <th width="130">加入时间</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
             <?php foreach($list as $v){?>           
                        <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['git_url']?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['create_time'])?></td>
                <td class="td-manage">
                    <a title="编辑" href="javascript:;" onclick="_edit('分享编辑','/admin/share/edit/id/<?php echo $v['id']?>.html','400','200')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除" href="javascript:;" onclick="_delete(this,<?php echo $v['id']?>,'/admin/share/delete')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>

                </td>
            </tr>
            <?php }?>              
             </tbody>
        </table>
        <span class="r pages mt-10"> </span>
    </form>
</div>
<script type="text/javascript">
    var SCOPE = {
    'submit_url' : "/admin/share/save",
    'jump_url': "/admin/share/index",
  };
</script>


</body>
</html>