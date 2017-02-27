<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>测试数据</title>
</head>
<body>
<?php if(is_array($nlist)): $i = 0; $__LIST__ = $nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> <?php echo ($vo["name"]); echo ($vo["comment"]); ?> </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</foreach>	
</body>
</html>