@extends('layouts.main')

@section('title')
    最新发布
@endsection

@section('content')
    @foreach($articles as $article)
        <!-- Blog Post Start -->
        <div class="col-md-12 blog-post">
            <div class="post-title">
                <a href="/article/{{$article['id']}}"><h1>{{$article['title']}}</h1></a>
            </div>
            <div class="post-info">
                <span>{{substr($article['created_at'],0,10)}} / by <a href="javascrip:(0)">路人甲</a></span>
            </div>
            <p class="index_post">{{$article['content_nohtml']}}</p>
            <a href="/article/{{$article['id']}}"
               class="button button-style button-anim fa fa-long-arrow-right"><span>更多</span></a>
        </div>
        <!-- Blog Post End -->
    @endforeach
    {{--{{$articles->links()}}--}}
    {!! preg_replace("~(/page/\d+)?\?page=~", '/page/', $articles->links()) !!}
    {{--<div class="col-md-12 text-center">--}}
        {{--<a href="javascript:void(0)" id="load-more-post" class="load-more-button">更多</a>--}}
        {{--<div id="post-end-message"></div>--}}
    {{--</div>--}}
@endsection