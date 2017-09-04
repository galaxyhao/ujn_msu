<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <title>济南大学MSU</title>

    <!-- Bootstrap Core CSS -->
    <link href="/ujn_msu/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/ujn_msu/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/ujn_msu/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/ujn_msu/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/ujn_msu/index.php/Msu/Weihu/weihu_list">济南大学MSU</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo (session('name')); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> 设置</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/ujn_msu/index.php/Msu/login/loginout"><i class="fa fa-fw fa-power-off"></i> 注销</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav" style="background: #EEEEEE">
                    <li>
                        <a href="/ujn_msu/index.php/Msu/weihu/weihu_list"><i class="fa fa-fw fa-wrench"></i> 维护工作记录</a>
                            <ul>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/weihu/weihu_add">增加维护记录</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/weihu/weihu_list">查询未完成记录</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/weihu/weihu_list_yes">查询已完成记录</a>
                                </li>
                            </ul>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/count"><i class="fa fa-fw fa-bar-chart-o"></i> 工作量统计</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/sign"><i class="fa fa-fw fa-tag"></i> 值班签到</a>
                    </li>
                    <?php if( $_SESSION['gid']== '超级管理员' ): ?><li>
                        <a href="/ujn_msu/index.php/Msu/user"><i class="fa fa-fw fa-users"></i> MSU用户管理</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/Ip/root_display"><i class="fa fa-fw fa-paper-plane"></i> IP段分配</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/web/web_list"><i class="fa fa-fw fa-money"></i> 网站缴费管理</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/admin"><i class="fa fa-fw fa-info"></i> 信息管理</a>
                    </li><?php endif; ?>
                   <!--  <li>
                        <a href="/ujn_msu/index.php/Msu/msu"><i class="fa fa-fw fa-bar-chart-o"></i> 校园用户管理</a>
                            <ul>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/msu/add_client_view">添加校园网用户</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/msu/search_client_view">查询校园网用户</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/msu/search_service_view">查询校园网服务</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/msu/wege_payment">查询工资代扣用户</a>
                                </li>
                                <li>
                                    <a href="/ujn_msu/index.php/Msu/msu/transform">用户缴费转移</a>
                                </li>
                            </ul>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
<link href="/ujn_msu/Public/css/foundation-datepicker.css" rel="stylesheet" >


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">维护工作量查询</h1>
        </div>
    </div>
    <div class="row">
        <form action="/ujn_msu/index.php/Msu/Count/" class="form-inline" method="get" id="search" role="form" style="text-align: center;margin-bottom: 20px;margin-top: 50px">
            <div class="form-group">
                <label class="control-label">姓名：</label>
                <select name="name" class="form-control">
                    <option value="" selected> --全部-- </option>
                    <?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$name): $mod = ($i % 2 );++$i;?><option value="<?php echo ($name["uid"]); ?>"> <?php echo ($name["name"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>   
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">开始时间：</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    <input class="form-control" type="text" name="start" id="start">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">结束时间：</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                    <input class="form-control" type="text" name="finish" id="finish">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">类型：</label>
                <select name="type" class="form-control">
                    <option value="" selected> --全部-- </option>
                    <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["type"]); ?>"> <?php echo ($type["type"]); ?> </option><?php endforeach; endif; else: echo "" ;endif; ?>   
                </select>
            </div>
            <button class="btn btn-primary glyphicon glyphicon-search">查询</button>
        </form>
    </div>          
    <div class="row-fluid">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                住址
                            </th>
                            <th>
                                完成时间
                            </th>
                            <th>
                                解决方案
                            </th>
                            <th>
                                参与人员
                            </th>
                            <th>
                                签名人员
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                <td>
                                <a href="/ujn_msu/index.php/Msu/weihu/client_record/id/<?php echo ($list["id"]); ?>"><?php echo ($list["building"]); echo ($list["unit"]); echo ($list["room"]); ?></a>
                                </td>
                                <td>
                                    <?php echo ($list["finish_time"]); ?>
                                </td>
                                <td>
                                    <?php echo ($list["solution"]); ?>
                                </td>
                                <td>
                                    <?php echo ($list["completer"]); ?>
                                </td>
                                <td>
                                    <?php echo ($list["reporter"]); ?>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<nav>
    <center>
        <ul class="pagination"><?php echo ($show); ?></ul>
        <h3><span class="label label-info">共<?php echo ($count); ?>条</span></h3>
    </center>
</nav>

<!-- /#wrapper -->

<!-- jQuery -->
<script src="/ujn_msu/Public/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/ujn_msu/Public/js/bootstrap.min.js"></script>

<!-- 日期时间选择器 -->
<script src="/ujn_msu/Public/js/foundation-datepicker.js"></script>
<script src="/ujn_msu/Public/js/locales/foundation-datepicker.zh-CN.js"></script>
<script>
    $('#start').fdatepicker({
        format: 'yyyy-mm-dd',
        language: 'zh-CN'
    });
    $('#finish').fdatepicker({
        format: 'yyyy-mm-dd',
        language: 'zh-CN'
    });
</script>
</body>

</html>