<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="">

  <title>中电瑞铠后台管理系统</title>

  <!-- Bootstrap core CSS -->
  <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/Public/css/login/style.css" rel='stylesheet' type='text/css' />
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">



  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>

  <![endif]-->
</head>

<body>
<div class="main" >
<style>
  .s_center {
    margin-left: auto;
    margin-right: auto;
  }
  .btn{
    margin-left: 6px;
    width:90%;
    
}
</style>
<div class="login">
    <div class="inset">
    <form class="xform-signin" enctype="multipart/form-data"  method="post" >
      <!-- <h2 class="form-signin-heading">请登录</h2> -->
      <label class="sr-only">用户名</label>
      <input type="text"  class="textbox" name="username" placeholder="请填写用户名" required autofocus>
      <br />
      <label  class="sr-only">密码</label>
      <input type="password" name="password" id="inputPassword" class="password" placeholder="密码" required>
      <br />
      <button  class="btn btn-lg btn-primary btn-block"  type="button" onclick="login.check()">登录</button>
    </form>
  </div>
</div> <!-- /container -->
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>

<script src="/Public/js/admin/login.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</div>
</body>
</html>