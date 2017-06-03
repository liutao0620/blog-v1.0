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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="/admin/rule/rulelist.html" method="get">
		<div class="text-c">
			<input type="text" value=""  class="input-text" style="width:250px" placeholder="输入权限名称" id="" name="search">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜权限</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="_add('添加权限规则','/admin/menu/add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加权限</a>
		</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
		<tr>
			<th scope="col" colspan="7">权限节点</th>
		</tr>
		<tr class="text-c">
			<th width="40">ID</th>
			<th width="150">权限名称</th>
			<th>规则标识</th>
			<th width="70">状态</th>
			<th width="70">操作</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach($list as $v){?>
			<tr class="text-c">
			<td><?php echo $v['id']?></td>
			<td align="left" style="text-align: left; padding-left: 10px">
				|-<?php echo str_repeat('--',$v['lev']*4).$v['title']?></td>
			<td><?php echo $v['name']?></td>
			<td><?php echo $v['status']==1?'启用':'禁用'?></td>
			<td>
				<a title="编辑" href="javascript:;"
				   onclick="_edit('角色编辑','/admin/menu/edit/id/<?php echo $v['id']?>.html','','510')" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="删除" href="javascript:;" onclick="_delete(this,<?php echo $v['id']?>,'/admin/menu/delete')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
			</td>
		    </tr>
		<?php }?>		
				</tbody>
	</table>
</div>



<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
var SCOPE = {
    'submit_url' : "/admin/menu/delete",
    'jump_url': "/admin/menu/index",
  }; 
</script>

</body>
</html>