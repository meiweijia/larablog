@extends('layout.main')

@section('title',$post->post_title.' - 博客')

@section('websiteDescription')
	<h2>上 善 若 水</h2>
	<p style=" color: #7AE4DE;">水善利万物而不争，处众人之所恶，故几于道。居，善地；心，善渊；与，善仁；言，善信；政，善治；事，善能；动，善时。夫唯不争，故无尤。</p>
@stop

@section('post')
<?php
	
		echo "<h2  style='text-align: center;color: #7AE4DE;'>".$post->post_title."</h2>";
		echo "<ul><p>".$post->post_content."</p></ul>";
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