<?php include_once('page.class.php');?>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<?php
$pageSize=20;
$total=1000;
pageft($total,$pageSize,0,0,0,5);
//第一个0显示数字  第二个1显示概况 第三个显示下拉 第四个显示数字数量
?>
<h1>分页配置效果预览</h1>
<br />	
参数:pageft($total,$pageSize,0,0,0,5);<br />
		<div class="digg"><?php echo $pagenav;?></div><hr />
