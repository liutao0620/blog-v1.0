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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>链接管理 <span class="c-gray en">&gt;</span> 链接列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form >
        <div class="text-c">
            <input type="text" class="input-text" style="width:250px" placeholder="输入链接名称" id="" name="link_name" value="">
            <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> <a href="javascript:;" onclick="_add('添加友情链接','/admin/link/add.html','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加友情链接</a></span>  </div>

        <table class="table table-border table-bordered table-bg">
            <thead>
            <tr>
                <th scope="col" colspan="10">链接列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th width="150">链接名称</th>
                <th>链接地址</th>
                <th width="130">加入时间</th>

                <th width="130">联系人</th>
                <th width="100">联系方式</th>
                <th width="100">联系方式号码</th>
                <th width="100">是否已通过审核</th>
                <th width="100">操作</th>
            </tr>
            </thead>

            <tbody>
        <?php foreach($list as $v){?>
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td><?php echo $v['id']?></td>
                <td><?php echo $v['link_name']?></td>
                <td><?php echo $v['link_url']?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['create_time'])?></td>
                <td><?php echo $v['link_contact']?></td>
                <td><?php echo $v['link_method']?></td>
                <td><?php echo $v['link_method_num']?></td>
                <td class="td-status">
                <span class="label <?php echo $v['status'] == 1 ? 'label-success' : '';?> radius"><?php echo $v['status']==1?'已启用':'已禁用'?></span>
                </td>
                <td class="td-manage">
                    <a style="text-decoration:none" onClick="content<?php echo $v['status'] == 1 ? 'NoTop':'Top'?>(this,<?php echo $v['id']?>)" href="javascript:;"><i class="Hui-iconfont"><?php echo $v['status'] ==1 ? '&#xe699;': '&#xe698;'?></i></a>
                    <a title="编辑" href="javascript:;" onclick="_edit('友情编辑','/admin/link/edit/id/<?php echo $v['id']?>.html','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除" href="javascript:;" onclick="_delete(this,<?php echo $v['id']?>,'/admin/link/delete')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>

                </td>
            </tr>
        <?php }?>
            </tbody>
        </table>
        <span class="r pages mt-10"> </span>
    </form>
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
    
    layer.confirm('确认要启用吗？',function(){
        $.ajax({
            type:'post',
            url:"/admin/link/changestatus",
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
            url:"/admin/link/changestatus",
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
    'submit_url' : "/admin/link/save",
    'jump_url': "/admin/link/index",
  };

</script>

</body>
</html>