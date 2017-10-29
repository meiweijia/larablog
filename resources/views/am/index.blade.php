@extends('am.main')

@section('title')首页@endsection

@section('content')
    @foreach($articles as $article)
        <article class="am-g blog-entry-article">
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-img">
                <img src="/assets/i/f10.jpg" alt="" class="am-u-sm-12">
            </div>
            <div class="am-u-lg-6 am-u-md-12 am-u-sm-12 blog-entry-text">
                <span><a href="" class="blog-color">分类 &nbsp;</a></span>
                <span> @路人甲 &nbsp;</span>
                <span>{{substr($article['created_at'],0,10)}}</span>
                <h1><a href="/article/{{$article['id']}}">{{$article['title']}}</a></h1>
                <p class="post-pre">{{$article['content_nohtml']}}</p>
            </div>
        </article>
    @endforeach
    {!! preg_replace("~(/page/\d+)?\?page=~", '/page/', $articles->links()) !!}
@endsection