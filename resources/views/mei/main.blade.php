<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/nprogress.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
	<!--<link rel="stylesheet" href="css/style.css" />-->
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script>
//		$(document).ready(function(){NProgress.start();});
//		$(window).load(function(){NProgress.done();});
	</script>

</head>

<body>
<div class="container">
	<a href="/" class="/" style="float: left;margin: 20px 10px 10px 10px;">
		<img src="/img/logo.png" />
	</a>
	<nav class="nav navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/"><i class="fa fa-home fa-sm"></i> 首页</a></li>
					<li><a href="about"><i class="fa fa-male fa-sm"></i> 关于</a></li>
				</ul>
				<!--<div class="navbar-form  navbar-right">
                    <a href="#" class="navber-link">登录</a>
                </div>-->
			</div>
		</div>
	</nav>
	<div class="row">
		<div id="pjax" class="col-lg-8">
			@yield('post')
		</div>
		<!--侧栏-->
		<div class="celan col-lg-4 hidden-sm hidden-xs hidden-md">
			<!--搜索-->
			<div class="input-group">
				<input type="text" class="form-control" placeholder="输入关键字">
				<span class="input-group-btn"><button class="btn btn-default" type="button">搜索</button></span>
			</div>

			<!--联系-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Contact</h3>
				</div>
				<div class="panel-body contact">
					<span class="feed"><a href="/feed" title="订阅" target="_blank"><i class="fa fa-feed fa-3x"></i></a></span>
					<span class="qq"><a href="/" title="QQ" target="_blank"><i class="fa fa-qq fa-3x"></i></a></span>
					<span class="weibo"><a href="http://weibo.com/mayh12" title="新浪微博" target="_blank"><i class="fa fa-weibo fa-3x"></i></a></span>
					<span class="twitter"><a href="http://twitter.com/meiweijia" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></span>
					{{--<span class="mobile"><a href="/" title="手机"><i class="fa fa-mobile fa-3x" target="_blank"></i></a></span>--}}
					<span class="github"><a href="http://github.com/kubill" title="github" target="_blank"><i class="fa fa-github fa-3x"></i></a></span>
				</div>
			</div>
			<!--简介-->
			<div class="panel panel-default">
				<div class="panel-body" style="margin: 5px;">
					<img>
					<dl class="skill">
						<h3>技能</h3>
						<dt>前端</dt>
						<dd>精通Extjs&nbsp</dd>
						<dd>熟悉jQuery</dd>
						<dd>了解css、bootstrap</dd>
						<dt>后端</dt>
						<dd>精通laravel、lumen</dd>
						<dd>会ASP.NET</dd>
						<dt>系统</dt>
						<dd>熟悉Windows XP后各版本Windows</dd>
						<dd>会Linux基本操作</dd>
					</dl>
				</div>
			</div>

			<div class="well">更多精彩，敬请期待...</div>

		</div>
	</div>
	<footer class="footer" style="text-align: center;    border-top: 2px solid #eee;">
			<p>&copy; 2014-<?php echo date('Y');?> <a style="color:#45BCF9" href='/' title="梅渭甲个人博客">夜风</a> All rights reserved |
				基于<a style="color:rgb(251, 128, 105)" href='http://lumen.laravel.com' title="为速度而生的 Laravel 框架" target="_blank"> lumen</a>
				<a target="_blank" href="/sitemap.xml"> | 网站地图</a> |
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254960549'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254960549' type='text/javascript'%3E%3C/script%3E"));</script>
			</p>
	</footer>
</div>
<script type='text/javascript' src='/js/nprogress.js'></script>
<script type='text/javascript' src='/js/pjax.js'></script>
<script type='text/javascript' src='/js/mei.js'></script>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
	var duoshuoQuery = {short_name:"meiweijia"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0]
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
	function pajx_loadDuodsuo(){
		var dus=$(".ds-thread");
		if($(dus).length==1){
			var el = document.createElement('div');
			el.setAttribute('data-thread-key',$(dus).attr("data-thread-key"));//必选参数
			el.setAttribute('data-url',$(dus).attr("data-url"));
			DUOSHUO.EmbedThread(el);
			$(dus).html(el);
		}
//		var dus1=$(".ds-thread-count");
//		if($(dus1).length>=1){
//			var el = document.createElement('div');
//			el.setAttribute('data-thread-key',$(dus1).attr("data-thread-key"));//必选参数
//			el.setAttribute('data-url',$(dus1).attr("data-url"));
//			DUOSHUO.EmbedThread(el);
//			$(dus1).html(el);
//		}
	}
</script>
<!-- 多说公共JS代码 end -->

</body>
</html>