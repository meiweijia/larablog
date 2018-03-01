@extends('layouts.main')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{$article->title}}</h3>
            <span>
                    <i class="fa fa-user"></i> <a href="javascript:void(0)">{{$article->author}}</a>
                    | <i class="fa fa-clock-o"></i> {{$article->created_at}}
                | <i class="fa fa-folder-open-o"></i> {{$article->category_name}}
                </span>
        </div>
        <div class="panel-body">
            <div class="blog-post">
                @php
                    echo Parsedown::instance()->text($article->content);
                @endphp
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>标签</strong>
        </div>
        <div class="panel-body text-center">
            <ul>
                <li>待完善</li>
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="alert alert-warning" role="alert" style="margin-bottom: 0;">
            <p>本站发布的原创文章、评论、图片等内容的版权均归本站所有，允许在互联网范围内，转载该作品，并在使用时指明作者姓名、作品名称及作品来源。</p>
            <p>本站转载、复制、截图等方式获取他人内容，如有侵权请联系 <a href="mailto:meiweijia@gmail.com">我</a> 删除。</p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>评论</strong>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @if(count($comments) ==0)
                    <p>暂无评论</p>
                @endif
                @foreach($comments as $comment)
                    <li class="list-group-item media">
                        <div class="media-left">
                            <a href="javascript:void(0)">
                                <img class="media-object img-circle img-thumbnail" src="{{asset($comment->avatar)}}"
                                     style="width:55px;height:55px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="javascript:void(0)">{{$comment->name}}</a>
                                <span class="pull-right">
                                <a href="javascript:void(0)"><i class="fa fa-thumbs-o-up"></i></a>
                                <a href="javascript:void(0)"><i class="fa fa-reply"></i></a>
                            </span>
                            </h5>
                            <p>
                                @php
                                    echo Parsedown::instance()->text($comment->content);
                                @endphp

                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <form id="reply-form" action="{{route('comment.store')}}" method="post" accept-charset="UTF-8">
                {!! csrf_field() !!}
                <input type="hidden" name="article_id" value="{{ $article->id }}"/>
                <textarea id="comment" name="content" data-provide="markdown" rows="5"></textarea>
                <hr/>
                <button type="submit" class="btn btn-success pull-right">回复</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script src="//cdn.bootcss.com/marked/0.3.7/marked.min.js"></script>
    <script>
        $('#comment').markdown({
            language: 'zh'
        });

        var form = $('#reply-form');
        form.on('submit', function () {
            comment = $(this).find('textarea');
            commentText = comment.val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if ($.trim(commentText) !== '') {
                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    data: {
                        content: commentText,
                        article_id: $('[name=article_id]').val()
                    },
                }).done(function (data) {
                    if(data.status == '200'){

                        comment.val(null);
                    }
                });
            }
            return false;
        });
    </script>
@endsection