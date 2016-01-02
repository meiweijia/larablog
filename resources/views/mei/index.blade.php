@extends('mei.main')
@section('title')
    <?php echo '夜风 - 梅渭甲的个人博客'; ?>
@stop
@section('keywords')
    <meta name="keywords" content="梅渭甲,夜风,梅渭甲的个人博客,extjs,laravel">
@stop
@section('description')
    <meta name="description" content="一个关于梅渭甲的博客，内容包含：laravel、extjs使用心得、问题，日常记录，开发笔记，以及本博客开发过程。">
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
        foreach ($data['posts'] as $post) {
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
            echo "<ul class='media-list'>
                    <li class='media'>
                        <div class='hidden-xs' style='float:left;width:240px;height: 180px;margin-bottom: 20px;    line-height: 180px;text-align: center;'>
                            <a class='he_border2_caption_a' href='/post/{$post->id}.html'>
                                <img class='img-thumbnail' src='{$img_url}' alt='缩略图' style='max-width: 100%;max-height: 100%;width: auto;height: auto;' />
                            </a>
                        </div>
                        <div class='media-body'>
                            <h3 class='media-heading'><span class='label label-primary'>{$post->sort}</span><a href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h3>
                            <p>
                            <span class='date_time'><i class='fa fa-clock-o fa-1'></i> {$post_date}</span>
										<span>
										<i class='fa fa-user fa-1'></i> 夜风
										</span>
							</p>
                            <p>{$content}</p>
                        </div>
                    </li>
                    <a class='read-more label label-important' href='/post/{$post->id}.html'>更多..</a>
                  </ul>";
        }
        ?>

    </ul>
    <nav class="pjax" style="text-align: center">
        <?php echo $data['posts']->render();  ?>
    </nav>
    <script>setNavActive('home');</script>
@stop
@section('sort')
    @foreach ($data['sorts'] as $sort)
        <div class="category">
            <a href="/category/{{$sort['alias']}}">{{$sort['name']}}</a>
        </div>
    @endforeach
@stop

@section('footer')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 hidden-xs footer-left">
                <div class="footer-content">
                    <h4>微语</h4>
                    <a href="#" style="float: left">
                        <img style="width:64px;height: 64px; margin-bottom: 10px;" src="/img/tx.png" alt="..." class="img-thumbnail">
                    </a>
                    <dl style="float: left;margin-top: 21px;margin-bottom: 0px;">
                        <dd>夜风</dd>
                        <dd>2015-12-31</dd>
                    </dl>
                    <div style="margin-left: 150px">
                        人生最大的悲哀不是失去太多，而是计较太多，这也是导致一个人不快乐的重要原因。
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="footer-content">
                    <h4>友情链接</h4>
                    <div class="f-links">
                        <a>暂无</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop