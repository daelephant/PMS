<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>中电瑞铠后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

</head>

    



<style type="text/css">
   /* td {
        width:500px;
    }*/
</style>

<body>

<div id="wrapper">

    <?php
 $navs = D("Menu")->getAdminMenus(); $index = 'index'; ?>



<script>　

var t = null;
t = setTimeout(time,1000);
function time(){
clearTimeout(t);
dt = new Date();
// var y = dt.getYear();
// var m = dt.getMonth();
// var d = dt.getDay();
var h = dt.getHours();
var m = dt.getMinutes();
var s = dt.getSeconds();
document.getElementById("timeShow").innerHTML= h + "时" + m + "分" + s + "秒";
t = setTimeout(time,1000);
}

</script>


 
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    
    <a class="navbar-brand" >中电瑞铠产品管理平台</a>
    
    <label id="timeShow" style="color:#C0C0C0;margin-top:25px;margin-left:25px;">正在载入：</label>
   
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    
    
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 超级管理员 <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/index.php?m=admin&c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php"><i class="fa fa-fw fa-dashboard"></i> 首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
        <a href="<?php echo (getAdminMenuUrl($nav)); ?>"><i class="fa fa-fw fa-bar-chart-o"></i><?php echo ($nav["name"]); ?></a>
      </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>

    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="/admin.php?c=menu">采购管理</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-edit"></i> 添加
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
<link rel="stylesheet" type="text/css" href="/Public/css/main.css" />        
<script type="text/javascript" src="/Public/js/jquery-2.0.2.js"></script>
<script type="text/javascript" src="/Public/js/duplicateElement.min.js"></script>

<script  type="text/javascript">
    $(function () {
        $('#additional').duplicateElement({
            "class_remove": ".remove",
            "class_create": ".create"
        });
        $(".button").click(function(){
            var data = $("#singcms-form").serialize();
            alert(data);
        });
        
    });
</script>
        <div class="row">
            <div class="col-lg-6">
                            <!-- start -->

                                                <table class="table table-bordered table-hover singcms-table">
                                                    <thead>
                                                    <tr>
                                                        <!-- <th width="14">排序</th>
                                                        <th style="width:150px;">id</th> -->
                                                        <th><div style="width:110px;">商品编号</div></th>
                                                        <th><div style="width:110px;">商品名</div></th>
                                                        <th><div style="width:110px;">规格型号</div></th>
                                                        <th><div style="width:110px;">性质</div></th>
                                                        <th><div style="width:110px;">数量</div></th>
                                                        <th><div style="width:110px;">金额</div></th>
                                                        <th><div style="width:110px;">入库人</div></th>
                                                        <th><div style="width:110px;">经办人</div></th>
                                                        <th><div style="width:110px;">入库时间</div></th>
                                                        <th><div style="width:110px;">备注</div></th>

                                                        <th><div style="width:55px;">操作</div></th>
                                                    </tr>
                                                    </thead>
                                                    
                                                   </table> 
                                                      <!-- <form  class="form-horizontal" id="singcms-form"> -->
                                                      <form id="myform" name="myform" action="/admin.php?c=menu&a=add" method="post">
                                                        <fieldset id="additional">
                                                         <table class="table table-bordered table-hover singcms-table">
                                                    
                                                     <tr>
                                                            
                                                        
                                                        <!-- <th width="14">排序</th> -->
                                                        <!-- <th style="width:15px;">1</th> -->
                                                        <td><input type="text" style="width:110px;" name="idnumber[]" class="form-control" id="inputname" placeholder="商品编号"></td>
                                                        <th><input type="text" name="name[]" style="width:110px;" class="form-control" id="inputname" placeholder="商品名"></th>
                                                        <th><input type="text" name="idmodel[]" style="width:110px;" class="form-control" id="inputname" placeholder="规格型号"></th>
                                                        <th>
                                                               <!--  <select name="status[]" style="width:110px;" class="form-control" id="inputname">
                                                                    <option disabled="" selected="">请选择</option>
                                                                    <option value="0">配件</option>
                                                                    <option value="1">半成品</option>
                                                                    <option value="2">成品</option>
                                                                </select> -->
                                                        <input type="text" name="status[]" style="width:110px;" class="form-control" id="inputname" placeholder="性质"></th>
                                                        <th><input type="text" name="number[]" style="width:110px;" class="form-control" id="inputname" placeholder="数量"></th>
                                                        <th><input type="text" name="price[]" style="width:110px;" class="form-control" id="inputname" placeholder="金额"></th>
                                                        <th><input type="text" name="buyer[]" style="width:110px;" class="form-control" id="inputname" placeholder="入库人"></th>
                                                        <th><input type="text" name="auditor[]" style="width:110px;" class="form-control" id="inputname" placeholder="经办人"></th>
                                                        <th><input type="text" name="time[]" style="width:110px;" class="form-control" id="inputname" placeholder="2016/11/11"></th>
                                                        <th><input type="text" name="comment[]" style="width:110px;" class="form-control" id="inputname" placeholder="备注"></th>

                                                        <!-- <th><span class="glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($collect["id"]); ?>"></span> </span></a></th> -->
                                                        <th >
                                                        <a href="javascript:void(0);"  class="btn remove">移除</a>
                                                        <a href="javascript:void(0);"  class="btn create">复制</a>
                                                        <!-- <input type="button"  style="width:50px;"  class="btn btn-success"  value="增加" id="addTable" onclick="add_tr(this)"/>
                                                            <input  type="button" style="width:50px;" class="btn btn-success"   value="删除" id="deleteTable" onclick="del_tr(this)"/> -->
                                                            </th>

                                                    
                                                    </tr>
                                                    </table>
                                                    </fieldset>
                                                    <!-- <?php if(is_array($collect_list)): $i = 0; $__LIST__ = $collect_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$collect): $mod = ($i % 2 );++$i;?>-->
                                                        <!-- <tr>
                                                            <td><input size="4" type="text" name="listorder[<?php echo ($menu["menu_id"]); ?>]" value="<?php echo ($menu["listorder"]); ?>"/></td>
                                                            <td><?php echo ($collect["id"]); ?>1</td>
                                                            <td><input type="text" name="name" class="form-control" id="inputname" placeholder="请填写采购名"></td>
                                                            <td><?php echo ($collect["name"]); ?></td>
                                                            <td><?php echo ($collect["idmodel"]); ?></td>
                                                            <td><?php echo (getMenuType($collect["status"])); ?></td>
                                                            <td><?php echo ($collect["number"]); ?></td>
                                                            <td><?php echo ($collect["price"]); ?></td>
                                                            <td><?php echo ($collect["time"]); ?></td>
                                                            <td><?php echo ($collect["number"]); ?></td>
                                                            <td><span class="glyphicon glyphicon-edit" aria-hidden="true" id="singcms-edit" attr-id="<?php echo ($collect["id"]); ?>"></span>    <a href="javascript:void(0)" attr-id="<?php echo ($collect["id"]); ?>" id="singcms-delete"  attr-a="menu" attr-message="删除"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
                                                        </tr> -->
                                                    <!--<?php endforeach; endif; else: echo "" ;endif; ?> -->

                                                   
                                               
                                                
                            <!-- end -->

                    <div style="margin-left:-180px;" class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 sub_btn">
                            <!-- <button type="button" class="btn btn-default button" id="singcms-button-submit">提交</button> -->
                            <input type="submit"  class="btn" value="提交">
                        </div>
                    </div>
                </form>
                

                <!-- end -->
              

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Morris Charts JavaScript -->
<script>

    var SCOPE = {
        'save_url' : '/admin.php?c=menu&a=add',
        'jump_url' : '/admin.php?c=menu',
    }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>