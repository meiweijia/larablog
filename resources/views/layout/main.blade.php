<?php
?>
<html>
<head>
<meta charset="gb2312">
<title>@yield('title')</title>
<meta name="keywords" content="梅氏起源,家族,梅世科,梅文贵,梅丽娥,梅文献,梅渭甲,梅浩,梅氏族谱,七甲坪,wordpress,PHP" />
<meta name="description" content="一个关于梅渭甲的博客，主要内容包括：梅氏起源、梅氏概括、梅氏族谱、梅氏名人，家族，一些开发者的相关博文，大部分内容都是站长所在地的梅氏相关信息。" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.1.1/css/bootstrap.min.css"/>
<link href="/css/base.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/css/css.css" />
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="wrapper">
  <header>
    <h1 id="logo"><a href="/" title="梅渭甲个人博客"><img src="/images/logo.png" width="260" height="60" alt="梅渭甲个人博客"></a></h1>
    <nav>
      <ul>
		<li id="active"><a href="/">首页</a></li>
		<li><a href="javascript:alert('建设中');">图片</a></li>
		<li><a href="javascript:alert('建设中');">关于我</a></li>
		<li><a href="javascript:alert('建设中');">留言版</a></li>
      </ul>
    </nav>
  </header>
  <div class="banner">
    <div class="headerPic"><a href="/"><span>你好！</span></a></div>
    <div class="websiteDescription">
		@yield('websiteDescription')
    </div>
  </div>
  <div class="mainContent">
    <div class="bloglist" id="bloglist">
	@yield('post')
    </div>
  </div>
  <div class="sidebar">
    <div class="news">
      <!--iframe allowtransparency="true" frameborder="0" width="206" height="28" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=3&z=1&t=1&v=0&d=1&bd=0&k=000000&f=400040&q=1&e=0&a=1&c=54511&w=317&h=28&align=center"></iframe-->
      <h3>
        <p>随机<span>文章</span></p>
      </h3>
      <ul class="rank">
        @yield('rank')
      </ul>
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      <ul class="paih">
        @yield('paih')
      </ul>
      <h3 class="links">
        <p>友情<span>链接</span></p>
      </h3>
      <ul class="website">
        @yield('website')
      </ul>
      <!--div class="guanzhu">扫描二维码关注<span>杨青博客</span>官方微信账号</div-->
      <!--a href="/" class="weixin"><img src="/images/weixin.jpg"></a-->
	</div>
  </div>
  <div class="clearfloat"></div>
  <footer>
    <ul>
      &copy; 2014-<?php echo date('Y');?> <a href='/' title="梅渭甲个人博客">夜风</a> All rights reserved |
	  基于<a href='http://lumen.laravel.com' title="为速度而生的 Laravel 框架" target="_blank">lumen</a>
    </ul>
  </footer>
</div>
<script type="text/javascript" src="/js/jquery.twbsPagination.min.js"></script>
</body>
</html>

