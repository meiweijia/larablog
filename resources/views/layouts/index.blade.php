@extends('layouts.main')

@section('content')
    @foreach($articles as $article)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><a href="{{route('articles.show',$article->id)}}">{{$article->title}}</a></h4>
                <span>
                    <i class="fa fa-user"></i> <a href="javascript:void(0)">{{$article['author']}}</a>
                    | <i class="fa fa-clock-o"></i> {{$article->created_at}}
                    | <i class="fa fa-folder-open-o"></i> <a href="{{route('Category', $article->category)}}"> {{$article->category_name}}</a>
                </span>
            </div>
            <div class="panel-body">
                <div class="blog-post">
                    <p class="blog-post-content">
                        {{ $article->excerpt }}
                    </p>
                    <div class="text-right"><a class="btn btn-default" href="{{route('articles.show',$article->id)}}">阅读全文>></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(count($articles)<1)
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>暂无内容</h3>
            </div>
        </div>
    @endif
    <nav aria-label="Page navigation" class="text-right">
        {!! preg_replace("~(/page/\d+)?\?page=~", '/page/', $articles->links()) !!}
    </nav>
@endsection