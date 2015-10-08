@extends('yf.main')

@section('body')
	<body class="single single-post postid-6149 single-format-standard comment-open">
	@stop

	@section('post')
		<header class="article-header">
			<h1 class="article-title"><?php echo $post->post_title; ?></h1>
			<div class="article-meta">
				<span class="item">2015-09-17</span>
				<span class="item">分类：<a href="http://www.daqianduan.com/front/htmlcss" rel="category tag">HTML/CSS</a></span>
				<span class="item post-views">阅读(5163)</span>
				<span class="item">评论(2)</span>
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
			<span class="bds_count" data-cmd="count"></span>
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
			<h3>评论 <b>2</b></h3>
		</div>
		<div id="respond" class="no_webshot">
			<form action="http://www.daqianduan.com/wp-comments-post.php" method="post" id="commentform">
				<div class="comt">
					<div class="comt-title">
						<img data-src="https://secure.gravatar.com/avatar/" class="avatar avatar-100" height="100" width="100">				<p><a id="cancel-comment-reply-link" href="javascript:;">取消</a></p>
					</div>
					<div class="comt-box">
						<textarea placeholder="【注意】WP主题相关问题请直接去会员中心提交工单，评论不处理问题！" class="input-block-level comt-area" name="comment" id="comment" cols="100%" rows="3" tabindex="1" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
						<div class="comt-ctrl">
							<div class="comt-tips"><input type='hidden' name='comment_post_ID' value='6149' id='comment_post_ID' />
								<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
								<p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="c4f253653b" /></p><label for="comment_mail_notify" class="checkbox inline hide" style="padding-top:0"><input type="checkbox" name="comment_mail_notify" id="comment_mail_notify" value="comment_mail_notify" checked="checked"/>有人回复时邮件通知我</label><p style="display: none;"><input type="hidden" id="ak_js" name="ak_js" value="129"/></p></div>
							<button type="submit" name="submit" id="submit" tabindex="5">提交评论</button>
						</div>
					</div>
					<div class="comt-comterinfo" id="comment-author-info" >
						<ul>
							<li class="form-inline"><label class="hide" for="author">昵称</label><input class="ipt" type="text" name="author" id="author" value="" tabindex="2" placeholder="昵称"><span class="text-muted">昵称 (必填)</span></li>
							<li class="form-inline"><label class="hide" for="email">邮箱</label><input class="ipt" type="text" name="email" id="email" value="" tabindex="3" placeholder="邮箱"><span class="text-muted">邮箱 (必填)</span></li>
							<li class="form-inline"><label class="hide" for="url">网址</label><input class="ipt" type="text" name="url" id="url" value="" tabindex="4" placeholder="网址"><span class="text-muted">网址</span></li>
						</ul>
					</div>
				</div>

			</form>
		</div>
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
@stop