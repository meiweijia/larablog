<template>
    <div class="mb-4">
        <div class="card w-100 shadow">
            <div class="card-body">
                <div class="comment mb-3">
                    <div class="info mb-2">
                        <img class="avatar" src="">
                        <div class="user-info ml-2">
                            <div>meiweijia</div>
                            <div>2019-05-05</div>
                        </div>
                    </div>
                    <div class="mb-2">
                        测试评论
                    </div>
                    <div class="control mb-2">
                        <span><i class="far fa-thumbs-up"></i> 3</span>
                        <span class="mx-1">|</span>
                        <span><i class="far fa-comment-alt"></i> 回复</span>
                    </div>
                    <div class="children mb-3">
                        <div class="ml-3 mb-2 reply">
                            <div class="user-info mb-2">
                                <span class="reply-name">mei</span><span>: </span>
                                <span class="reply-name"><span>@</span>liu</span>
                                <span>测试啊</span>
                            </div>
                            <div class="control mb-3">
                                <span><i class="far fa-clock"></i> 2019-05-05</span>
                                <span class="mx-1">|</span>
                                <span><i class="far fa-comment-alt"></i> 回复</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "comment"
    }
</script>

<style scoped>

</style>
