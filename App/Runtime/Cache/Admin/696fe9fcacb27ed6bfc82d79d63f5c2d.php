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
<div class="page-container">
    <p class="f-20 text-success">欢迎使用 <span class="f-14">刘涛后台模版 v1.0！</span></p>
    <p>登录次数： <?php echo $info['login_times']?></p>
    <p>上次登录IP：<?php echo $_SESSION['last_login_ip']?>  上次登录时间：<?php echo $_SESSION['last_login_time']?></p>
    <table class="table table-border table-bordered table-bg">
        <thead>
        <tr>
            <th colspan="7" scope="col">信息统计</th>
        </tr>
        <tr class="text-c">
            <th>统计</th>
            <th>资讯库</th>
            <th>图片库</th>
            <th>产品库</th>
            <th>用户</th>
            <th>管理员</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c">
            <td>总数</td>
            <td>92</td>
            <td>9</td>
            <td>0</td>
            <td>8</td>
            <td>20</td>
        </tr>
        <tr class="text-c">
            <td>今日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>昨日</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本周</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr class="text-c">
            <td>本月</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>

</div>
<footer class="footer mt-20">
    <div class="container">
        <p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br><br>
           <font color="blue"> <?php echo $configinfo['copyright_information']?></font><br>
            <font color="blue">备案号：<?php echo $configinfo['case_number']?></font></p>
    </div>
</footer>
</body>
</html>