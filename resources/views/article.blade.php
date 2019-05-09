@extends('layouts.app')

@section('content')
    <div class="d-block card mb-4 shadow">
        <div class="card-body">
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
        <p>本站发布的原创文章、评论、图片等内容的版权均归本站所有，允许在互联网范围内，转载该作品，并在使用时指明作者姓名、作品名称及作品来源。</p>
        <p>本站转载、复制、截图等方式获取他人内容，如有侵权请联系 <a href="mailto:meiweijia@gmail.com">我</a> 删除。</p>
    </div>
    @component('layouts.reply-list',['comments' => $article->comments])
    @endcomponent

    <div class="card mb-4 reply-box shadow">
        <div class="card-body" id="reply-form">
            @component('layouts.reply-form',['article_id'=>$article->id])
            @endcomponent
        </div>
    </div>
@endsection
