<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<link rel="dns-prefetch" href="//apps.bdimg.com">
<link rel="dns-prefetch" href="//hm.baidu.com">
<meta http-equiv="X-UA-Compatible" content="IE=11,IE=10,IE=9,IE=8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="baidu-site-verification" content="6U3ObRnSUJ" />
<meta http-equiv="Cache-Control" content="no-siteapp">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>@yield('title')</title>
<link rel='stylesheet' id='da-bootstrap-css'  href='/static/css/bootstrap.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='da-fontawesome-css'  href='/static/css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='da-main-css'  href='/css/yf-main.css' type='text/css' media='all' />
<script type='text/javascript' src='/lib/jquery/1.9.1/jquery.min.js'></script>
<meta name="keywords" content="梅氏起源,家族,梅世科,梅文贵,梅丽娥,梅文献,梅渭甲,梅浩,梅氏族谱,七甲坪,wordpress,PHP" />
<meta name="description" content="一个关于梅渭甲的博客，主要内容包括：梅氏起源、梅氏概括、梅氏族谱、梅氏名人，家族，一些开发者的相关博文，大部分内容都是站长所在地的梅氏相关信息。" />
<link rel="shortcut icon" href="/favicon.ico">
<!--link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://www.daqianduan.com/static/img/icon-144x144.png"-->
<!--[if lt IE 9]><script src="http://apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script><![endif]-->
<!-- <script language="javascript">if(top !== self){location.href = "about:blank";}</script> -->
<style type="text/css">
.pjax_loading {position: fixed;top: 45%;left: 45%;display: none;z-index: 999999;width: 124px;height: 124px;background: url('images/pjax_loading.gif') 50% 50% no-repeat;}
.pjax_loading1 {position: fixed;top: 0;left: 0;z-index: 999999;display: none;width: 100%;height: 100%;background-color: #4c4c4c;opacity: .2}
.widget_ui_ads,.d_banner,.banner-post,.banner-related {display:none!important;display:none}</style>
</head>
@yield('body')
<header class="header">
<div class="container">
	<!--logo-->
	<h1 class="logo"><a href="/" title="夜风 — 梅渭甲的个博客">夜风</a></h1>
	<div class="brand">上善若水<br>水善利万物而不争</div>
	<!--菜单导航 -->
	<ul class="site-nav site-navbar">
		<li class="navto-home active"><a href="/">首页</a></li>
		<li class="navto-wp"><a href="javascript:alert('建设中');">菜单1</a></li>
		<li class="navto-front"><a href="javascript:(0);">下拉菜单<i class="fa fa-angle-down"></i></a>
			<ul class="sub-menu">
				<li class="navto-htmlcss"><a href="javascript:alert('建设中');">下拉菜单1</a></li>
				<li class="navto-javascript"><a href="javascript:alert('建设中');">下拉菜单2</a></li>
				<li class="navto-news"><a href="javascript:alert('建设中');">下拉菜单3</a></li>
				<li class="navto-resource"><a href="javascript:alert('建设中');">下拉菜单4</a></li>
			</ul>
		<li class="navto-see"><a href="/about">关于</a></li>
		<li id="navto-search" class="navto-search"><a href="javascript:(0);" class="search-show active"><i class="fa fa-search"></i></a></li>
	</ul>

	{{--顶部菜单--}}
	<div class="topbar">
		<ul class="site-nav topmenu">
			<li id="menu-item-37" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-37"><a href="javascript:;" class="signin-loader">Hi, 请登录</a></li>
			<li class="menusns">
				<a href="javascript:;">关注本站 <i class="fa fa-angle-down"></i></a>
				<ul class="sub-menu">
					<li><a class="sns-wechat" href="javascript:;" title=""><i class="fa fa-wechat"></i> 微信</a></li>
					<li><a target="_blank" rel="external nofollow" href="/"><i class="fa fa-weibo"></i> 微博</a></li>
					<li><a target="_blank" rel="external nofollow" href="/"><i class="fa fa-tencent-weibo"></i> 腾讯微博</a></li>
					<li><a target="_blank" href="/feed/"><i class="fa fa-rss"></i> RSS订阅</a></li>
				</ul>
			</li>
		</ul>

		{{--&nbsp; &nbsp; <a href="javascript:;" class="signup-loader">我要注册</a>--}}
	</div>

</div>
</header>
<div class="site-search">
<div class="container">
	<form method="get" class="site-search-form" action="/" >
		<input class="search-input" name="s" type="text" placeholder="输入关键字搜索"><button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
	</form>
</div>
</div>

<section class="container">
	<div class="content-wrap">
		<div id="content" class="content">
			@yield('post')
		</div>
	</div>
	<!--右侧-->
	<aside class="sidebar">
{{--<div class="widget widget_ui_textads">--}}
	{{--<a class="style02" href="http://themebetter.com/theme/dux" target="_blank"><strong>吐血推荐</strong>--}}
		{{--<h2>DUX主题 新一代主题</h2>--}}
		{{--<p>DUX Wordpress主题是大前端当前使用主题，是大前端积累多年Wordpress主题经验设计而成；更加扁平的风格和干净白色的架构会让网站显得内涵而出色...</p>--}}
	{{--</a>--}}
{{--</div>--}}
		{{----}}

		<div class="widget widget_ui_fronts"><h3>后端开发</h3>
		<ul class="ebox">
			{{--<li class="ebox-i ebox-01">--}}
				{{--<h4>lumen</h4>--}}
				{{--<p>为速度而生的 Laravel 框架</p>--}}
				{{--<a class="btn btn-default btn-sm" target="_blank" href="http://lumen.laravel-china.org"></a>--}}
			{{--</li>--}}
			<li class="ebox-i ebox-05 ebox-100">
				<h4 style="color:rgb(251, 128, 105)">Laravel</h4>
				<p>
					<a style="color:rgb(251, 128, 105)" target="_blank" href="http://www.laravel.com/" title="The PHP Framework For Web Artisans">laravel官网</a> |
					<a style="color:rgb(251, 128, 105)" target="_blank" href="http://www.laravel-china.org" title="简洁、优雅的PHP框架">laravel中文网</a> |
					<a style="color:rgb(251, 128, 105)" target="_blank" href="http://lumen.laravel-china.org/" title="为速度而生的 Laravel 框架">Lumen</a> |
					<a target="_blank" href="http://phphub.org/" title="中文开发者社区">PHPHub</a>
				</p>
				<a class="btn btn-default btn-sm" target="_blank" href="http://www.laravel.com/">立即使用</a>
			</li>
		</ul>
		</div>
		<div class="widget widget_text">
			<h3 class="style02">微博</h3>
			<div class="textwidget">
				<iframe width="100%" height="550" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=0&skin=5&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=2673696245&verifier=933a2a79&colors=d6f3f7,ffffff,666666,0082cb,ecfbfd&dpc=1"></iframe>
			</div>
		</div>
		<div class="widget widget_ui_tags"><h3>标签云</h3><div class="items"><a href="/">CSS (50)</a></div>


</div>
</aside>

</section>
<footer class="footer">
<div class="container">
	<p>&copy; 2014-<?php echo date('Y');?> <a style="color:#45BCF9" href='/' title="梅渭甲个人博客">夜风</a> All rights reserved |
	  基于<a style="color:rgb(251, 128, 105)" href='http://lumen.laravel.com' title="为速度而生的 Laravel 框架" target="_blank"> lumen</a>
	  <a target="_blank" href="/sitemap.xml"> | 网站地图</a> |
		<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254960549'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254960549' type='text/javascript'%3E%3C/script%3E"));</script>
	  </p>
</div>
</footer>
<script>
window.jsui={
    www: '<?php echo home_url(); ?>',
    uri: '<?php echo home_url(); ?>'+'static',
    ver: '5.1.2',
};
</script>
<script type='text/javascript' src='/js/pjax.js'></script>
<script type='text/javascript' src='/js/nprogress.js'></script>
<link rel='stylesheet' href='/css/nprogress.css'/>
<script type='text/javascript' src='/js/loader.js'></script>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
	var duoshuoQuery = {short_name:"meiweijia"};
	(function() {
		var ds = document.createElement('script');
		ds.type = 'text/javascript';ds.async = true;
		ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//nzsnlf38y.qnssl.com/embed.js';
		ds.charset = 'UTF-8';
		(document.getElementsByTagName('head')[0]
		|| document.getElementsByTagName('body')[0]).appendChild(ds);
	})();
</script>
<!-- 多说公共JS代码 end -->
</body>
</html>