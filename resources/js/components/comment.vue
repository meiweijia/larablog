<template>
    <div>
        <div class="comment-header">
            <strong>28条評論</strong>
            <div class="float-right">
                <span class="active reply-time pointer">按時間倒序</span>
                <span class="reply-time pointer">按時間正序</span>
            </div>
            <div class="clearfix"></div>
        </div>
        <hr>
        <div class="comment mb-3" v-for="comment in comments">
            <div class="info mb-2">
                <img class="avatar" src="../../images/avatar.jpg">
                <div class="user-info ml-2">
                    <div class="comment-name pointer">{{ comment.name }}</div>
                    <span class="reply-time">{{ comment.created_at }}</span>
                </div>
            </div>
            <div class="mb-2" v-html="comment.comment">
                {{ comment.comment }}
            </div>
            <div class="control mb-3">
            <span class="mr-3 pointer thumbs-up">
                <i class="far fa-thumbs-up"> 1人贊</i>
            </span>
                <span class="d-inline pointer">
                <i class="far fa-comment-alt reply-btn" @click="showCommentInput(comment)"> 回覆</i>
                </span>
            </div>
            <div id="comment-reply-box-1">
            </div>
            <div class="children mb-2">
                <div class="ml-3 mb-2 reply" v-for="children in comment.children.data">
                    <div class="user-info mb-2">
                        <span class="reply-name pointer">{{ children.name }}</span>：
                        <span class="reply-name pointer"><span>@</span>{{ children.parent.name }}</span>
                        {{ children.comment | filterHtml }}
                    </div>
                    <div class="mb-2">
                    </div>
                    <div class="control mb-2">
                    <span class="reply-time">
                        2019-05-05 05:05
                    </span>
                        <span class="mx-1"></span>
                        <span class="pointer">
                        <i class="far fa-comment-alt reply-btn" @click="showCommentInput(children,'1')"> 回覆</i>
                    </span>
                    </div>
                    <div class="mb-2" v-if="showItemId === children.id">
                            <textarea :id="'comment-box-'+children.id" v-model="input_comment.comment"
                                      class="form-control" :placeholder="replayText" rows="1"
                                      aria-describedby="button-comment"></textarea>
                        <div class="input-group-append">
                            <button @click="addComment(comment.id,children.id)" class="btn btn-outline-primary ml-2"
                                    type="button"
                                    id="button-comment">發布
                            </button>
                        </div>
                    </div>
                </div>
                <div class="ml-3 mb-2">
                    <span><i class="far fa-edit reply-time pointer" @click="showCommentInput(comment)"> 添加新評論</i></span>
                    <template v-if="comment.children.total - 3 > 0">
                        <span class="mx-2 reply-time">|</span>
                        <span class="line-warp reply-time">
                            還有{{ comment.children.total - 3 }}条評論，
                            <a class="text-primary pointer" @click="getChildrenComments(comment.id)">展開查看</a>
                        </span>
                    </template>
                </div>

                <div class="ml-3">
                    <div v-if="showItemId === comment.id">
                        <div class="input-group mb-1">
                            <textarea :id="'comment-box-'+comment.id" v-model="input_comment.comment"
                                      class="form-control" :placeholder="replayText" rows="1"
                                      aria-describedby="button-reply"></textarea>
                            <div class="input-group-append">
                                <button @click="addComment(comment.id,comment.id)" class="btn btn-outline-primary ml-2"
                                        type="button"
                                        id="button-reply">發布
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>

    export default {
        name: "comment",
        props: [
            // 'comments',
            'submitUri',
        ],
        components: {
            // Picker,
        },
        data() {
            return {
                comments: [],
                input_comment: {
                    name: '',
                    parent_id: '',
                    root_id: '',
                    comment: '',
                },
                showItemId: '',
                replayText: '',
            }
        },
        mounted() {
            axios
                .get(this.submitUri)
                .then(response => {
                    this.comments = response.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        filters: {
            filterHtml: function (value) {
                return value.replace(/<[^>]+>/g, '');
            }
        },
        methods: {
            addComment(root_id, parent_id) {
                this.input_comment.name = "梅";
                this.input_comment.root_id = root_id;
                this.input_comment.parent_id = parent_id;
                console.log(this.input_comment);
                axios
                    .post(this.submitUri, this.input_comment)
                    .then(response => {
                        console.log(response);
                    });
            },
            showCommentInput(item, reply) {
                if (reply) {
                    this.replayText = "回覆 " + item.name;
                } else {
                    this.replayText = "留下你的評論...";
                }
                this.showItemId = item.id;
                this.$nextTick(() => {
                    let comment_box = $('#comment-box-' + item.id);
                    autosize(comment_box);
                    comment_box.focus();
                });
            },
            getChildrenComments(id) {
                console.log(id);
                axios
                    .get('http://localhost:3000/comments/more_children/' + id)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error);
                    });

            },
            cancel() {
                this.showItemId = "";
            },
        },
    }

</script>

<style scoped>

</style>
