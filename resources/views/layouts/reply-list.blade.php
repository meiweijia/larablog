<div class="card w-100 shadow">
    <div class="card-body">
        {{--@if(!$comments->count())--}}
        {{--<p>暂时没评论，快成为第一个评论的人吧。</p>--}}
        {{--@endif--}}
        <comment-component submit-uri="{{route('api.articles.comment.store',$article_id)}}"></comment-component>
    </div>
</div>
