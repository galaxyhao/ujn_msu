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
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissable fade in hidden" onclick="$(this).attr('class','alert alert-success alert-dismissable fade in hidden');">
                <button  type="button" class="close" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle" id="tip"></i>
            </div>
        </div>
    </div>
	 <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    值班签到
                    <small><?php echo ($org); ?></small> 
                </h1>
            </div>
        </div>
        <div>
        	<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#afternoon" role="tab" data-toggle="tab">下午值班签到</a></li>
			  <li role="presentation"><a href="#night" role="tab" data-toggle="tab">晚班值班签到</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			  <div role="tabpanel" class="tab-pane fade in active" id="afternoon">
	  			<div class="container-fluid">
			  		<div class="row" style="margin-top: 50px">
			  			<form action="/ujn_msu/index.php/Msu/Sign/afternoon_sign" method="post" class="form-horizontal" role="form">
			  				<div class="form-group">
			  					<label class="control-label col-md-2 col-md-offset-1">报警说明</label>
			  					<div class="col-md-4">
			  						<input type="text" name="note" value="无" class="form-control">
			  						<input type="hidden" name="type" value="下午班">
			  					</div>
			  					<div class="col-md-2">
			  						<button type="button" class="btn btn-primary form-control qiandao_afternoon"> 签到 </button>
			  					</div>
			  				</div>
			  			</form>
               			<div class="col-xs-12">
                    		<div class="table-responsive">
                        		<table class="table table-hover table-bordered">
                        		<tr>
                        			<th>姓名</th>
                        			<th>时间</th>
                        			<th>类型</th>
                        			<th>报警说明</th>
                        			<th>删除</th>
                        		</tr>
                        		<?php if(is_array($list_afternoon)): $i = 0; $__LIST__ = $list_afternoon;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_afternoon): $mod = ($i % 2 );++$i;?><tr>
                        			<td><?php echo ($list_afternoon["name"]); ?></td>
                        			<td><?php echo ($list_afternoon["time"]); ?></td>
                        			<td><?php echo ($list_afternoon["type"]); ?></td>
                        			<td><?php echo ($list_afternoon["note"]); ?></td>
                        			<td><button  data-name="<?php echo ($list_afternoon["name"]); ?>" class="btn btn-danger btn-xs delete" disabled="disabled" data-toggle="modal" data-target="#delete<?php echo ($list_afternoon["id"]); ?>">删除<span class="glyphicon glyphicon-trash"></span></button>
                                     <!--Modal-->
                                     <div class="modal fade" id="delete<?php echo ($list_afternoon["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                       <span aria-hidden="true">&times;</span>
                                                       <span class="sr-only">Close</span>
                                                     </button>
                                                    <h4 class="modal-title" id="ModalLabel">确认框</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" action="" method="get">
                                                    <div class="col-md-offset-3"> <h3>确认删除该条签到记录吗？</h3></div>
                                                       <input type="hidden" name="id" value="<?php echo ($list_afternoon["id"]); ?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                            <button type="button" class="btn btn-primary shanchu" data-dismiss="modal">确认</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                        		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        		</table>
                    		</div>
                		</div>
			  		</div>
			  	</div>
			  	<nav>
                <center>
                <ul class="pagination"><?php echo ($show_afternoon); ?></ul>
                </center>
                </nav>
			  </div>
			  <div role="tabpanel" class="tab-pane fade" id="night">
			  	<div class="container-fluid">
			  		<div class="row" style="margin-top: 50px">
			  			<form action="/ujn_msu/index.php/Msu/Sign/night_sign" method="post" class="form-horizontal" role="form">
			  				<div class="form-group">
			  					<label class="control-label col-md-2 col-md-offset-1">报警说明</label>
			  					<div class="col-md-4">
			  						<input type="text" name="note" value="无" class="form-control">
			  						<input type="hidden" name="type" value="晚班">
			  					</div>
			  					<div class="col-md-2">
			  						<button type="button" class="btn btn-primary form-control qiandao_night"> 签到 </button>
			  					</div>
			  				</div>
			  			</form>
               			<div class="col-xs-12">
                    		<div class="table-responsive">
                        		<table class="table table-hover table-bordered">
                        		<tr>
                        			<th>姓名</th>
                        			<th>时间</th>
                        			<th>类型</th>
                        			<th>报警说明</th>
                        			<th>删除</th>
                        		</tr>
                        		<?php if(is_array($list_night)): $i = 0; $__LIST__ = $list_night;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list_night): $mod = ($i % 2 );++$i;?><tr>
                        			<td><?php echo ($list_night["name"]); ?></td>
                        			<td><?php echo ($list_night["time"]); ?></td>
                        			<td><?php echo ($list_night["type"]); ?></td>
                        			<td><?php echo ($list_night["note"]); ?></td>
                        			<td><button  data-name="<?php echo ($list_night["name"]); ?>" class="btn btn-danger btn-xs delete" disabled="disabled" data-toggle="modal" data-target="#delete<?php echo ($list_night["id"]); ?>">删除<span class="glyphicon glyphicon-trash"></span></button>
                                     <!--Modal-->
                                     <div class="modal fade" id="delete<?php echo ($list_night["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">
                                                       <span aria-hidden="true">&times;</span>
                                                       <span class="sr-only">Close</span>
                                                     </button>
                                                    <h4 class="modal-title" id="ModalLabel">确认框</h4>
                                                </div>

                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" action="" method="get">
                                                    <div class="col-md-offset-3"> <h3>确认删除该条签到记录吗？</h3></div>
                                                       <input type="hidden" name="id" value="<?php echo ($list_night["id"]); ?>">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                            <button type="button" class="btn btn-primary shanchu" data-dismiss="modal">确认</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                        		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        		</table>
                    		</div>
                		</div>
			  		</div>
			  	</div>
			  	<nav>
                <center>
                <ul class="pagination"><?php echo ($show_night); ?></ul>
                </center>
                </nav>
			  </div>
			</div>
        </div>


</div>
<!-- /#page-wrapper -->

    <!-- jQuery -->
    <script src="/ujn_msu/Public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/ujn_msu/Public/js/bootstrap.min.js"></script>

    <script src="/ujn_msu/Public/js/myself.js"></script>
    <script>
        $(function(){
            $(".qiandao_afternoon").click(function(){
                var select = $(this).parents('form');
                submit(select,'/ujn_msu/index.php/Msu/Sign/afternoon_sign','POST','签到成功！');
            });
            $(".qiandao_night").click(function(){
                var select = $(this).parents('form');
                submit(select,'/ujn_msu/index.php/Msu/Sign/night_sign','POST','签到成功！');
            });
            $(".shanchu").click(function(){
                var select = $(this).parents('form');
                submit(select,'/ujn_msu/index.php/Msu/Sign/delete','GET','删除成功！');
            });
        });
    </script>
    <script type="text/javascript">
        $(".delete").each(function(){
            if('<?php echo (session('gid')); ?>' == '超级管理员' || '<?php echo (session('gid')); ?>' == '缴费管理员' || '<?php echo (session('name')); ?>' == $(this).data("name"))
                $(this).removeAttr("disabled");
        });
    </script>

</body>

</html>