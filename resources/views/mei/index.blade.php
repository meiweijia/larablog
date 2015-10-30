@extends('mei.main')
@section('title')
    <?php echo '夜风 - 梅渭甲的个人博客'; ?>
@stop
@section('body')
    <body class="home blog">
    @stop
    @section('post')
        <div class="page-title">
            <h3 class="f16"><span>最新发布</span></h3>
        </div>
        <ul class="posts singlepost">
                            <?php
                            foreach ($posts as $post) {
                            $img_url = getImgs($post->post_content, 0);
                            $web_url = getcwd();
                            $img_def_url = 'img/thumbnail.png';
                            $img_path = $web_url . $img_url;
                            $img_url = is_file($img_path) ? $img_url : $img_def_url;
                            $short_title = mb_substr(strip_tags($post->post_title), 0, 40, 'UTF-8');
                            $content = mb_substr(strip_tags($post->post_content), 0, 100, 'UTF-8');
                            $post_date = substr($post->created_at, 0, 10);
                            $img_url = '//7xiwox.com1.z0.glb.clouddn.com/'.$img_url;
                            echo "<li class='post'>
                         <div class='short excerpt oh'>
                            <div class='ohs'>
                        <header>
                            <a class='label label-important' href='/fenlei'>资源共享<i class='label-arrow'></i></a>
                            <h2><a href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h2>
                        </header>
                        <div class='posted'>
                            <span class='date_time'><i class='fa fa-clock-o fa-1'></i> {$post_date}</span>
										<span>
											<a href='about' target='_blank'><i class='fa fa-user fa-1'></i> admin</a>
										</span>
										<!--<span>
											<a href='/post/{$post->id}.html#comments' class='comment-link' title='{$post->post_title}'><i class='fa fa-comment-o fa-1'></i><span class='ds-thread-count' data-thread-key='$post->id' data-count-type='comments'></span></a>
										</span>-->
                        </div>
                        <img src='{$img_url}' style='float:right;width:240px;height: 180px;' />
                        <p class='fl'>
                        {$content}
                            <!--<a class='read-more label label-important' href='/post/{$post->id}.html'>阅读全文</a>-->
                        </p>
                        </div>
                </div>
            </li>";
                            }
                        ?>

        </ul>
        <nav style="text-align: center">
           <?php echo $posts->render();  ?>
        </nav>
@stop