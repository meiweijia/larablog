@extends('am.main')
@section('title')
    {{$article->title}}
@endsection
@section('content')
    <article class="am-article blog-article-p">
        <div class="am-article-hd">
            <h1 class="am-article-title blog-text-center">{{$article->title}}</h1>
            <p class="am-article-meta blog-text-center">
                <span><a href="#" class="blog-color">分类 &nbsp;</a></span>-
                <span><a href="#">@路人甲 &nbsp;</a></span>-
                <span><a href="#">{{substr($article->created_at,0,10)}}</a></span>
            </p>
        </div>
        <div class="am-article-bd">
            @php
                echo $article->content;
            @endphp
        </div>
    </article>

    <div class="am-g blog-article-widget blog-article-margin">
        <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <span class="am-icon-tags"> &nbsp;</span><a href="#">标签</a> , <a href="#">TAG</a> , <a href="#">啦啦</a>
            <hr>
            <a href=""><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
            <a href=""><span class="am-icon-wechat am-icon-fw blog-icon"></span></a>
            <a href=""><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
        </div>
    </div>
    <hr>
    <div class="am-g blog-author blog-article-margin">
        <div class="am-u-sm-3 am-u-md-3 am-u-lg-2">
            <img src="assets/i/f15.jpg" alt="" class="blog-author-img am-circle">
        </div>
        <div class="am-u-sm-9 am-u-md-9 am-u-lg-10">
            <h3><span>作者 &nbsp;: &nbsp;</span><span class="blog-color">路人甲</span></h3>
            <blockquote>
                <ul>
                    <li>本站发布的原创文章、评论、图片等内容的版权均归本站所有，允许在互联网范围内，转载该作品，并在使用时指明作者姓名、作品名称及作品来源。</li>
                    <li>本站转载、复制、截图等方式获取他人内容，如有侵权请联系删除。</li>
                </ul>
            </blockquote>

        </div>
    </div>
    <hr>
    <ul class="am-pagination blog-article-margin">
        <li class="am-pagination-prev"><a href="#" class="">&laquo; 一切的回顾</a></li>
        <li class="am-pagination-next"><a href="">不远的未来 &raquo;</a></li>
    </ul>

    <hr>

    <form class="am-form am-g">
        <h3 class="blog-comment">评论</h3>
        <fieldset>
            <div class="am-form-group am-u-sm-4 blog-clear-left">
                <input type="text" class="" placeholder="名字">
            </div>
            <div class="am-form-group am-u-sm-4">
                <input type="email" class="" placeholder="邮箱">
            </div>

            <div class="am-form-group am-u-sm-4 blog-clear-right">
                <input type="password" class="" placeholder="网站">
            </div>

            <div class="am-form-group">
                <textarea class="" rows="5" placeholder="一字千金"></textarea>
            </div>

            <p><button type="submit" class="am-btn am-btn-default">发表评论</button></p>
        </fieldset>
    </form>

    <hr>
@endsection