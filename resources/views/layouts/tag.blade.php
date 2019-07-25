<div class="card border-0 shadow sidebar">
    <div class="card-body">
        <h3 class="side-title">标签云</h3>
    @foreach($tags as $tag)
            <a href="{{ route('getArticleByTag',$tag->uri) }}" class="btn btn-sm btn-outline-dark btn-tag mb-1">{{ $tag->title }}</a>
        @endforeach
    </div>
</div>
