<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){
        if(session('adminUser')) {
            $this->redirect('/index.php?m=admin&c=index');
        }
    	$this->display();
    }
    public function check(){

    $username = $_POST['username'];
    $password = $_POST['password'];
    //var_dump($username);exit;
    //var_dump($password.$username);exit;ok
    if(!trim($username)){
       return show(0,'用户名不为空');
    }
     if(!trim($password)){
       return show(0,'密码不为空');
     }
     $ret = M('admin')->field('username,password')->where('username'=="$username")->find();
     //var_dump($ret);exit;
     //print_r($ret);
     if($ret['username'] != $username) {
         return show(0,'该用户名不存在');
     }
     if($ret['password'] != getMd5Password($password)){
         return show(0,'密码错误');
     }
     session('adminUser',$ret);
     return show(1,'登录成功!');
     
    }
    
    public function loginout() {
        session('adminUser', null);
        redirect('/index.php?m=admin&c=login&a=index');
    }
}