<?php if (!defined('THINK_PATH')) exit();?><<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>测试数据</title>
</head>
<body>
<?php if(is_array($nlist)): foreach($nlist as $key=>$vo): ?><p> <?php echo ($vo["name"]); ?> </p><?php endforeach; endif; ?>	
</body>
</html>