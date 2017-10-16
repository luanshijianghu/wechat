<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8" />
    <title>微信解绑</title>
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
           <table class="table table-hover">
           	<thead>
           		<tr>
                    <th>序号</th>
                    <th>非凡云账号</th>
                    <th>操作</th>
           		</tr>
           	</thead>
           	<tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($i); ?></td>
                        <td><?php echo ($v["user_name"]); ?></td>
                        <td><a class="btn btn-sm btn-primary" href="<?php echo U('Admin/User/userdel',array('id'=>$v['id']));?>" onclick="return confirmAct();">解绑</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
           	</tbody>
           </table>
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
<script type="text/javascript" language="javascript">
    function confirmAct()
    {
        if(confirm('确定要执行此操作吗?'))
        {
            return true;
        }
        return false;
    }
</script>
<!-- Bootstrap -->
<script src="/Public/js/bootstrap.js"></script>
<!-- App -->
<script src="/Public/js/app.js"></script>
<script src="/Public/js/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/js/app.plugin.js"></script>
</body>
</html>