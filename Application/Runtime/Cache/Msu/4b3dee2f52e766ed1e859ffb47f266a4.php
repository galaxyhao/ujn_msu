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
                        <a href="/ujn_msu/index.php/Msu/sign"><i class="fa fa-fw fa-bar-chart-o"></i> 值班签到</a>
                    </li>
                    <?php if( $_SESSION['gid']== '超级管理员' ): ?><li>
                        <a href="/ujn_msu/index.php/Msu/user"><i class="fa fa-fw fa-bar-chart-o"></i> MSU用户管理</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/Ip/root_display"><i class="fa fa-fw fa-bar-chart-o"></i> IP段分配</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/web/web_list"><i class="fa fa-fw fa-bar-chart-o"></i> 网站缴费管理</a>
                    </li>
                    <li>
                        <a href="/ujn_msu/index.php/Msu/admin"><i class="fa fa-fw fa-bar-chart-o"></i> 信息管理</a>
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

            <div class="container-fluid"> 
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
                            IP地址管理 
                            <small><?php echo ($org); ?></small> 
                            <small>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#AddModal">
                                <span class="glyphicon glyphicon-plus">添加</span>
                            </button>
                            </small>
                        </h1>
                        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                           <span aria-hidden="true">&times;</span>
                                           <span class="sr-only">Close</span>
                                         </button>
                                        <h4 class="modal-title" id="myModalLabel">添加IP分配记录</h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/Ip/assign_add" method="post">
                                            <div class="form-group">
                                              <label class="col-sm-2 control-label">IP地址</label>
                                              <div class="col-sm-5">
                                              <input class="form-control" type="text" name="ip">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="col-sm-2 control-label">使用者</label>
                                              <div class="col-sm-5">
                                              <input class="form-control" type="text" name="user">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">联系电话</label>
                                                <div class="col-sm-5">
                                                <input class="form-control" type="text" name="number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">备注</label>
                                                <div class="col-sm-8">
                                                 <textarea name="note" class="form-control" rows="5" id="comment"></textarea>
                                                 </div>
                                                 <input type="hidden" name="organization" value="<?php echo ($orgid); ?>">
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-primary tianjia" data-dismiss="modal">
                                                <span>添加</span>
                                            </button>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <!-- /.row -->
                
                <div class="row" style="margin-top: 50px;margin-bottom: 30px">
                    <div>
                        <div class="table-responsive">
                            <table class="table table-hover"> 
                                <tr>
                                    <th>IP范围</th>
                                    <th>网关地址</th>
                                    <th>子网掩码</th>
                                </tr>
                                <tbody>
                                <?php if(is_array($range)): $i = 0; $__LIST__ = $range;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ranges): $mod = ($i % 2 );++$i;?><tr  class="info">
                                        <td><?php echo ($ranges["start"]); ?> ~ <?php echo ($ranges["finish"]); ?></td>
                                        <td><?php echo ($ranges["gateway"]); ?></td>
                                        <td><?php echo ($ranges["mask"]); ?></td>
                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                            <tr>
                                <th>IP地址</th>
                                <th>使用者</th>
                                <th>联系电话</th>
                                <th>备注（办公室地址等）</th>
                                <th>编辑</th>
                            </tr>
                            <tbody>
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                                        <td><?php echo ($list["ip"]); ?></td>
                                        <td><?php echo ($list["user"]); ?></td>
                                        <td><?php echo ($list["number"]); ?></td>
                                        <td><?php echo ($list["note"]); ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal<?php echo ($list["id"]); ?>">编辑</button>
                                             <div class="modal fade" id="modal<?php echo ($list["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                               <span aria-hidden="true">&times;</span>
                                                               <span class="sr-only">Close</span>
                                                             </button>
                                                            <h4 class="modal-title" id="myModalLabel"><?php echo ($list["ip"]); ?></h4>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/Ip/assign_update" method="post">
                                                                <div class="form-group">
                                                                  <label class="col-sm-2 control-label">使用者</label>
                                                                  <div class="col-sm-5">
                                                                  <input class="form-control" type="text" name="user" value="<?php echo ($list["user"]); ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">联系电话</label>
                                                                    <div class="col-sm-5">
                                                                    <input class="form-control" type="text" name="number" value="<?php echo ($list["number"]); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label">备注</label>
                                                                    <div class="col-sm-8">
                                                                     <textarea name="note" class="form-control" rows="5" id="comment" value="<?php echo ($list["note"]); ?>" ></textarea>
                                                                     </div>
                                                                     <div>
                                                                        <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary xiugai" data-dismiss="modal">&nbsp;修改&nbsp;
                                                                </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             <button class="btn btn-danger btn-xs delete " data-toggle="modal" data-target="#delete<?php echo ($list["id"]); ?>" data-dismiss="modal">删除<span class="glyphicon glyphicon-trash"></span></button>
                                             <!--Modal-->
                                             <div class="modal fade" id="delete<?php echo ($list["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                               <span aria-hidden="true">&times;</span>
                                                               <span class="sr-only">Close</span>
                                                             </button>
                                                            <h4 class="modal-title" id="ModalLabel"><?php echo ($list["ip"]); ?></h4>
                                                        </div>

                                                        <!-- Modal Body -->
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/Ip/assign_delete" method="get">
                                                            <div class="col-md-offset-3"> <h3>确认删除该条分配记录吗？</h3></div>
                                                               <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>">
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
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/.col-xs-12-->
                </div>
                <!--/.row--> 
                <nav>
                <center>
                <ul class="pagination"><?php echo ($show); ?></ul>
                </center>
                </nav>              
            </div>
            <!-- /.container-fluid -->
            </div>

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/ujn_msu/Public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/ujn_msu/Public/js/bootstrap.min.js"></script>

    <script src="/ujn_msu/Public/js/myself.js"></script>

    <script>
        $(function(){
            $(".tianjia").click(function(){
                var select = $(this).parents('form');
               submit(select,"/ujn_msu/index.php/Msu/Ip/assign_add",'POST','添加成功！');
            });
            $(".xiugai").click(function(){
                var select = $(this).parents('form');
               submit(select,"/ujn_msu/index.php/Msu/Ip/assign_update",'POST','修改成功！');
            });
            $(".shanchu").click(function(){
                var select = $(this).parents('form');
               submit(select,"/ujn_msu/index.php/Msu/Ip/assign_delete",'GET','删除成功！');
            });
        });
    </script>
</body>

</html>