<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>微信绑定非凡云</title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="/Public/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="/Public/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="/Public/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="/Public/css/font.css" type="text/css" />
    <link rel="stylesheet" href="/Public/css/app.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="/Public/js/ie/html5shiv.js"></script>
    <script src="/Public/js/ie/respond.min.js"></script>
    <script src="/Public/js/ie/excanvas.js"></script>
    <![endif]-->
</head>
<body class="">
<section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xxl">
        <a class="navbar-brand block" href="#">非凡云绑定</a>
        <section class="panel panel-default m-t-lg bg-white">
            <header class="panel-heading text-center">
                <h4>微信绑定非凡云</h4>
            </header>
            <form action="<?php echo U('Admin/User/handle');?>" class="panel-body wrapper-lg" method="post">
                <div class="form-group">
                    <label class="control-label">帐号</label>
                    <input type="text" name="username" placeholder="请输入登录帐号" class="form-control input-lg">
                    <input type="hidden" name="openid" class="form-control input-lg" value="<?php echo ($info['openid']); ?>">
                    <input type="hidden" name="nickname" class="form-control input-lg" value="<?php echo ($info['nickname']); ?>">
                </div>
                <div class="form-group">
                    <label class="control-label">密码</label>
                    <input type="password" name="password" id="inputPassword" placeholder="请输入登录密码" class="form-control input-lg">
                </div>
                <button type="submit" class="btn btn-primary btn-block">绑定</button>
                <div class="line line-dashed"></div>
            </form>
        </section>
    </div>
</section>
<!-- footer -->
<footer id="footer">
    <div class="text-center padder clearfix">
        <p>
            <small><br></small>
        </p>
    </div>
</footer>
<!-- / footer -->
<script src="/Public/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/Public/js/bootstrap.js"></script>
<!-- App -->
<script src="/Public/js/app.js"></script>
<script src="/Public/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/js/app.plugin.js"></script>
</body>
</html>