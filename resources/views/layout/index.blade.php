@extends('layout.main')

@section('title','夜风 - 梅渭甲个人博客')

@section('websiteDescription')
	<h2>上 善 若 水</h2>
	<p style=" color: #7AE4DE;">水善利万物而不争，处众人之所恶，故几于道。居，善地；心，善渊；与，善仁；言，善信；政，善治；事，善能；动，善时。夫唯不争，故无尤。</p>
@stop

@section('navi')
	
@stop

@section('post')
<?php
	echo '<h2 class="title_tj"><p>最新<span>发布</span></p></h2>';
	// $posts_obj = json_decode($posts);
	// $posts=$posts_obj->data;
	foreach($posts as $post)
	{
		$img_url = getImgs($post->post_content,0);
		$web_url = getcwd();
		$img_def_url = '/images/thumbnail.png';
		$img_url = $web_url.$img_url;
		//echo $img_url;
		$img_url = is_file($img_url)?$img_url:$img_def_url;
		$post_date = substr($post->post_date,0,10);
		echo "<h3>[<a href='/fenlei' target='_blank'>分类</a>]<a href='/post/{$post->id}.html' target='_blank'>".$post->post_title."</a></h3>";
		echo "<figure><img src='".$img_url."'></figure>";
		echo "<ul><p>".mb_substr(strip_tags($post->post_content),0,300,'gb2312')."</p></ul>";
		echo '<div class="dateview"><a title="'.$post->post_title.'" href="/post/'.$post->id.'.html" target="_blank" class="readmore">阅读全文>></a><span>'.$post_date.'</span><span>阅读(10)</span><span>评论(2)</span> <a href="javascript:(0)" class="post-like" data-pid="533" data-event="like"><i class="glyphicon glyphicon-thumbs-up"></i>赞(0)</a></span></div>';
	}
	//print_r($posts->lastPage());
	//$cur_page = $_GET['page'];
	$total = $posts->total();//总文章数
	$count_page = $posts->count(); //总页数
	$url = $_SERVER['HTTP_HOST'];
	//getPageHtml($cur_page,$count_page);
	echo '<div class="quotes">'.pageft($total,5).'</div>';
	//echo '<div class="badoo">'.$posts->render().'</div>';
	//echo $posts->render();
?>
@stop

@section('rank')
	<li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
	<li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
	<li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
	<li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
	<li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
	<li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
	<li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
	<li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
@stop

@section('paih')
	<li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
	<li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
	<li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
	<li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
	<li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
@stop

@section('website')
	<li><a href="/">这里要修改</a></li>
	<li><a href="/"><?php test();?></a></li>
	<li><a href="/">友链1</a></li>
	<li><a href="/">友链1</a></li>
	<li><a href="/">友链1</a></li>
	<li><a href="/">友链1</a></li>
@stop