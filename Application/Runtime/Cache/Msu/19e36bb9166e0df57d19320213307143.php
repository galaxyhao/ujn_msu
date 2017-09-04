<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">



    <title>济南大学MSU</title>

    <!-- Bootstrap Core CSS -->
    <link href="/ujn-msu/ujn_msu/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/ujn-msu/ujn_msu/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/ujn-msu/ujn_msu/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/ujn-msu/ujn_msu/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="/ujn-msu/ujn_msu/Public/css/foundation-datepicker.css" rel="stylesheet" >
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
                <a class="navbar-brand" href="/ujn-msu/ujn_msu/index.php/Msu/Weihu/weihu_list">济南大学MSU</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo ($name); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> 设置</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/ujn-msu/ujn_msu/index.php/Msu/login/loginout"><i class="fa fa-fw fa-power-off"></i> 注销</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background: #EEEEEE">
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/weihu/weihu_list"><i class="fa fa-fw fa-wrench"></i> 维护工作记录</a>
                        <ul>
                            <li>
                                <a href="/ujn-msu/ujn_msu/index.php/Msu/weihu/weihu_add">增加维护记录</a>
                            </li>
                            <li>
                                <a href="/ujn-msu/ujn_msu/index.php/Msu/weihu/weihu_list">查询未完成记录</a>
                            </li>
                            <li>
                                <a href="/ujn-msu/ujn_msu/index.php/Msu/weihu/weihu_list_yes">查询已完成记录</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/count"><i class="fa fa-fw fa-bar-chart-o"></i> 工作量统计</a>
                    </li>
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/sign"><i class="fa fa-fw fa-tag"></i> 值班签到</a>
                    </li>

                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/user"><i class="fa fa-fw fa-users"></i> MSU用户管理</a>
                    </li>
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/Ip/root_display"><i class="fa fa-fw fa-paper-plane"></i> IP段分配</a>
                    </li>
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/web/web_list"><i class="fa fa-fw fa-money"></i> 网站缴费管理</a>
                    </li>
                    <li>
                        <a href="/ujn-msu/ujn_msu/index.php/Msu/admin"><i class="fa fa-fw fa-info"></i> 信息管理</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">网站缴费管理</h1>
                    </div>
                </div>
                <!-- 警示弹框 -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable fade in hidden" onclick="$(this).attr('class','alert alert-success alert-dismissable fade in hidden');">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle" id="tip"></i>
                        </div>
                    </div>
                </div>
                <!-- 显示表格 -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th>网站名称</th>
                                        <th>网站域名</th>
                                        <th>域名使用期限</th>
                                        <th>服务开始日期</th>
                                        <th>服务结束日期</th>
                                        <th>缴费金额</th>
                                        <th>登记人</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                                            <td>
                                                <?php echo ($data["webname"]); ?>
                                            </td>
                                            <td>
                                                <a href="http://<?php echo ($data["data"][""]); ?>.ujn.edu.cn"><?php echo ($data["dnsname"]); ?>.ujn.edu.cn</a>
                                            </td>
                                            <td>
                                                <?php echo ($data["syqx"]); ?>
                                            </td>
                                            <td>
                                                <?php echo ($data["startdate"]); ?>
                                            </td>
                                            <td>
                                                <?php echo ($data["enddate"]); ?>
                                            </td>
                                            <td>
                                                <?php echo ($data["money"]); ?>
                                            </td>
                                            
                                            <td>
                                                <?php echo ($data["user"]); ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-default" title="<?php echo ($data["dnsname"]); ?>.ujn.edu.cn"
                                                data-container="body" data-toggle="popover" data-placement="left"
                                                data-html="true" data-trigger="hover"
                                                data-content="
                                                <div class='row'><div class='col-md-12'>
                                                    <span><label>主管领导：</label><?php echo ($data["zgldxm"]); ?></span><br/>
                                                    <span><label>主管领导电话：</label><?php echo ($data["zgldbgdh"]); ?></span><br/>
                                                    <span><label>分管领导：</label><?php echo ($data["fgldxm"]); ?></span><br/>
                                                    <span><label>分管领导电话：</label><?php echo ($data["fgldbgdh"]); ?></span><br/>
                                                    <span><label>维护员：</label><?php echo ($data["whyxm"]); ?></span><br/>
                                                    <span><label>维护员办公电话：</label><?php echo ($data["whybgdh"]); ?></span><br/>
                                                    <span><label>维护员Email：</label><?php echo ($data["whyemail"]); ?></span><br/>
                                                    <span><label>域名备注：</label><?php echo ($data["bz"]); ?></span><br/>
                                                </div></div>
                                                ">
                                                更多...
                                                </button>
                                                <a href="/ujn-msu/ujn_msu/index.php/Msu/Web/payRecord/dnsname/<?php echo ($data["dnsname"]); ?>" class="btn btn-danger btn-sm">缴费记录</a>
                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#<?php echo ($data["dnsname"]); ?>"><i class="fa fa-jpy"></i>&nbsp;缴费</button>
                                                <!-- 模态框（Modal） -->
                                                <div class="modal fade" id="<?php echo ($data["dnsname"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">域名：<?php echo ($data["dnsname"]); ?>.ujn.edu.cn</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" role="form" action="/ujn-msu/ujn_msu/index.php/Msu/Web/web_pay" method="post">
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">开始时间：</label>
                                                                        <div class="input-group col-md-5">
                                                                            <input type="text" class="form-control form-date" name="startdate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">结束时间：</label>
                                                                        <div class="input-group col-md-5">
                                                                            <input type="text" class="form-control form-date" name="enddate">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-sm-3 control-label">缴费金额：</label>
                                                                        <div class="input-group col-md-5">
                                                                            <input type="text" class="form-control" name="money">
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="dns" value="<?php echo ($data["dnsname"]); ?>">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                                                                        <button type="submit" class="btn btn-primary jiaofei" data-dismiss="modal">确认缴费</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal -->
                                                </div>
                                                <a href="/ujn-msu/ujn_msu/index.php/Msu/Web/edit/dnsname/<?php echo ($data["dnsname"]); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i>&nbsp;编辑</a>
                                            </td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav>
            <center>
                <ul class="pagination"><?php echo ($show); ?></ul>
            </center>
        </nav>
    </div>
    <!-- jQuery -->
    <script src="/ujn-msu/ujn_msu/Public/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/ujn-msu/ujn_msu/Public/js/bootstrap.min.js"></script>
    <!-- 日期时间选择器 -->
    <script src="/ujn-msu/ujn_msu/Public/js/foundation-datepicker.js"></script>
    <script src="/ujn-msu/ujn_msu/Public/js/locales/foundation-datepicker.zh.js"></script>
    <script src="/ujn-msu/ujn_msu/Public/js/myself.js"></script>
    <script>
        $(function(){
            $('.form-date').fdatepicker({
                format: 'yyyy-mm-dd',
                language: 'zh',
            });
            $('[data-toggle="popover"]').popover();
            $(".jiaofei").click(function(){
                var select = $(this).parents('form');
                submit(select,'/ujn-msu/ujn_msu/index.php/Msu/Web/web_pay','POST','缴费成功！');
            });
        })
    </script>
</body>

</html>