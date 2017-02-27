<?php
function show($status,$message,$data=array()){
    $result = array('status' => $status,
                    'message'=> $message,
                    'data'   => $data,
    );
    exit(json_encode($result));
}
function getMd5Password($password) {
    return md5($password . C('MD5_PRE'));
}
function getMenuType($type) {
    //m=a=="0"?"紅色":(a=="1"?“藍色”：“白色”)
    return $type ==0 ? '配件':($type=="1"?'半成品':'成品');
}
function status($status) {
    if ($status==0) {
    	$str = '关闭';
    }elseif ($status==1) {
    	$str = '正常';
    }elseif ($status==-1) {
    	$str = '删除';
    }
    return $str;
}
function getAdminMenuUrl($nav) {
	$url = '/admin.php?c='.$nav['c'].'&a='.$nav['a'];
	if ($nav['f']=='index') {
		$url = '/admin.php?c='.$nav['c'];
	}
	return $url;
}
function getActive($navc) {
	$c = strtolower(CONTROLLER_NAME);
	if (strtolower($navc)==$c) {
		return 'class="active"';
	}
	return '';
}