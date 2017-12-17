@extends('layouts.main')

@section('content')
    @foreach($articles as $article)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3><a href="{{route('article.show',$article->id)}}">{{$article->title}}</a></h3>
                <span>
                    <i class="fa fa-user"></i> <a href="#">{{$article['author']}}</a>
                    | <i class="fa fa-clock-o"></i> {{$article->created_at}}
                </span>
            </div>
            <div class="panel-body">
                    <div class="blog-post">
                        <p class="blog-post-content">
                            {{ $article->excerpt }}
                        </p>
                        <div class="text-right"><a class="btn btn-default" href="{{route('article.show',$article->id)}}">阅读全文>></a></div>
                    </div>
            </div>
        </div>
    @endforeach
    <nav aria-label="Page navigation" class="text-right">
        {!! preg_replace("~(/page/\d+)?\?page=~", '/page/', $articles->links()) !!}
    </nav>
@endsection