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
    <h1 class="logo"><a href="<?php echo $info['config']['site_url']?>" title="<?php echo $info['config']['site_name']?>"><?php echo $info['config']['site_name']?></a></h1>
    <ul class="nav">
        <li id="menu-item-5" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-5"><a href="<?php echo $info['config']['site_url']?>">首页</a></li>
            <?php if(is_array($info['type'])): $i = 0; $__LIST__ = $info['type'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="menu-item-<?php echo ($vo["id"]); ?>"
                class="menu-item menu-item-type-taxonomy menu-item-object-category  menu-item-<?php echo ($vo["id"]); ?>"><a href="/home/index/article/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["type_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>       

    </ul>

    <div class="menu pull-right">
        <form method="get" class="dropdown search-form" action="/home/index/article" >
            <input class="search-input" name="search" type="text" placeholder="输入关键字搜索" value="" x-webkit-speech="">
            <input class="btn btn-success search-submit" type="submit" value="搜索">
            <ul class="dropdown-menu search-suggest"></ul>
        </form>
    </div>
</div>
</div>
<header class="header"></header>
<section class="container">
	<div class="content-wrap">
	<div class="content">
		<div class="breadcrumbs">你的位置：
			<a href="<?php echo $info['config']['site_url']?>"><?php echo $info['config']['site_name']?></a> <small>></small>
			<a href="/home/index/article/id/<?php echo ($info['typename'][0]['id']); ?>"><?php echo ($info['typename'][0]['type_name']); ?></a> <small>></small>
			<span class="muted"><?php echo ($info['content']['title']); ?></span>
		</div>
			<header class="article-header">
				<h1 class="article-title"><a href="/home/index/content/id/<?php echo ($info['content']['id']); ?>.html"><?php echo ($info['content']['title']); ?></a></h1>
				<div class="meta">
					<span class="muted"><a href="/home/index/article/id/<?php echo ($info['typename'][0]['id']); ?>.html"><i class="icon-list-alt icon12"></i><?php echo ($info['typename'][0]['type_name']); ?></a></span>
					<time class="muted"><i class="ico icon-time icon12"></i> <?php echo ($info['content']['time']); ?> (<?php echo date('Y-m-d',$info['content']['create_time']) ?>)</time>
					<span class="muted"><i class="ico icon-eye-open icon12"></i> <?php echo ($info['content']['reading_num']); ?>浏览</span>
					<span class="muted"><i class="ico icon-eye-open icon12"></i> <?php echo ($info['content']['laud_num']); ?><a href='#'>点赞</a></span>
					<span class="muted"><i class="icon-comment icon12"></i> <a href="/article/7#respond"><span id = "sourceId::7" class = "cy_cmt_count" ></span><script id="cy_cmt_num" src="https://changyan.sohu.com/upload/plugins/plugins.list.count.js?clientId=cyryTyLri"></script>评论</a></span>
				</div>
			</header>

		<article class="article-content">
		<?php echo html_entity_decode($info['content']['content']);?>
			</article>

		<footer class="article-footer">
			<div class="article-tags">继续浏览有关
									<a href="/home/index/article/id/<?php echo ($info['typename'][0]['id']); ?>" rel="tag"><?php echo ($info['typename'][0]['type_name']); ?></a>
								的文章
			</div>
		</footer>
		<nav class="article-nav">
			<span class="article-nav-prev"><?php echo empty($info['prev']['title'])?'么有了':'上一篇';?><a href="<?php echo empty($info['prev']['title'])?'javascript:void(0)':'/home/index/content/id/'.$info['prev']['id'];?>" rel="prev"><?php echo empty($info['prev']['title'])?'':$info['prev']['title'];?></a></span>
			<span class="article-nav-next"><?php echo empty($info['next']['title'])?'么有了':'下一篇';?>
				<a href="<?php echo empty($info['next']['title'])?'javascript:void(0)':'/home/index/content/id/'.$info['next']['id'];?>" rel="next"><?php echo empty($info['next']['title'])?'':$info['next']['title'];?></a>
				</span>
		</nav>

		<div class="relates">
			<h3>相关文章</h3>
			<ul>
			            <?php if(is_array($info['allContent'])): $i = 0; $__LIST__ = $info['allContent'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/home/index/content/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>		
							</ul>
		</div>
		<div id="respond" class="no_webshot" style="padding:0 20px;">
			<div id="SOHUCS" sid="7" ></div>
			<script type="text/javascript">
				(function(){
					var appid = 'cyryTyLri';
					var conf = 'prod_3fcc2980480ba37f1899ef289c8903b7';
					var width = window.innerWidth || document.documentElement.clientWidth;
					if (width < 960) {
						window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })();
			</script>


		</div>
	</div>
</div>
<aside class="sidebar">
	<!--<div class="widget d_textbanner">
    <a class="style02" href=""><strong></strong><h2>PHP设计模式完美教程</h2>
        <p>12种设计模式 •UML类图 •设计原则<br /> •PHP代码例程 •简单易懂</p>
    </a>
</div>-->
<div class="widget widget_views-plus">
    <h3 class="widget_tit">热门文章</h3>
    <ul>
            <?php foreach($info['reading_article'] as $v){ ?>
                <li><a href="/home/index/content/id/<?php echo $v['id']?>"  title="<?php echo $v['title']?>"><?php echo $v['title']?></a></li>
            <?php }?>    
            </ul>
</div>
<div class="widget d_tag">
    <h3 class="widget_tit">标签</h3>
    <div class="d_tags">
                <?php foreach($info['tag'] as $k => $v){?>
                 <a href="/home/index/tagArticle/id/<?php echo $v['id']?>"><?php echo $v['tag_name']?> (<?php echo count($v['content'])?>)</a>
                <?php }?> 
            </div>
</div>
<div class="widget d_comment">
    <h3 class="widget_tit">最新评论</h3>
    <ul>

        <div id="cyReping" role="cylabs" data-use="reping"></div>
        <script type="text/javascript" charset="utf-8" src="https://changyan.itc.cn/js/lib/jquery.js"></script>
        <script type="text/javascript" charset="utf-8" src="https://changyan.sohu.com/js/changyan.labs.https.js?appid=cyryTyLri"></script>
    </ul>
</div>


	<div class="widget widget_text"><h3 class="widget_tit">友情链接</h3>
		<div class="textwidget"><div class="widget_pages">
		<ul>
							<?php foreach($info['link'] as $v){?>
							<li class="page_item page-item-2"><a href="<?php echo $v['link_url']?>" target="_blank"><?php echo $v['link_name']?></a></li>
                            <?php }?>
					</ul>
	</div>
		</div>
		</div>
</aside>
</section>
<footer class="footer">
    <div class="footer-inner">
        <div class="copyright pull-left">
            <?php echo $info['config']['copyright_information']?><a href="<?php echo $info['config']['site_url']?>"><?php echo $info['config']['site_name']?></a>
		
        </div>
        <div class="trackcode pull-right">
            <a href="http://www.miitbeian.gov.cn/" rel="external nofollow" target="_blank">
                <?php echo $info['config']['case_number']?></a>
        </div>
		<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261890043'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1261890043%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
	
    </div>
</footer>
<script type='text/javascript' src='/Public/Home/js/jquery.min.js'></script>
<script type='text/javascript' src='/Public/Home/js/d9.min.js'></script>

</div>
</body>
</html>