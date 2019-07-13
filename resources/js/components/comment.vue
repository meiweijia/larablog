<template>
    <div>
        <div class="comment-header">
            <!--v-if="show_item_id === -1"-->
            <div class="row mb-4">
                <div class="col-12 mb-2">
                    <div class="media">
                        <img class="avatar rounded-circle mr-2" :src="avatar" style="width: 2.5rem"/>
                        <div class="media-body">
                            <textarea v-show="input_comment.api_token" id="comment-box-root" class="form-control"
                                      placeholder="留下你的評論..." rows="2"
                                      aria-describedby="button-reply"></textarea>
                            <div v-show="!input_comment.api_token" class="form-control comment-box-disabled"
                                 style="height: 3.625rem">
                                <div class="d-flex justify-content-center align-items-center h-100">
                                    <button class="btn btn-outline-primary" @click="showLoginModal">登入</button>
                                    <span class="ml-2">後評論</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12" v-show="input_comment.api_token">
                    <div class="d-flex justify-content-end">
                        <span class="pointer comment-reply-cancel">取消</span>
                        <button @click="addComment()" class="btn btn-sm btn-outline-primary"
                                type="button" id="button-reply-root">發布
                        </button>
                    </div>
                </div>
            </div>
            <strong>{{total_comments}}条評論</strong>
            <div class="float-right">
                <span :class="['reply-time pointer',{active:order==='asc'}]" @click="setOrder('asc')">按時間正序</span>
                <span :class="['reply-time pointer',{active:order==='desc'}]" @click="setOrder('desc')">按時間倒序</span>
            </div>
            <div class="clearfix"></div>
        </div>
        <hr>
        <div class="comment-list mb-3" v-for="(comment,index) in comments">
            <div class="info">
                <img class="avatar rounded-circle" :src="comment.user.avatar">
                <div class="user-info ml-2">
                    <div class="comment-name pointer">{{ comment.user.name }}</div>
                    <span class="reply-time">{{ comment.created_at }}</span>
                </div>
            </div>
            <div class="my-3" v-html="comment.comment">
                {{ comment.comment }}
            </div>
            <div class="control mb-3">
            <span class="mr-3 pointer thumbs-up">
                <i class="far fa-thumbs-up"> 1人贊</i>
            </span>
                <span class="d-inline pointer">
                <i class="far fa-comment-alt reply-btn" v-if="show_item_id !== comment.id"
                   @click="showCommentInput(comment)"> 回覆</i>
                <i class="far fa-comment-alt reply-btn" v-else @click="hideCommentInput()"> 取消回覆</i>
                </span>
            </div>
            <div id="comment-reply-box-1">
            </div>
            <!--children-->
            <div class="children mb-2">
                <div class="ml-3 mb-2 reply" v-for="children in comment.children">
                    <div class="user-info mb-2">
                        <span class="reply-name pointer">{{ children.user.name }}</span>：
                        <span class="reply-name pointer"><span>@</span>{{ children.parent.user.name }}</span>
                        {{ children.comment | filterHtml }}
                    </div>
                    <div class="mb-2">
                    </div>
                    <div class="control mb-2">
                    <span class="reply-time">
                        {{children.created_at}}
                    </span>
                        <span class="mx-1"></span>
                        <span class="pointer">
                            <i class="far fa-comment-alt reply-btn" v-if="show_item_id !== children.id"
                               @click="showCommentInput(children,true)"> 回覆</i>
                            <i class="far fa-comment-alt reply-btn" v-else @click="hideCommentInput()"> 取消回覆</i>
                    </span>
                    </div>
                    <div class="row mb-2" v-if="show_item_id === children.id">
                        <div class="col-12 mb-2">
                            <textarea :id="'comment-box-'+children.id" class="form-control" :placeholder="replay_text"
                                      rows="1" aria-describedby="button-comment"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="d-flex justify-content-end">
                                <span class="pointer comment-reply-cancel" @click="hideCommentInput()">取消</span>
                                <button @click="addComment(comment.id, children.id,'comment-box-'+children.id)"
                                        class="btn btn-sm btn-outline-primary"
                                        type="button"
                                        id="button-comment">回覆
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ml-3 mb-2">
                    <span>
                        <i class="far fa-edit reply-time pointer" v-if="show_item_id !== comment.id"
                           @click="showCommentInput(comment)"> 添加新評論</i>
                        <i class="far fa-edit reply-time pointer" v-else @click="hideCommentInput()"> 取消</i>
                    </span>
                    <template v-if="comment.children_total > 0">
                        <span class="mx-2 reply-time">|</span>
                        <span class="line-warp reply-time">
                            還有{{ comment.children_total }}条評論，
                            <a class="text-primary pointer" @click="getChildrenComments(comment.id,index)">展開查看</a>
                        </span>
                    </template>
                    <template :id="'collapse-'+comment.id">
                        <span class="mx-2 reply-time">|</span>
                        <span class="line-warp reply-time">
                            <a class="text-primary pointer" @click="collapseChildren(index)">收起</a>
                        </span>
                    </template>

                </div>
                <div class="ml-3">
                    <div v-if="show_item_id === comment.id">
                        <div class="row">
                            <div class="col-12 mb-2">
                            <textarea :id="'comment-box-'+comment.id" v-model="input_comment.comment"
                                      class="form-control" :placeholder="replay_text" rows="1"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-end">
                                    <span class="pointer comment-reply-cancel" @click="hideCommentInput()">取消</span>
                                    <button @click="addComment(comment.id, comment.id,'comment-box-'+comment.id)"
                                            class="btn btn-sm btn-outline-primary"
                                            type="button" id="button-reply">回覆
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--children-end-->
        </div>
        <!--翻页-->
        <nav aria-label="Page navigation" v-show="total_page>1">
            <ul class="pagination justify-content-end">
                <li :class="['page-item',{disabled:current_page === 1}]">
                    <a class="page-link" href="javascript:void(0)"
                       @click.prevent="changePage(current_page - 1)">&lsaquo;</a>
                </li>
                <li :class="['page-item',{active: current_page === 1}]" @click="changePage(1)">
                    <a class="page-link" href="javascript:void(0)"
                       @click.prevent="changePage(1)">1</a>
                </li>
                <li class="mx-2" v-show="current_page > 3 && total_page > 5">...</li>
                <li :class="['page-item',{active: current_page === index +offset}]" v-for="(item,index) in middlePages"
                    @click="changePage(index + offset)"><a class="page-link"
                                                           href="javascript:void(0)">{{index+offset}}</a>
                </li>
                <li class="mx-2" v-show="current_page < bigLimit-1 && total_page > 5">...</li>
                <li :class="['page-item',{active: current_page === total_page}]" @click="changePage(total_page)"
                    v-if="total_page > 1"><a class="page-link" href="javascript:void(0)"
                                             @click.prevent="changePage(total_page)">{{total_page}}</a>
                </li>
                <li :class="['page-item',{disabled:current_page === total_page}]">
                    <a class="page-link" href="javascript:void(0)"
                       @click.prevent="changePage(current_page + 1)">&rsaquo;</a>
                </li>
            </ul>
        </nav>

        <modal name="login-box" @closed="loginModalClosed" :width="modal_width" height="auto">
            <div id="logreg-forms">
                <!--登录-->
                <form class="form-signin" v-if="login_action ==='login'" @submit.prevent="login">
                    <h1 class="h3 mb-3 font-weight-normal text-center"> 登入</h1>
                    <div class="social-login">
                        <button class="btn wechat-btn social-btn" type="button" @click="loginWithQrcode"><span><i
                            class="fab fa-weixin"></i> 微信掃碼登入</span>
                        </button>
                        <button class="btn github-btn social-btn" type="button" @click="loginWithGithub"><span><i
                            class="fab fa-github"></i> 使用 Github 登入</span>
                        </button>
                    </div>
                    <p class="text-center">OR</p>
                    <input type="email" v-model="sign_info.email" v-model.trim="sign_info.email" class="form-control"
                           placeholder="Email 地址" required
                           autofocus>
                    <input type="password" v-model="sign_info.password" class="form-control" placeholder="密碼" required
                           autofocus>
                    <div class="alert alert-danger" role="alert" v-if="sign_up_error === 1">
                        {{sign_up_error_msg}}
                    </div>
                    <button class="btn btn-outline-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i>
                        登入
                    </button>
                    <a href="javascript:void(0)" id="forgot_pswd" @click="changeLoginAction('reset')">忘記密碼?</a>
                    <hr>
                    <!-- <p>Don't have an account!</p>  -->
                    <button class="btn btn-outline-primary btn-block" type="button" id="btn-signup"
                            @click="changeLoginAction('register')"><i
                        class="fas fa-user-plus"></i> 註冊
                    </button>
                </form>
                <!--重置密码-->
                <form class="form-reset" v-if="login_action === 'reset'" onsubmit="return false">
                    忘記密碼了嗎？請在下方輸入您的電子郵件地址以開始重設密碼。
                    <hr>
                    <input type="email" id="resetEmail" class="form-control" placeholder="Email 地址" required=""
                           autofocus="">
                    <button class="btn btn-outline-primary btn-block" type="submit"><i class="fas fa-sign-out-alt"></i>送出
                    </button>
                    <a href="javascript:void(0)" @click="changeLoginAction('login')"><i class="fas fa-angle-left"></i>
                        返回</a>
                </form>
                <!--注册-->
                <form class="form-signup" v-if="login_action === 'register'" @submit.prevent="signUp">
                    <h1 class="h3 mb-3 font-weight-normal text-center"> 註冊</h1>
                    <div class="social-login">
                        <button class="btn wechat-btn social-btn" type="button" @click="loginWithQrcode"><span><i
                            class="fab fa-weixin"></i> 微信掃碼登入</span>
                        </button>
                        <button class="btn github-btn social-btn" type="button"><span><i class="fab fa-github"></i> 使用 Github 登入</span>
                        </button>
                    </div>

                    <p class="text-center">OR</p>

                    <input type="text" v-model="sign_info.name" v-model.trim="sign_info.name" class="form-control"
                           placeholder="昵稱"
                           required
                           autofocus>
                    <input type="email" v-model="sign_info.email" v-model.trim="sign_info.email" class="form-control"
                           placeholder="Email 地址" required
                           autofocus>
                    <input type="password" v-model="sign_info.password" class="form-control" placeholder="密碼" required
                           autofocus>
                    <input type="password" v-model="sign_info.repeatpass" class="form-control" placeholder="確認密碼"
                           required autofocus>
                    <div class="alert alert-danger" role="alert" v-if="sign_up_error === 1">
                        {{sign_up_error_msg}}
                    </div>
                    <button class="btn btn-outline-primary btn-block" type="submit"><i
                        class="fas fa-user-plus"></i> 註冊
                    </button>
                    <a href="javascript:void(0)" @click="changeLoginAction('login')"><i class="fas fa-angle-left"></i>
                        返回</a>
                </form>

                <form class="form-signin" v-if="login_action ==='wechat'" onsubmit="return false">
                    <div class="d-flex justify-content-center" id="qrcode-node">
                        <img class="login-qrcode" :src="login_qrcode">
                    </div>
                    <a href="javascript:void(0)" @click="changeLoginAction('login')"><i class="fas fa-angle-left"></i>
                        返回</a>
                </form>
            </div>
        </modal>
    </div>
</template>
<script>

    import modal from 'vue-js-modal';

    Vue.use(modal);

    const MODAL_WIDTH = 410;

    export default {
        name: "comment",
        props: [
            'submitUri',
        ],
        components: {
            // Picker,
        },
        data() {
            return {
                comments: [],
                current_page: 1,
                total_page: 0,//总评论页数
                total_comments: 0,//总评论数
                order: 'asc',//排序
                input_comment: {
                    parent_id: '',
                    root_id: '',
                    comment: '',
                    api_token: null,
                },
                show_item_id: -1,
                replay_text: '',
                more_number: 3,//评论下的评论，默认显示3个
                comment_children_page: [],//更多评论当前页数
                comment_children_total: [],//更多评论还有多少评论
                modal_width: MODAL_WIDTH,
                login_action: 'login',
                login_qrcode: '/images/loading.gif',
                sign_up_error_msg: '',
                sign_up_error: 0,
                sign_info: {
                    name: '',
                    email: '',
                    password: '',
                    repeatpass: '',
                },
                avatar: null,
            }
        },
        created() {
            this.modal_width = window.innerWidth < MODAL_WIDTH
                ? MODAL_WIDTH - 110
                : MODAL_WIDTH
        },
        mounted() {
            autosize($('#comment-box-root'));
            this.fetchComments(1);
            this.input_comment.api_token = $.cookie('api_token');//页面加载时 设置token
            let avatar_cache = $.cookie('avatar');
            this.avatar = avatar_cache ? avatar_cache : '/images/avatar-default.png';//设置头
        },
        filters: {
            filterHtml: function (value) {
                return value.replace(/<[^>]+>/g, '');
            }
        },
        computed: {
            middlePages() {
                if (this.total_page <= 2) {
                    return 0;
                } else if (this.total_page > 2 && this.total_page <= 5) {
                    return this.total_page - 2;
                } else {
                    return 3;
                }
            },
            bigLimit() {
                return this.total_page - 1;
            },
            offset() {
                if (this.current_page <= 3) {
                    return 2;
                } else if (this.current_page >= this.bigLimit) {
                    return this.bigLimit - 2;
                } else {
                    return this.current_page - 1;
                }
            }
        },
        methods: {
            fetchComments: function (page) {//获取评论
                this.comments = null;
                this.show_item_id = -1;
                let data = {
                    page: page,
                    order: this.order,
                };
                axios
                    .get(this.submitUri, {
                        params: data
                    })
                    .then(response => {
                        this.comments = response.data.data;
                        this.current_page = response.data.current_page;
                        this.total_page = response.data.last_page;
                        this.total_comments = response.data.total;
                        setTimeout(function () {
                            $('pre').addClass("line-numbers");
                            Prism.highlightAll();
                        },1);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            changePage: function (page) {//翻页
                if (this.current_page === page) return false;
                this.fetchComments(page);
            },
            setOrder: function (order) {//时间排序
                if (this.order === order) return false;
                this.order = order;
                this.fetchComments(1);
            },
            addComment(root_id = '', parent_id = '', box = 'comment-box-root') {//新增评论
                let vc = this;
                if (!this.input_comment.api_token) {
                    this.showLoginModal();
                    return;
                }
                this.input_comment.root_id = root_id;
                this.input_comment.parent_id = parent_id;
                this.input_comment.comment = $('#' + box).val();
                axios
                    .post(this.submitUri, this.input_comment)
                    .then(response => {
                        this.fetchComments(this.current_page);
                        $('#' + box).val('');
                    })
                    .catch(error => {
                        if (error.response.status === 401) {
                            vc.showLoginModal();
                            return false;
                        }
                    });
            },
            showCommentInput(item, reply) {//显示评论框
                //检查登录
                if (!this.input_comment.api_token) {
                    this.showLoginModal();
                    return;
                }
                this.initInputComment();

                if (reply) {
                    this.replay_text = "回覆 " + item.name;
                } else {
                    this.replay_text = "留下你的評論...";
                }
                this.show_item_id = item.id;
                this.$nextTick(() => {
                    let comment_box = $('#comment-box-' + item.id);
                    autosize(comment_box);
                    comment_box.focus();
                });
            },
            hideCommentInput() {//隐藏评论框
                this.show_item_id = -1;
                this.initInputComment();
            },
            getChildrenComments(id, index) {//获取评论下所有的回复
                this.comment_children_total[index] = this.comment_children_total[index] ? this.comment_children_total[index] : this.comments[index].children_total;
                this.comment_children_page[index] = this.comment_children_page[index] ? 1 : 0;
                axios
                    .get('//' + window.location.host + '/api/comments/more_children/' + id + '?page=' + this.comment_children_page[index])
                    .then(response => {
                        for (let i = 0, len = response.data.comment.length; i < len; i++) {
                            this.comments[index].children.push(response.data.comment[i]);
                        }
                        this.more_number = 1;
                        this.comments[index].children_total = response.data.total;
                        this.comment_children_page[index] = parseInt(response.data.page) + 1;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            initInputComment() {//初始化输入的评论
                this.input_comment.comment = '';
                this.input_comment.root_id = null;
                this.input_comment.parent_id = null;
            },
            collapseChildren(index) {//收起评论
                let len = this.comments[index].children.length;
                this.comments[index].children.splice(3, len);//保留前3个，移除后面所有的
                this.comments[index].children_total = this.comment_children_total[index];//把第一次载入的还要多少个评论赋值给收起
                this.comment_children_page[index] = 0;//重置分页
            },
            showLoginModal() {//显示登录框框
                this.$modal.show('login-box');
            },
            closeLoginModal() {
                this.$modal.hide('login-box');
            },
            loginModalClosed() {
                this.login_action = 'login';
                this.clearInterval(this.setInte);//停止轮询
                this.clearError();//清除错误
                this.initSignInfo();//初始化注册信息
            },
            clearInterval() {//停止轮询
                clearInterval(this.setInte);
            },
            changeLoginAction(action) {//切换登录方式
                this.clearInterval();
                this.login_action = action;
                this.clearError();
                this.initSignInfo();
            },
            loginWithQrcode() {//扫码登录
                this.login_action = 'wechat';
                this.login_qrcode = '/images/loading.gif';
                let vc = this;
                let str = Math.random().toString(36).substr(2);
                $.get('https://oauth.authing.cn/oauth/wxapp/qrcode/5cdcfc461a7c1d0714698c33?random=' + str, function (data, status) {
                    let result = JSON.parse(data);
                    vc.login_qrcode = result.data.qrcode;
                    vc.setInte = setInterval(function () {
                        vc.checkQrcodeLogin(str);
                    }, 1500);
                });
            },
            checkQrcodeLogin(str) {//检查是否扫码登录
                let vc = this;
                $.post('https://oauth.authing.cn/oauth/wxapp/confirm/qr?random=' + str, function (data, status) {
                    let result = JSON.parse(data);
                    if (result.data.code == 200) {
                        vc.clearInterval();
                        let user_info = result.data.data;
                        let sign_data = {
                            'email': user_info.email,
                            'name': user_info.nickname,
                            'avatar': user_info.photo,
                            'unionid': user_info.unionid,
                        };
                        vc.register(sign_data);
                    }
                });

            },
            loginWithGithub() {
                window.location.href = '//' + window.location.host + '/login/github?back_url=' + window.location.href;
            },
            signUp() {//注册
                if (this.sign_info.password !== this.sign_info.repeatpass) {
                    this.setError('兩次密碼輸入不一致');
                    return false;
                }
                let data = {
                    'email': this.sign_info.email,
                    'name': this.sign_info.name,
                    'password': this.sign_info.password,
                };
                this.register(data);
                return false;
            },
            login() {
                axios.post('//' + window.location.host + '/api/login', {
                    'email': this.sign_info.email,
                    'password': this.sign_info.password,
                })
                    .then(response => {
                        this.logined(response.data);
                    })
                    .catch(error => {
                        this.setError(error.response.data.message);
                    });
                return false;
            },
            register(data) {
                axios.post('//' + window.location.host + '/api/user', data)
                    .then(response => {
                        this.logined(response.data);
                    })
                    .catch(error => {
                        this.setError(error.response.data.message);
                    });
            },
            logined(data) {//登录或者注册成功的后续操作
                $.cookie('api_token', data.api_token);//保持cookie
                this.input_comment.api_token = data.api_token;//保持输入框信息
                $.cookie('avatar', data.avatar);//保持头像
                this.avatar = data.avatar;
                this.closeLoginModal();
            },
            setError($msg) {//設置錯誤信息
                this.sign_up_error = 1;
                this.sign_up_error_msg = $msg;
            },
            clearError() {//清除錯誤信息
                this.sign_up_error = 0;
                this.sign_up_error_msg = '';
            },
            initSignInfo() {
                this.sign_info.name = '';
                this.sign_info.email = '';
                this.sign_info.password = '';
                this.sign_info.repeatpass = '';
            },
        }
    }
</script>

<style scoped>

</style>
