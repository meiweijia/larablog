@if($comments->count())
    @foreach($comments as $comment)
        <div class="mb-4" id="reply-list-{{ $comment->order }}">
            <div class="comment-block card w-100 shadow">
                <div class="card-header">
                    <div>
                        @if($comment->user)
                            <img class="comment-avatar" src="{{ Avatar::create($comment->user->name)->toBase64() }}">
                            <span class="text-primary">{{ $comment->user->name }}</span>
                        @else
                            <img class="comment-avatar" src="{{ Avatar::create($comment->name)->toBase64() }}">
                            <span class="text-primary">{{ $comment->name }}</span>
                        @endif
                            <span id="comment-id-{{ $comment->id }}" class="float-right mt-2">{{ $comment->order }}楼</span>
                    </div>
                </div>
                <div class="card-body">
                    @if($comment->parent)
                        回复 <a href="#reply-list-{{ $comment->parent->order }}">{{ $comment->parent->order }}</a> 楼：
                        <hr>
                    @endif
                        {!! $comment->comment !!}
                    <div class="bottom-comment">
                        <div class="float-left"><span
                                title="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <ul class="comment-actions float-right">
                            <li class="reply d-inline"><i class="far fa-comment-alt reply-btn"
                                                          data-reply-status="0"
                                                          data-comment-order="{{ $comment->order }}"
                                                          data-comment-id="{{ $comment->id }}"> 回复</i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="d-block card mb-4 shadow">
        <div class="card-body">
            暂时没评论，快成为第一个评论的人吧。
        </div>
    </div>
@endif
