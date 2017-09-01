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
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">MSU用户</h1>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#adduser">添加用户</button>
                  <!-- Modal -->
                  <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">
                                     <span aria-hidden="true">&times;</span>
                                     <span class="sr-only">Close</span>
                                   </button>
                                  <h4 class="modal-title" id="myModalLabel">添加用户</h4>
                              </div>
                                
                              <!-- Modal Body -->
                              <div class="modal-body">
                                  <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/User/user_create" method="post">
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">姓名</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="姓名" name="name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">账号</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="账号" name="account">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">密码</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="密码" name="password">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">学院</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control " placeholder="学院" name="organization" id="add-organization">
                                              <!--<div class="gov_search_suggest" >-->
                                                    <!--<ul></ul>-->
                                              <!--</div>-->
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">校区</label>
                                          <div class="col-sm-10">
                                              <select class="selectpicker" name="location">
                                                  <option value="西" selected = selected>西校区</option>
                                                  <option value="东">东校区</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">用户组</label>
                                          <div class="col-sm-10">
                                              <!--<input type="text" class="form-control" name="gid">-->
                                              <!--TODO 此地方写死-->
                                              <select class="selectpicker" name="gid">
                                                  <option value="维护员" selected = selected>维护员</option>
                                                  <option value="学院管理员">学院管理员</option>
                                                  <option value="缴费管理员">缴费管理员</option>
                                                  <option value="超级管理员">超级管理员</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">联系方式</label>
                                          <div class="col-sm-10">
                                              <input type="tel" class="form-control" name="numbers">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label class="col-sm-2 control-label">属性</label>
                                          <div class="col-sm-10">
                                              <input type="text" class="form-control" placeholder="属于哪一届" name="level">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-sm-12 col-sm-offset-2">
                                              <button type="submit" class="btn btn-primary">提交</button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                  <form class="form-inline" action="/ujn_msu/index.php/Msu/User/search" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="输入姓名搜索" name="name">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                  </form>
                </div>
              </div>
              </br>
              <div class="row">
                  <ul id="myTab" class="nav nav-tabs">
                      <li class="active">
                          <a href="#xixiao" data-toggle="tab">西校区</a>
                      </li>
                      <li>
                          <a href="#dongxiao" data-toggle="tab">东校区</a>
                      </li>
                  </ul>

                  <div id="myTabContent" class="tab-content">
                      <div class="tab-pane fade in active" id="xixiao">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th>序号</th>
                                <th>姓名</th>
                                <th>账号</th>
                              
                                <th>学院</th>
                                <th>用户组</th>
                                <th>联系方式</th>
                                <th>属性</th>
                                <th>操作</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                  <td><?php echo ($vo["uid"]); ?></td>
                                  <td><?php echo ($vo["name"]); ?></td>
                                  <td><?php echo ($vo["account"]); ?></td>
    
                                  <td><?php echo ($vo["organization"]); ?></td>
                                  <td><?php echo ($vo["gid"]); ?></td>
                                  <td><?php echo ($vo["numbers"]); ?></td>
                                  <td><?php echo ($vo["level"]); ?></td>
                                  <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?php echo ($vo["uid"]); ?>">修改</button>
                                    <div class="modal fade" id="edit<?php echo ($vo["uid"]); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">
                                                 <span aria-hidden="true">&times;</span>
                                                 <span class="sr-only">Close</span>
                                               </button>
                                              <h4 class="modal-title" id="myModalLabel">修改</h4>
                                          </div>
                                          <!-- Modal Body -->
                                          <div class="modal-body">
                                            <form class="form-horizontal" role="form" action="/ujn_msu/index.php/Msu/User/user_update" method="post">
                                                <div class="form-group">
                                                    <input type="hidden" name='uid' value="<?php echo ($vo["uid"]); ?>"/><br><!-- 隐藏UID -->
                                                    <label class="col-sm-2 control-label">姓名</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="姓名" name="name" value="<?php echo ($vo["name"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">账号</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="账号"  name="account" value="<?php echo ($vo["account"]); ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">密码</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="密码"  name="password" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label ">学院</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="学院"  name="organization" value="<?php echo ($vo["organization"]); ?>" id="modify-organization">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">校区</label>
                                                    <div class="col-sm-10">
                                                        <select class="selectpicker" name="location">
                                                            <option value="西" selected = selected>西校区</option>
                                                            <option value="东">东校区</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">用户组</label>
                                                    <div class="col-sm-10">
                                                        <!--<input type="text" class="form-control" name="gid">-->
                                                        <!--TODO 此地方写死-->
                                                        <select class="selectpicker" name="gid">
                                                            <option value="维护员" selected = selected>维护员</option>
                                                            <option value="学院管理员">学院管理员</option>
                                                            <option value="缴费管理员">缴费管理员</option>
                                                            <option value="超级管理员">超级管理员</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">联系方式</label>
                                                    <div class="col-sm-10">
                                                        <input type="tel" class="form-control" value="<?php echo ($vo["numbers"]); ?>"  name="numbers">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">属性</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" placeholder="属于哪一届" value="<?php echo ($vo["level"]); ?>"  name="level">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12 col-sm-offset-2">
                                                        <button type="submit" class="btn btn-primary">提交修改</button>
                                                    </div>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#delete">删除</button>
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                               <span aria-hidden="true">&times;</span>
                                               <span class="sr-only">Close</span>
                                             </button>
                                            <h4 class="modal-title" id="myModalLabel">删除</h4>
                                          </div>
                                          <div class="modal-body">
                                            <form class="form-horizontal" role="form">
                                              <div class="form-group">
                                                  <label class="col-xs-10 col-xs-offset-2">输入删除该人员的姓名</label>
                                                  <div class="col-xs-8 col-xs-offset-2">
                                                      <input type="text" class="form-control" placeholder="姓名">
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <div class="col-sm-12 col-sm-offset-2">
                                                      <a href="/ujn_msu/index.php/Msu/User/user_del/uid/<?php echo ($vo["uid"]); ?>"><button type="button" class="btn btn-danger" >确认删除</button></a>
                                                  </div>
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
                      <div class="tab-pane fade" id="dongxiao">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th>姓名</th>
                                <th>账号</th>
                                <th>用户组</th>
                                <th>联系方式</th>
                                <th>属性</th>
                                <th>操作</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <!-- <td>吕炳辰</td>
                                <td>SB</td>
                                <td>维护员</td>
                                <td>85170110</td>
                                <td>SB</td>
                                <td></td> -->
                              </tr>
                            </tbody>
                        </table>
                      </div>
                  </div>
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
    <script src="/ujn_msu/Public/js/bootstrap3-typeahead.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/ujn_msu/Public/js/plugins/morris/raphael.min.js"></script>
    <script src="/ujn_msu/Public/js/plugins/morris/morris.min.js"></script>
    <script src="/ujn_msu/Public/js/plugins/morris/morris-data.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <!--<script src="/ujn_msu/Public/js/search.js"></script>-->
<script>

    //@Billgo-------------------------------------
    var server = 'http://localhost/ujn-msu/ujn_msu/index.php/Msu/';
    var $addOrganization = $('#add-organization');
    var $modifyOrganization = $('#modify-organization');
    var ajaxSearch = {
        source:function(query,process){
            $.ajax({
                type: "GET",
                url:server+"user/getOrganization",
                async: false,
                data: {keyword:query},
                dataType:"json",
                success:function (data) {
                    var key = data;
                    var aData = [];
                    for(var i=0;i<key.length;i++){
                        if(key[i].organization!=""){
                            aData.push(key[i].organization);
                        }
                    }
                    //将返回的数据传递给实现搜索输入框的输入提示js类
                    process(aData);
                }
            });
        }
    };
    $addOrganization.typeahead(ajaxSearch);
    $modifyOrganization.typeahead(ajaxSearch);
    //---------------------------------------------
</script>
</body>

</html>