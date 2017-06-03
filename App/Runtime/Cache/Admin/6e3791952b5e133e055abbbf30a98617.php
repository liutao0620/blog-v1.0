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
<!-- <?php  echo '<pre>'; echo print_r($list); echo '</pre>'; ?> -->
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form action="/admin/content/index.html" method="get">
		<div class="text-c">
			<input type="text" value=""  class="input-text" style="width:250px" placeholder="输入文章关键词" id="" name="search">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜文章</button>
		</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="_add('添加文章','/admin/content/add.html','900','')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加文章</a>
		</span>
	</div>
	<table class="table table-border table-bordered table-bg">
		<thead>
		<tr>
			<th scope="col" colspan="10">普通文章列表</th>
		</tr>
		<tr class="text-c">
			<th width="40">ID</th>
			<th>文章标题</th>
			<th width="80">所属栏目</th>
			<th width="60">作者</th>
			<th width="60">阅读量</th>
			<th width="60">点赞量</th>
			<th width="60">评论量</th>
			<th width="60">推荐</th>
			<th width="130">创建时间</th>
			<th width="100">操作</th>
		</tr>
		</thead>

		<tbody>
		<?php foreach($list as $v){?>
				<tr class="text-c">
			<td><?php echo $v['id']?></td>
			<td>
			<?php
 if(!empty($v['image'])){ echo $v['title'].'&nbsp;&nbsp;<font color="orange">[图]</font>'; }else{ echo $v['title']; } ?>
			</td>
			<th><?php echo $v['type_name']?></th>
			<td><?php echo $v['author']?></td>
			<td><?php echo $v['reading_num']?></td>
			<td><?php echo $v['laud_num']?></td>
			<td><?php echo $v['comment_num']?></td>
			<td class="td-status"><span class="label <?php echo $v['is_top'] == 1 ? 'label-success' : 'label-defaunt';?> radius"><?php echo $v['is_top']==1?'是':'否'?></span></td>
			<td><?php echo date("Y-m-d H:i:s",$v['create_time'])?></td>
			<td class="td-manage">
				<a title="置顶" href="javascript:;" onclick="content<?php echo $v['is_top'] == 1 ? 'NoTop':'Top'?>(this,<?php echo $v['id']?>)" class="ml-5" style="text-decoration:none">
					<i class="Hui-iconfont"><?php echo $v['is_top'] ==1 ? '&#xe699;': '&#xe698;'?></i>
				</a>
				<a title="编辑" href="javascript:;" onclick="_edit('角色编辑','/admin/content/edit/id/<?php echo $v['id']?>.html','900','')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="删除" href="javascript:;" onclick="_delete(this,<?php echo $v['id']?>,'/admin/content/deleteById')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
			</td>
		</tr>
		<?php }?>
				
		</tbody>
	</table>
	
	<span class="r pages mt-10"><?php echo $page?>&nbsp;&nbsp;<font size="3">共有[<?php echo $count?>]条记录，&nbsp;共有[<?php echo $pages?>]页</font></span>
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

/*置顶*/
function contentTop(obj,id){
	
	layer.confirm('确认要置顶吗？',function(){
		$.ajax({
			type:'post',
			url:"/admin/content/contentTop",
			dataType:'json',
			data:{"id":id,"top":1},
			success:function(data){
				if(data.status == 1){					
					dialog.msg(data.message);
				}else{
					dialog.msg(data.message);
				}
			}
		});
	});
}

/*取消置顶*/
function contentNoTop(obj,id){
	
	layer.confirm('确认取消置顶吗？',function(){
		$.ajax({
			type:'post',
			url:"/admin/content/contentTop",
			dataType:'json',
			data:{"id":id,"top":0},
			success:function(data){
				if(data.status == 1){					
					dialog.msg(data.message);
				}else{
					dialog.msg(data.message);
				}
			}
		});
	});
}
var SCOPE = {
    
    'jump_url': "/admin/content/index",
  };
</script>

</body>
</html>