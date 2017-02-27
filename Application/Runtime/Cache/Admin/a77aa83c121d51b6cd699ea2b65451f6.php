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
                        <i class="fa fa-edit"></i> 编辑
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">

                <form class="form-horizontal" id="singcms-form">
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">采购名:</label>
                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" id="inputname" placeholder="请填写采购名" value="<?php echo ($collect["name"]); ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">商品编号:</label>
                        <div class="col-sm-5">
                            <input type="text" name="idnumber" class="form-control" id="inputname" placeholder="请填写商品编号" value="<?php echo ($collect["idnumber"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">规格型号:</label>
                        <div class="col-sm-5">
                            <input type="text" name="idmodel" class="form-control" id="inputname" placeholder="请填写规格型号" value="<?php echo ($collect["idmodel"]); ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">性质:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="status" id="optionsRadiosInline1" value="半成品" <?php if($collect["status"] == 半成品): ?>checked<?php endif; ?>> 半成品
                            <input type="radio" name="status" id="optionsRadiosInline2" value="配件" <?php if($collect["status"] == 配件): ?>checked<?php endif; ?>> 配件
                            <input type="radio" name="status" id="optionsRadiosInline2" value="成品" <?php if($collect["status"] == 成品): ?>checked<?php endif; ?>> 成品
                        </div>

                    </div>
                     <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">数量:</label>
                        <div class="col-sm-5">
                            <input type="text" name="number" class="form-control" id="inputname" placeholder="请填写数量(个/台)" value="<?php echo ($collect["number"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">单价:</label>
                        <div class="col-sm-5">
                            <input type="text" name="price" class="form-control" id="inputname" placeholder="请填写单价￥/每(个、台)" value="<?php echo ($collect["price"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">入库人:</label>
                        <div class="col-sm-5">
                            <input type="text" name="buyer" class="form-control" id="inputname" placeholder="请填写入库人" value="<?php echo ($collect["buyer"]); ?>">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">经办人:</label>
                        <div class="col-sm-5">
                            <input type="text" name="auditor" class="form-control" id="inputname" placeholder="请填写经办人" value="<?php echo ($collect["auditor"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  for="inputname" class="col-sm-2 control-label">入库时间:</label>
                        <div class="col-sm-5">
                            <input readonly="true" type="text" name="time" class="form-control" id="inputname" placeholder="" value="<?php echo ($collect["time"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">备注:</label>
                        <div class="col-sm-5">
                            <input type="text" name="comment" class="form-control" id="inputname" placeholder="请填写备注信息" value="<?php echo ($collect["comment"]); ?>">
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="inputname" class="col-sm-2 control-label">父类采购ID:</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="parentid">
                                <option value="0">一级采购</option>
                                <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$parent): $mod = ($i % 2 );++$i;?><option value="<?php echo ($parent["menu_id"]); ?>"><?php echo ($parent["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>-->
                    <!-- <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">采购类型:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="type" id="optionsRadiosInline1" value="1" <?php if($menu["type"] == 1): ?>checked<?php endif; ?>> 后台采购
                            <input type="radio" name="type" id="optionsRadiosInline2" value="0" <?php if($menu["type"] == 0): ?>checked<?php endif; ?>> 前端栏目
                        </div>

                    </div> -->
                   <!--  <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">模块名:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="m" id="inputPassword3" placeholder="模块名如admin" value="<?php echo ($menu["m"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">控制器:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="c" id="inputPassword3" placeholder="控制器如index" value="<?php echo ($menu["c"]); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">方法:</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="f" id="inputPassword3" placeholder="方法名如index" value="<?php echo ($menu["f"]); ?>">
                        </div>
                    </div> -->
                    <!--<div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">是否为前台采购:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="type" id="optionsRadiosInline1" value="0" checked> 否
                            <input type="radio" name="type" id="optionsRadiosInline2" value="1"> 是
                        </div>

                    </div>-->

                  <!--   <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">状态:</label>
                        <div class="col-sm-5">
                            <input type="radio" name="status" id="optionsRadiosInline1" value="1" <?php if($menu["status"] == 1): ?>checked<?php endif; ?>> 开启
                            <input type="radio" name="status" id="optionsRadiosInline2" value="0" <?php if($menu["status"] == 0): ?>checked<?php endif; ?>> 关闭
                        </div>

                    </div> -->
                    <input type="hidden" name="id" value="<?php echo ($collect["id"]); ?>"/>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" id="singcms-button-submit">更新</button>
                        </div>
                    </div>
                </form>


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