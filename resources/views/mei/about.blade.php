@extends('mei.main')
@section('title')
<?php echo '关于 - 梅渭甲的个人博客'; ?>
@stop
@section('keywords')
<meta name="keywords" content="梅渭甲,关于,夜风">
@stop
@section('description')
<meta name="description" content="一个关于梅渭甲的博客，主要内容包括：梅氏相关信息，日常记录，开发笔记，以及本博客开发过程。">
@stop
@section('post')
	<?php echo "<script>document.title= '关于 - 梅渭甲的个人博客';</script>";?>
	<br>
	<br>
	<h1 label="标题居左" style="font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: left; margin: 0px 0px 10px;">
		<span style="font-size: 20px;">关于我</span>
	</h1>
	<ul class="media-list">
		<li class="media">
			<div class="media-left" style='float:left;width:240px;height: 180px;margin-bottom: 20px;    line-height: 180px;text-align: center;'>
				<a href="#">
					<img class='img-thumbnail' src="img/tx.png" alt="..." style='max-width: 100%;max-height: 100%;width: auto;height: auto;'>
				</a>
			</div>
			<div class="media-body">
				<p>
					爱好网络安全技术，Windows玩的很溜，Linux一般般。
				</p>
				<p>
					爱好骑自行车。
				</p>
				<h4 class="media-heading">联系</h4>
				<ul class="list-icons">
					<li><i class="fa fa-location-arrow fa-1x"></i> Changsha</li>
					<li><i class="fa fa-mobile fa-2x"></i> +086 18670031244</li>
					<li><i class="fa fa-envelope fa-1x"></i> meiweijia@gmail.com</li>
				</ul>
			</div>
		</li>
	</ul>
	<!--技能-->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">技能</h3>
		</div>
		<div class="panel-body" style="margin: 5px;">
			<div class="skillbar clearfix " data-percent="60%">
				<div class="skillbar-title" style="background: rgb(251, 128, 105);"><span>laravel</span></div>
				<div class="skillbar-bar" style="background: rgba(251, 128, 105, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">60%</div>
			</div> <!-- End Skill Bar -->

			<div class="skillbar clearfix " data-percent="30%">
				<div class="skillbar-title" style="background: rgb(49, 112, 143);"><span>PHP</span></div>
				<div class="skillbar-bar" style="background: rgba(49, 112, 143, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">30%</div>
			</div> <!-- End Skill Bar -->

			<div class="skillbar clearfix " data-percent="35%">
				<div class="skillbar-title" style="background: rgb(169, 68, 66);"><span>javascript</span></div>
				<div class="skillbar-bar" style="background: rgba(169, 68, 66, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">35%</div>
			</div> <!-- End Skill Bar -->

			<div class="skillbar clearfix " data-percent="65%">
				<div class="skillbar-title" style="background: rgb(120, 143, 55);"><span>extjs</span></div>
				<div class="skillbar-bar" style="background: rgba(120, 143, 55 , 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">65%</div>
			</div> <!-- End Skill Bar -->


			<div class="skillbar clearfix " data-percent="15%">
				<div class="skillbar-title" style="background: rgb(51, 122, 183);"><span>ASP.NET</span></div>
				<div class="skillbar-bar" style="background: rgba(51, 122, 183, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">15%</div>
			</div> <!-- End Skill Bar -->

			<div class="skillbar clearfix " data-percent="22%">
				<div class="skillbar-title" style="background: rgb(76, 188, 246);"><span>jquery</span></div>
				<div class="skillbar-bar" style="background: rgba(76, 188, 246, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">22%</div>
			</div> <!-- End Skill Bar -->

			<div class="skillbar clearfix " data-percent="10%">
				<div class="skillbar-title" style="background: rgb(138, 109, 59);"><span>css</span></div>
				<div class="skillbar-bar" style="background: rgba(138, 109, 59, 0.66);margin-left: 99px"></div>
				<div class="skill-bar-percent">10%</div>
			</div> <!-- End Skill Bar -->

		</div>
	</div>
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
		&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:#45B6F7" href="http://git.oschina.net/kubill/lumen" target="_blank" title="源码在这">源码在这</a> 欢迎指正错误和贡献代码。<br/>
	</p>
	<br>
	<br>
	<script>setNavActive('about');</script>
@stop