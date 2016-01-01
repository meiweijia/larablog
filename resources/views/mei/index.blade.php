@extends('mei.main')
@section('title')
    <?php echo '夜风 - 梅渭甲的个人博客'; ?>
@stop

@section('post')
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 0;
    if ($page > 1) {
        echo "<script>document.title= '夜风 - 梅渭甲的个人博客 - 第{$page}页';</script>";
    }
    ?>
    <div class="page-title">
        <h3 class="f16"><span>最新发布</span></h3>
    </div>
    <ul class="posts singlepost">
        <?php
        foreach ($posts as $post) {
            $img_url = getImgs($post->post_content, 0);
            $web_url = getcwd();
            $img_def_url = '/img/thumbnail/' . rand(1, 5) . '.png';
            $img_path = $web_url . $img_url;
            $img_url = is_file($img_path) ? $img_url : $img_def_url;
            $short_title = mb_substr(strip_tags($post->post_title), 0, 40, 'UTF-8');
            $content = mb_ereg_replace('　　', "\n　　", (strip_tags($post->post_content)));;
            $content = strlen($content) > 100 ? mb_substr($content, 0, 100, 'UTF-8') . '...' : $content;
            $post_date = substr($post->created_at, 0, 10);
            $img_url = '//nzsnlf38y.qnssl.com' . $img_url;
            echo "<li class='post' style='position:relative;'>
                         <div class='short excerpt oh'>
                            <div class='ohs'>

                            <div class='hidden-xs  he_border2'  style='float:left;width:240px;height: 180px;margin-bottom: 20px;    line-height: 180px;text-align: center;'>
                                <img src='{$img_url}' alt='缩略图' style='max-width: 100%;max-height: 100%;width: auto;height: auto;' />
                                <div class='he_border2_caption'>
                                    <!--p class='he_border2_caption_p'>{$post->post_title}</p-->
                                    <a class='he_border2_caption_a' href='/post/{$post->id}.html'></a>
                                </div>
                            </div>
                        <header>
                        <a class='label label-important' href='javascript:(0)'>{$post->sort}<i class='label-arrow'></i></a>
                            <h2 class='title'><a href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h2>
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

                        <p class='fl'>
                        {$content}
                        </p>
                        </div>
                </div>
                <a class='read-more label label-important' href='/post/{$post->id}.html'>阅读全文</a>

            </li>";sadf
        }
        ?>

    </ul>
    <nav class="pjax" style="text-align: center">
        <?php echo $posts->render();  ?>
    </nav>
    <script>setNavActive('home');</script>
@stop