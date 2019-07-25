<div class="card mb-4 shadow sidebar">
    <div class="card-body">
        <h3 class="side-title">文章分类</h3>
        <ul class="list-unstyled">
            @foreach($categories as $category)
                <li><a href="{{ route('getArticleByCategory',$category->uri )}}" title="{{$category->title}}">{{$category->title}} <span class="float-right">{{ $category->count }}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
