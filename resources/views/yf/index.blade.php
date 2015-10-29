@extends('yf.main')
@section('title')
    <?php echo '夜风 - 梅渭甲的个人博客'; ?>
@stop
@section('body')
    <body class="home blog">
    @stop
    @section('post')
            <!--轮换图片-->
    <div id="homeslider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#homeslider" data-slide-to="0" class="active"></li>
            <li data-target="#homeslider" data-slide-to="1"></li>
            <li data-target="#homeslider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

            <div class="item active"><a target="_blank" href="/"><img src="static/img/820x200/3.jpg" alt=""></a></div>
            <div class="item"><a target="_blank" href="/"><img src="static/img/820x200/2.jpg" alt=""></a></div>
            <div class="item"><a target="_blank" href="/"><img src="static/img/820x200/5.jpg" alt=""></a></div>
        </div>
        <a class="left carousel-control" href="#homeslider" role="button" data-slide="prev"><i
                    class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" href="#homeslider" role="button" data-slide="next"><i
                    class="fa fa-angle-right"></i></a>
    </div>
    <!--顶置-->
    <!--article class="excerpt-see excerpt-see-index">
        <h2><a class="red" href="http://www.daqianduan.com/job">【前端招聘】</a> <a href="http://www.daqianduan.com/6130.html" title="唱吧-北京最淘科技有限公司招聘前端开发工程/架构师_大前端">唱吧-北京最淘科技有限公司招聘前端开发工程/架构师</a></h2>
        <p class="note">唱吧是一款娱乐且K歌效果出众的App。第一版于2012年5月31日正式登陆苹果App Store。 上线短短5天，跃升至App中国区总榜第1名，至今一直保持在总榜的前列，每天有超过百万活跃用户为此着迷。 目前iPhone及Android版本...</p>
    </article-->

    <div class="title">
        <h3>最新发布</h3>
        <!-- <ul class="more">
            <li><a target="_blank" href="http://www.daqianduan.com/theme/xiu">XIU主题</a></li>
            <li><a target="_blank" href="http://www.daqianduan.com/theme/d8">D8主题</a></li>
            <li><a target="_blank" href="http://www.daqianduan.com/nav">前端导航</a></li>
            <li><a target="_blank" href="http://www.daqianduan.com/tools">前端工具箱</a></li>
        </ul> -->
    </div>
    <?php
    foreach ($posts as $post) {
        $img_url = getImgs($post->post_content, 0);
        $web_url = getcwd();
        $img_def_url = '/images/thumbnail.png';
        $img_url = $web_url . $img_url;
        //echo $img_url;
        $img_url = is_file($img_url) ? $img_url : $img_def_url;
        $content = mb_substr(strip_tags($post->post_content), 0, 80, 'UTF-8');
        $post_date = substr($post->created_at, 0, 10);
        echo "<article class='excerpt excerpt-1'>
		<a target='_blank' class='focus' href='/post/{$post->id}.html'><img src='{$img_url}' class='thumb' style='display: inline;'/></a>
		<header><a class='cat' href='/fenlei'>分类<i></i></a> <h2><a target='_blank' href='/post/{$post->id}.html' title='{$post->post_title}'>{$post->post_title}</a></h2></header>
		<p class='meta'><time><i class='fa fa-clock-o'></i>{$post_date}</time><a target='_blank' class='pc' href='/post/{$post->id}.html#comments'><i class='fa fa-comments-o'></i><span class='ds-thread-count' data-thread-key='$post->id' data-count-type='comments'></span></a></p>
		<p class='note'>{$content}</p>
		<a target='_blank' href ='/post/{$post->id}.html' class='cat' style='float:right'>阅读全文</a>
		</article>";

    }
    $total = $posts->total();//总文章数
    $count_page = $posts->count(); //总页数
    $total_page = $posts->total();
    $url = $_SERVER['HTTP_HOST'];
    //getPageHtml($cur_page,$count_page);
    echo '<div class="pagination"><ul>' . pageft($total, 5) . '</ul></div>';
    ?>
@stop