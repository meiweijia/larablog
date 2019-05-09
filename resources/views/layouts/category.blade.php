<div class="card mb-4 shadow">
    <div class="card-header">分类</div>
    <div class="filter-content">
        <div class="list-group list-group-flush">
            @foreach($categories as $category)
                <a href="{{ route('getArticleByCategory',$category->uri )}}" class="list-group-item">{{ $category->title }}<span class="float-right badge badge-light round">{{ $category->count }}</span> </a>
            @endforeach
        </div>
    </div>
</div>
