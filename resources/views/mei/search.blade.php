@extends('mei.main')
@section('title')
    <?php
    $page = isset($_GET['page'])?$_GET['page']:0;
    echo $page>1?$posts->words." - 夜风 - 第{$page}页":$posts->words.' - 夜风';
    ?>
@stop
@section('keywords')
    <meta name="keywords" content="梅渭甲,夜风,梅渭甲的个人博客">
@stop
@section('description')
    <meta name="description" content="一个关于梅渭甲的博客，主要内容包括：梅氏相关信息，日常记录，开发笔记，以及本博客开发过程。">
@stop
@section('post')
    <div class="page-title">
        <h3 class="f16"><span><?php echo '“'.$posts->words.'”的搜索结果'; ?></span></h3>
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
            $content = mb_ereg_replace('　　', "\n　　", (strip_tags($post->post_content)));
            $content = strlen($content) > 100 ? mb_substr($content, 0, 100, 'UTF-8').'...' : $content;
            $post_date = substr($post->created_at, 0, 10);
            $img_url = '//static.meibk.com/' . $img_url;
            echo "<li class='post'>
                         <div class='short excerpt oh'>
                            <div class='ohs'>
                            <div class='hidden-xs ' style='float:right;width:240px;height: 180px;margin-bottom: 20px;    line-height: 180px;text-align: center;'><img src='{$img_url}' alt='缩略图' style='max-width: 100%;max-height: 100%;width: auto;height: auto;' /></div>
                        <header>
                            <a class='label label-important' href='javascript:(0)'>资源共享<i class='label-arrow'></i></a>
                            <h2><a href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h2>
                        </header>
                        <div class='posted'>
                            <span class='date_time'><i class='fa fa-clock-o fa-1'></i> {$post_date}</span>
										<span>
											<i class='fa fa-user fa-1'></i> admin
										</span>
										<!--<span>
											<a href='/post/{$post->id}.html#comments' class='comment-link' title='{$post->post_title}'><i class='fa fa-comment-o fa-1'></i><span class='ds-thread-count' data-thread-key='$post->id' data-count-type='comments'></span></a>
										</span>-->
                        </div>

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
    <script>setNavActive('home');</script>
@stop