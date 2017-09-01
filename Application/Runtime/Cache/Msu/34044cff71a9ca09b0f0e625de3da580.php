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
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">添加维护</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-success alert-dismissable fade in hidden" onclick="$(this).attr('class','alert alert-success alert-dismissable fade in hidden');">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="fa fa-info-circle" id="tip"></i>
        </div>
      </div>
    </div>
    <div class="row">
      <ul id="myTab" class="nav nav-tabs">
        <li class="active">
          <a href="#bangong" data-toggle="tab">
                  			添加办公网维护
                  		</a>
        </li>
        <li><a href="#jiaogong" data-toggle="tab">添加教工宿舍维护</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="bangong">
          <div class="col-md-4 col-md-offset-4">
            <h2>添加新维护(办公网)</h2>
            <form class="form-horizontal" action="/ujn_msu/index.php/Msu/Weihu/weihu_write" method="post" id="form1">
              <div class="form-group">
                <label class="col-sm-2 control-label">楼号</label>
                <div class="col-sm-10">
                  <select class="form-control" name="building">
                              <?php if(is_array($office_b)): $i = 0; $__LIST__ = $office_b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">房间号</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="room" placeholder="房间号">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" placeholder="姓名">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" name="numbers" placeholder="电话">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">故障说明</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" id="comment1" name="note"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">维护地点说明</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" id="comment2" name="location"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12 col-sm-offset-2">
                  <button type="button" class="btn btn-success">提交</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="tab-pane fade" id="jiaogong">
          <div class="col-md-4 col-md-offset-4">
            <h2>添加新维护(教工宿舍)</h2>
            <form class="form-horizontal" action="/ujn_msu/index.php/Msu/Weihu/weihu_write" method="post">
              <div class="form-group">
                <label class="col-sm-2 control-label">楼号</label>
                <div class="col-sm-10">
                  <select class="form-control" name="building">
                              <?php if(is_array($staff_b)): $i = 0; $__LIST__ = $staff_b;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">单元号</label>
                <div class="col-sm-10">
                  <select class="form-control" name="unit">
                              <option value="一单元">一单元</option>
                              <option value="二单元">二单元</option>
                              <option value="三单元">三单元</option>
                              <option value="四单元">四单元</option>
                              <option value="五单元">五单元</option>
                              <option value="六单元">六单元</option>
                              <option value="七单元">七单元</option>
                            </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">房间号</label>
                <div class="col-sm-10">
                  <select class="form-control" name="room">
                              <option value="101">101</option>
                              <option value="102">102</option>
                              <option value="103">103</option>
                              <option value="104">104</option>
                              <option value="201">201</option>
                              <option value="202">202</option>
                              <option value="203">203</option>
                              <option value="204">204</option>
                              <option value="301">301</option>
                              <option value="302">302</option>
                              <option value="303">303</option>
                              <option value="304">304</option>
                              <option value="401">401</option>
                              <option value="402">402</option>
                              <option value="403">403</option>
                              <option value="404">404</option>
                              <option value="501">501</option>
                              <option value="502">502</option>
                              <option value="503">503</option>
                              <option value="504">504</option>
                              <option value="601">601</option>
                              <option value="602">602</option>
                              <option value="603">603</option>
                              <option value="604">604</option>
                              <option value="701">701</option>
                              <option value="702">702</option>
                              <option value="703">703</option>
                              <option value="704">704</option>
                              <option value="801">801</option>
                              <option value="802">802</option>
                              <option value="803">803</option>
                              <option value="901">901</option>
                              <option value="902">902</option>
                              <option value="903">903</option>
                              <option value="1001">1001</option>
                              <option value="1002">1002</option>
                              <option value="1003">1003</option>
                              <option value="1101">1101</option>
                              <option value="1102">1102</option>
                              <option value="1103">1103</option>
                              <option value="1201">1201</option>
                              <option value="1202">1202</option>
                              <option value="1203">1203</option>
                              <option value="1301">1301</option>
                              <option value="1302">1302</option>
                              <option value="1303">1303</option>
                            </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" placeholder="姓名">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">电话</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" name="numbers" placeholder="电话">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">故障说明</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" id="comment1" name="note"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">维护地点说明</label>
                <div class="col-sm-10">
                  <textarea class="form-control" rows="3" id="comment2" name="location"></textarea>
                </div>
              </div>
              <input type="hidden" name="net_type" value="教工网">
              <div class="form-group">
                <div class="col-sm-12 col-sm-offset-2">
                  <button type="button" class="btn btn-success">提交</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">


    </div>
  </div>
  <!-- /.container-fluid -->

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
  $(function () {
    $('.btn-success:first').click(function () {
      submit('form:first', '/ujn_msu/index.php/Msu/Weihu/weihu_write', 'GET', '添加成功！');
    });
    $('.btn-success:last').click(function () {
      submit('form:last', '/ujn_msu/index.php/Msu/Weihu/weihu_write', 'GET', '添加成功！');
    });
  });

</script>

</body>

</html>