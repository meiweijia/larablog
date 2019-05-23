<div class="mb-4">
    <div class="card w-100 shadow">
        <div class="card-body">
            @if(!$comments->count())
                <p>暂时没评论，快成为第一个评论的人吧。</p>
            @endif
            @foreach($comments as $comment)
                <div class="comment mb-3">
                    <div class="info mb-2">
                        <img class="avatar" src="{{ asset('images/avatar.jpg') }}">
                        <div class="user-info ml-2">
                            <div class="comment-name">{{ $comment->name }}</div>
                            <span class="reply-time">{{ $comment->created_at }}</span>
                        </div>
                    </div>
                    <div class="mb-2">
                        {!! $comment->comment !!}
                    </div>
                    <div class="control mb-3">
                            <span class="d-inline">
                                <i class="far fa-comment-alt reply-btn" data-reply-status="0"
                                   data-comment-name="{{ $comment->name }}"
                                   data-comment-root-id="{{ $comment->id }}"
                                   data-comment-id="{{ $comment->id }}"> 回复</i>
                            </span>
                    </div>
                    <div id="comment-reply-box-{{ $comment->id }}">
                    </div>
                    <div class="children mb-2">
                        @foreach($comment->children as $reply)
                            <div class="ml-3 mb-2 reply @if($loop->last)last @endif">
                                <div class="user-info mb-2">
                                    @if($reply->parent_id == $reply->root_id)
                                        <span class="reply-name">{{ $reply->name }}</span>
                                    @else
                                        <span class="reply-name">{{ $reply->name }}</span>：
                                        <span class="reply-name"><span>@</span>{{ $reply->parent->name }}</span>
                                    @endif
                                </div>
                                <div class="mb-2">
                                    {!! $reply->comment !!}
                                </div>
                                <div class="control mb-2">
                                    <span class="reply-time">
                                        {{ $reply->created_at }}
                                    </span>
                                    <span class="mx-1"></span>
                                    <span>
                                        <i class="far fa-comment-alt reply-btn" data-reply-status="0"
                                           data-comment-name="{{ $reply->name }}"
                                           data-comment-root-id="{{ $comment->id }}"
                                           data-comment-id="{{ $reply->id }}"> 回复</i>
                                    </span>
                                </div>
                                <div id="comment-reply-box-{{ $reply->id }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="reply-box" id="reply-box">
                <form class="mb-2" action="{{route('articles.comment',$article_id)}}" method="post" accept-charset="UTF-8"
                      id="comment-form" onsubmit="return comment_form_submit()">
                    @csrf
                    <input type="hidden" name="parent_id" id="comment-parent-id"/>
                    <input type="hidden" name="root_id" id="comment-root-id"/>
                    <input type="hidden" name="name" id="comment-name"/>
                    <div class="form-group">
                        <textarea id="reply-comment" name="comment" title="" class="form-control" style="resize: none"
                                  rows="3" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit"
                                    class="btn btn-outline-primary btn-sm float-right btn-submit-comment"
                                    id="btn-submit-comment">提交
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
