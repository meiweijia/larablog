<form action="{{route('articles.comment')}}" method="post" accept-charset="UTF-8" id="comment-form" onsubmit="return comment_form_submit()">
    @csrf
    <input type="hidden" name="article_id" value="{{ $article_id }}"/>
    <input type="hidden" name="parent_id" id="comment-parent-id" />
    <input type="hidden" name="comment_name" id="comment-name" />
    <div class="form-group">
        <textarea id="reply-comment" name="comment" title="" class="form-control" style="resize: none" rows="5" required></textarea>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-outline-primary btn-sm float-right btn-submit-comment" id="btn-submit-comment">
                评论
            </button>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="comment-info-model" tabindex="-1" role="dialog" aria-labelledby="comment-info-model-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comment-info-model-title">个人信息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment-info-model-name">昵称</label>
                                <input type="text" class="form-control is-invalid" id="comment-info-model-name" placeholder="输入昵称">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-outline-primary" id="btn-submit-comment-model">提交</button>
            </div>
        </div>
    </div>
</div>
