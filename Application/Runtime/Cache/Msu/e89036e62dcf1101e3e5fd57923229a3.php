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
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">信息管理</h1>
    </div>
</div>
<div class="row">
<div class="col-md-12">
  <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#building" role="tab" data-toggle="tab">修改地址</a></li>
        <li role="presentation"><a href="#info" role="tab" data-toggle="tab">静态IP信息</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="building">
          <div class="container-fluid" style="margin-top: 50px">
            <div class="col-xs-12">
            <div style="margin-bottom: 10px">
            <button class="btn btn-primary" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>添加地址</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                             </button>
                            <h4 class="modal-title" id="myModalLabel">添加地址</h4>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">
                            <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/Admin/add_building" method="post">
                                <div class="form-group">
                                  <label class="col-sm-2 control-label">楼号</label>
                                  <div class="col-md-6">
                                    <input class="form-control" type="text" name="name">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">类型</label>
                                    <div class="col-md-3">
                                    <select class="form-control" name="type">
                                      <option>办公楼</option>
                                      <option>职工楼</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="control-label col-sm-2">校区</label>
                                  <div class="col-md-3">
                                    <select class="form-control" name="campus">
                                      <option value="西">西校区</option>
                                      <option value="东">东校区</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
              <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <tr>
                      <th>楼号</th>
                      <th>类型</th>
                      <th>校区</th>
                      <th>修改</th>
                      <th>删除</th>
                    </tr>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$buildings): $mod = ($i % 2 );++$i;?><tr>
                      <td><?php echo ($buildings["name"]); ?></td>
                      <td><?php echo ($buildings["type"]); ?></td>
                      <td><?php echo ($buildings["campus"]); ?></td>
                      <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo ($buildings["id"]); ?>">修改</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modal<?php echo ($buildings["id"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">
                                           <span aria-hidden="true">&times;</span>
                                           <span class="sr-only">Close</span>
                                         </button>
                                        <h4 class="modal-title" id="myModalLabel"><?php echo ($buildings["name"]); ?></h4>
                                    </div>

                                    <!-- Modal Body -->
                                    <div class="modal-body">
                                        <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/Admin/save_building" method="post">
                                            <div class="form-group">
                                              <label class="col-sm-2 control-label">楼号</label>
                                              <div class="col-md-6">
                                                <input class="form-control" type="text" name="name" value="<?php echo ($buildings["name"]); ?>">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">类型</label>
                                                <div class="col-md-6">
                                                  <select class="form-control" name="type">
                                                    <option>办公楼</option>
                                                    <option>职工楼</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2">校区</label>
                                              <div class="col-md-6">
                                                <select class="form-control" name="campus">
                                                  <option value="西">西校区</option>
                                                  <option value="东">东校区</option>
                                                </select>
                                              </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo ($buildings["id"]); ?>">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">提交</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </td>
                      <td><a class="btn btn-danger" href="/ujn_msu/index.php/Msu/Admin/delete_building/id/<?php echo ($buildings["id"]); ?>">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                  </table>
                </div>
            </div>
          </div>
          <!--    分页    -->
          <nav>
              <center>
              <ul class="pagination"><?php echo ($show); ?></ul>
              </center>
          </nav>

        </div>
        
        <div role="tabpanel" class="tab-pane fade" id="info">
          <div class="container-fluid">
          <div style="margin-top: 50px">
            <form class="form-horizontal" method="post" action="/ujn_msu/index.php/Msu/Admin/save_DNS">
              <div class="form-group">
                <label class="control-label col-md-2 col-md-offset-2">首选DNS服务器</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" name="DNS_first" value="<?php echo ($dnss["0"]["dns_first"]); ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-2 col-md-offset-2">备选DNS服务器</label>
                <div class="col-md-4">
                  <input class="form-control" type="text" name="DNS_second" value="<?php echo ($dnss["0"]["dns_second"]); ?>">
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-md-1 col-md-offset-7">
                  <input class="form-control btn btn-primary" type="submit" value="提交">
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
</div>
</div><!--row-->
</div><!--container-fluid-->
</body>
<!-- jQuery -->
<script src="/ujn_msu/Public/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/ujn_msu/Public/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="/ujn_msu/Public/js/plugins/morris/raphael.min.js"></script>
<script src="/ujn_msu/Public/js/plugins/morris/morris.min.js"></script>
<script src="/ujn_msu/Public/js/plugins/morris/morris-data.js"></script>
</html>