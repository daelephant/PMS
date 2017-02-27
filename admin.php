<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

//检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

$_GET['m'] = (!isset($_GET['m']) || !$_GET['m']) ? 'admin' : $_GET['m'];
$_GET['c'] = (!isset($_GET['c']) || !$_GET['c']) ? 'index' : $_GET['c'];
$_GET['a'] = (!isset($_GET['a']) || !$_GET['a']) ? 'index' : $_GET['a'];
// 定义应用目录
define('APP_PATH','./Application/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单
 // $servern="localhost";
 //  $coninfo=array("Database"=>"Guard","UID"=>"sa","PWD"=>"hello1993");
 //  $conn=sqlsrv_connect($servern,$coninfo) or die ("连接失败!");
 //  if($conn){ 
 //            echo "Database connection established.<br />"; 
 //        }else{ 
 //            echo "Connection could not be established.<br />"; 
 //            die( print_r(sqlsrv_errors(), true)); 
 //        } 
 //  $val=sqlsrv_query($conn,"select * from Collect");
 //  //var_dump($val);exit;
 //  while($row=sqlsrv_fetch_array($val)){
 //    echo $row[0].$row[1].$row[2]."<br />";
 //  }
 //  sqlsrv_close($conn); 