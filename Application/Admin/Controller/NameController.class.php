<?php
/**
 * 后台测试
 */
namespace Admin\Controller;
use Think\Controller;
class NameController extends Controller {
    
    public function namelist(){
    	$data=M('Collect');
    	//var_dump($nlist);exit;
    	$nlist = $data->select();
    	//var_dump($nlist);exit;
    	$this->assign('nlist',$nlist);
    	$this->display('namelist');
    }
}