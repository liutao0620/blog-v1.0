<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<title><?php echo $info['config']['site_name']?></title>
<meta name="keywords" content="<?php echo $info['config']['site_keyword']?>">
<meta name="description" content="<?php echo $info['config']['description']?>">
<link rel='dns-prefetch' href='//cdn.bootcss.com' />
<link rel='dns-prefetch' href='//s.w.org' />
<link rel='stylesheet' id='style-css'  href='/Public/Home/style/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='toc-screen-css'  href='/Public/Home/style/screen.min.css' type='text/css' media='all' />
<style>.article-content{font-size: 14px;}@media (max-width:640px){.article-content{font-size:16px}}
.navbar .logo{width:160px}@media (max-width: 979px){.navbar .logo{width:100%}}</style>
	<!--[if lt IE 9]><script src="/Public/Home/js/html5.js"></script><![endif]-->
</head>
<body class="home blog">
<div class="navbar-wrap">
	<script>
    window._deel = {
        ajaxpager: '',
        maillist: '',
        maillistCode: '',
        commenton: 0,
        roll: [1,1],
        tougaoContentmin: 200,
        tougaoContentmax: 5000,
    }
</script>
<div class="navbar">
    <h1 class="logo"><a href="<?php echo $info['config']['site_url']?>" title="刘涛的博客">刘涛的博客</a></h1>
    <ul class="nav">
        <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-5"><a href="<?php echo $info['config']['site_url']?>">首页</a></li>
            <?php if(is_array($info['type'])): $i = 0; $__LIST__ = $info['type'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="menu-item-<?php echo ($vo["id"]); ?>"
                class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-<?php echo ($vo["id"]); ?>"><a href="/home/index/article/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>       

    </ul>

    <div class="menu pull-right">
        <form method="get" class="dropdown search-form" action="/tagArticle" >
            <input class="search-input" name="search" type="text" placeholder="输入关键字搜索" value="" x-webkit-speech="">
            <input class="btn btn-success search-submit" type="submit" value="搜索">
            <ul class="dropdown-menu search-suggest"></ul>
        </form>
    </div>
</div>
</div>
<header class="header"></header>