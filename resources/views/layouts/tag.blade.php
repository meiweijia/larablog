<div class="card border-0 shadow">
    <div class="card-header">标签</div>
    <div class="card-body">
        @foreach($tags as $tag)
            <a href="{{ route('getArticleByTag',$tag->uri) }}" class="btn btn-sm btn-outline-primary mb-1">{{ $tag->title }}</a>
        @endforeach
    </div>
</div>
