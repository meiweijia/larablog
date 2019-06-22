@extends('layouts.app')

@section('content')
    <div class="d-block card mb-4 shadow">
        <div class="card-body article">
            <h2 class="text-center">{{ $article->title }}</h2>
            <p>
                <i class="far fa-folder-open pr-1"></i><a
                    href="{{ route('getArticleByCategory',$article->category->uri) }}">{{ $article->category->title }}</a>
                <span class="mx-1">|</span><i class="far fa-calendar-alt pr-1"></i><a href="javascript:void(0)"
                                                                                      class="text-dark"
                                                                                      title="{{ $article->created_at }}">{{ $article->created_at->diffForHumans() }}</a>
                <span class="mx-1">|</span><i class="far fa-comment-alt pr-1"></i><a href="#reply-form"
                                                                                     class="text-dark">{{ $article->comment_count }}</a>
            </p>
            @if($article->tags->count())
                <p><i class="fas fa-tags"></i>
                    @foreach($article->tags as $tag)
                        <a href="{{ route('getArticleByTag',$tag->uri) }}"><span
                                class="label label-info">{{ $tag->title }}</span></a>
                    @endforeach
                </p>
            @endif
            <hr>
            {!! Parsedown::instance()->text($article->content) !!}
        </div>
    </div>

    <div class="d-block mb-4 alert alert-warning shadow" role="alert">
        <p>本站發佈的原創文章、評論、圖片等內容的版權均歸本站所有，允許在網路範圍內，轉載該作品，並在使用時指明作者姓名、作品名稱及作品來源。</p>
        <p>本站轉載、複製、截圖等方式獲取他人內容，如有侵權請聯繫 <a href="mailto:meiweijia@gmail.com">我</a> 刪除。</p>
    </div>
    @component('layouts.reply-list',[
    'comments' => $article->comments,
    'article_id' => $article->id
    ])
    @endcomponent
@endsection
