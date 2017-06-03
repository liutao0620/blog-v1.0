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
    <form method="get">
    <div class="text-c">
        <input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="username" value="">
        <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="_add('添加管理员','/admin/admin/add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>  </div>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th scope="col" colspan="9">员工列表</th>
        </tr>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="" value=""></th>
            <th width="40">ID</th>
            <th width="150">登录名</th>
            <th>角色</th>
            <th width="130">加入时间</th>
            <th width="100">是否已启用</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($list as $v){?>           
                        <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['username']?></td>
            
                <td><?php echo $v['role_title']?></td>
            
                <td><?php echo date('Y-m-d H:i:s',$v['create_time'])?></td>
                <td class="td-status">
                <span class="label <?php echo $v['status'] == 1 ? 'label-success' : '';?> radius"><?php echo $v['status']==1?'已启用':'已禁用'?></span>
                </td>
                
                <td class="td-manage">
                <a style="text-decoration:none" onClick="content<?php echo $v['status'] == 1 ? 'NoTop':'Top'?>(this,<?php echo $v['id']?>)" href="javascript:;"><i class="Hui-iconfont"><?php echo $v['status'] ==1 ? '&#xe699;': '&#xe698;'?></i></a>
                    <a title="编辑" href="javascript:;" onclick="_edit('分享编辑','/admin/admin/edit/id/<?php echo $v['id']?>.html','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除" href="javascript:;" onclick="_delete(this,<?php echo $v['id']?>,'/admin/admin/delete')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>

                </td>
            </tr>
            <?php }?>            
                </tbody>
    </table>
    </form>
</div>

<script type="text/javascript">
function contentTop(obj,id){
    
    layer.confirm('确认要启用吗？',function(){
        $.ajax({
            type:'post',
            url:"/admin/admin/changestatus",
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
    
    layer.confirm('确认要禁用吗？',function(){
        $.ajax({
            type:'post',
            url:"/admin/admin/changestatus",
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
    'submit_url' : "/admin/admin/save",
    'jump_url': "/admin/admin/index",
  }; 
    
</script>

</body>
</html>