@extends('mei.main')
@section('title')
<?php echo '关于 - 梅渭甲的个人博客'; ?>
@stop
@section('post')
	<?php echo "<script>document.title= '关于 - 梅渭甲的个人博客';</script>";?>
	<br>
	<br>
	<h1 label="标题居左" style="font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;">
		<span style="font-size: 20px;">关于我</span>
	</h1>
	<ul class=" list-paddingleft-2" style="list-style-type: disc;">
		<li>
			<p>
				简介
			</p>
		</li>
	</ul>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我叫梅渭甲。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;熟练使用<span style="color: rgb(0, 176, 80);">Extjs</span>和<span style="color: rgb(251, 128, 105);">Laravel</span>。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;爱好网络安全技术，Windows玩的很溜，Linux一般般。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;爱好骑自行车。
	</p>
	<ul class=" list-paddingleft-2" style="list-style-type: disc;">
		<li>
			<p>
				联系
			</p>
			<p>
				QQ：542395819
			</p>
			<p>
				邮箱：meiweijia@gmail.com
			</p>
		</li>
	</ul>
	<p>
		<br/>
	</p>
	<h1 label="标题居左" style="font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;">
		<span style="font-size: 20px;">关于本站</span>
	</h1>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;本站出于兴趣爱好，抱着学习的心态，最近抽空写了这个博客。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;前端是基于bootstrap，借鉴了一些网络上的元素，后端是基于<a style="color:#fb8069" target="_blank" href="http://lumen.laravel.com" title="为速度而生的Laravel微型框架">lumen</a>框架编写而成。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;目前实现了列出文章、添加文章、评论、搜索等功能的基本功能。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;待添加功能：更新文章、删除文章、文章分类、菜单动态生成、图片展示功能等。。
	</p>
	<p>
		&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#45B6F7" href="https://github.com/kubill/lumen" target="_blank" title="源码在这">源码在这</a> 欢迎指正错误和贡献代码。<br/>
	</p>
	<br>
	<br>
	<script>setNavActive('about');</script>
@stop