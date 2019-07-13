@extends('layouts.app')

@section('content')
    @if($articles->count())
        @foreach($articles as $article)
            <article class="card mb-4 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{ route('articles.show',$article->id) }}">
                                <img class="img-thumbnail w-100"
                                     src="{{ asset('storage/uploads/'.$article->cover) }}">
                            </a>
                        </div>

                        <div class="col-sm-7">
                            <h4 class="h4 pt-2 pt-md-0 pt-sm-0">
                                <a href="{{ route('articles.show',$article->id) }}"
                                   class="text-dark">{{$article->title}}</a>
                            </h4>
                            <p>
                                <i class="far fa-folder-open pr-1"></i><a
                                        href="{{ route('getArticleByCategory',$article->category->uri) }}">{{ $article->category->title }}</a>
                                <span class="mx-1">|</span><i class="far fa-calendar-alt pr-1"></i><a
                                        href="javascript:void(0)" class="text-dark"
                                        title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</a>
                                <span class="mx-1">|</span><i class="far fa-comment-alt pr-1"></i><a
                                        href="{{ route('articles.show',$article->id) }}#comment-box-root">{{ $article->comment_count }}</a>
                            </p>
                            @if($article->tags->count())
                                <p><i class="fas fa-tags"></i>
                                    @foreach($article->tags as $tag)
                                        <a href="{{ route('getArticleByTag',$tag->uri) }}"><span
                                                    class="label label-info">{{ $tag->title }}</span></a>
                                    @endforeach
                                </p>
                            @endif
                            <p>{{ $article->excerpt }}</p>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
        <nav class="pb-2" aria-label="Page navigation">
            {{ $articles->appends(Request::all())->links('layouts.pagination') }}
        </nav>
    @else
        <div class="d-block card shadow">
            <div class="card-body">
                <h3>暂无内容</h3>
            </div>
        </div>
    @endif
@endsection
