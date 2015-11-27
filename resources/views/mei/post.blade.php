@extends('mei.main')

@section('post')
    <?php echo "<script>document.title= '{$post->post_title} - 夜风';</script>";?>
    <div id="content" class="right-col-fixed">

                <div class="posts fullwidth singlepost">
                        <div class="short arc-con">
                            <h1><?php echo $post->post_title; ?></h1>
                            <p class="posted meta">
                                <span class="date_time">发布时间：<?php echo substr($post->created_at,0,10) ;?></span>
                                <span class="postedby">作者：夜风</span>
                                <span class="postview">分类：<a href="javascript:;" rel="category tag">HTML/CSS</a></span>
                            </p>
                            <hr>
                            <div class="post-content"><?php echo $post->post_content; ?></div>

                        </div>
                        <p></p>
                    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>


                        <!-- release post start -->
                        <div id="related-posts">
                            <div class="caption">相关推荐：</div>
                            <div class="related">
                                <ul>
                                    <li><a href="/post/553.html" title="测试"><img
                                                    src="http://static.meibk.com/img/nolook.png"
                                                    alt="测试" width="120" height="120"></a>

                                        <div><a href="/post/553.html">测试</a>
                                        </div>
                                    </li>
                                    <li><a href="/post/553.html" title="测试"><img
                                                    src="http://static.meibk.com/img/nolook.png"
                                                    alt="测试" width="120" height="120"></a>

                                        <div><a href="/post/553.html">测试</a>
                                        </div>
                                    </li>
                                    <li><a href="/post/553.html" title="测试"><img
                                                    src="http://static.meibk.com/img/nolook.png"
                                                    alt="测试" width="120" height="120"></a>

                                        <div><a href="/post/553.html">测试</a>
                                        </div>
                                    </li>
                                    <li><a href="/post/553.html" title="测试"><img
                                                    src="http://static.meibk.com/img/nolook.png"
                                                    alt="测试" width="120" height="120"></a>

                                        <div><a href="/post/553.html">测试</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                </div>

            <!--  END Page  -->

        <!--  END Clearfix  -->
    </div>
    <div class="title" id="comments">
        <h3>评论</h3>
    </div>
    <!-- 多说评论框 start -->
    <?php echo "<div class='ds-thread' data-thread-key='{$post->id}' data-title='{$post->post_title}' data-url='".home_url()."post/{$post->id}.html'></div>"; ?>
            <!-- 多说评论框 end -->
@stop