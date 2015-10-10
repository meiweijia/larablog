@extends('yf.main')

@section('body')
	<body class="single single-post postid-6149 single-format-standard comment-open">
	@stop

	@section('post')
	<?php echo "<script>document.title= '{$post->post_title} - 夜风';</script>";?>
		<header class="article-header">
			<h1 class="article-title"><?php echo $post->post_title; ?></h1>
			<div class="article-meta">
				<span class="item">发布时间：<?php echo substr($post->created_at,0,10) ;?></span>
				<span class="item">分类：<a href="javascript:;" rel="category tag">HTML/CSS</a></span>
				<span class="item"></span>
			</div>
		</header>
		<article class="article-content">
			<?php echo $post->post_content; ?>
		</article>
		{{--分享--}}
		<div class="action-share bdsharebuttonbox">
			分享：
			<a class="bds_qzone" data-cmd="qzone"></a><a class="bds_tsina" data-cmd="tsina"></a><a class="bds_weixin" data-cmd="weixin"></a><a class="bds_tqq" data-cmd="tqq"></a><a class="bds_sqq" data-cmd="sqq"></a><a class="bds_renren" data-cmd="renren"></a><a class="bds_douban" data-cmd="douban"></a><a class="bds_fbook" data-cmd="fbook"></a>
		</div>
		{{--标签--}}
		<div class="article-tags">标签：<a href="http://www.daqianduan.com/tag/css" rel="tag">CSS</a></div>

		{{--推荐--}}
		<div class="relates"><div class="title"><h3>相关推荐</h3></div>
			<ul>
				{{--推荐列表--}}
				{{--<li><a href="http://www.daqianduan.com/6142.html">CSS3技巧：fit-content水平居中</a></li>--}}
			</ul>
		</div>

		{{--评论框--}}
		<div class="title" id="comments">
			<h3>评论</h3>
		</div>
	<!-- 多说评论框 start -->
	<?php echo "<div class='ds-thread' data-thread-key='{$post->id}' data-title='{$post->post_title}' data-url='".home_url()."post/{$post->id}.htmlx'></div>"; ?>
	<!-- 多说评论框 end -->
		{{--评论列表--}}
		<div id="postcomments">
			<ol class="commentlist">
				{{--<li class="comment even thread-even depth-1" id="comment-91061"><span class="comt-f">#2</span><div class="comt-avatar"><img data-src="http://www.daqianduan.com/wp-content/avatar/e13fc09e689033e3cb2d520bf485af14" class="avatar avatar-100" height="100" width="100"></div><div class="comt-main" id="div-comment-91061"><p>涨姿势了！</p>--}}
						{{--<div class="comt-meta"><span class="comt-author">明天更好</span>1周前 (09-28)<a class='comment-reply-link' href="javascript:;" onclick='return addComment.moveForm( "div-comment-91061", "91061", "respond", "6149" )' aria-label='回复给明天更好'>回复</a></div></div></li><!-- #comment-## -->--}}
				{{--<li class="comment odd alt thread-odd thread-alt depth-1" id="comment-90505"><span class="comt-f">#1</span><div class="comt-avatar"><img data-src="http://www.daqianduan.com/wp-content/avatar/3fb0aba2b9d8b666352fe9747e76640a" class="avatar avatar-100" height="100" width="100"></div><div class="comt-main" id="div-comment-90505"><p>不错，不错，多谢站长分享！</p>--}}
						{{--<div class="comt-meta"><span class="comt-author"><a href='http://www.starzool.com' rel='external nofollow' class='url'>星族VIP论坛</a></span>2周前 (09-22)<a class='comment-reply-link' href="javascript:;" onclick='return addComment.moveForm( "div-comment-90505", "90505", "respond", "6149" )' aria-label='回复给星族VIP论坛'>回复</a></div></div></li><!-- #comment-## -->--}}
			</ol>
			<div class="pagenav">
			</div>
		</div>
		<script>
		$("body").removeClass();
		$("body").addClass("single single-post postid-6149 single-format-standard comment-open");
		</script>
@stop