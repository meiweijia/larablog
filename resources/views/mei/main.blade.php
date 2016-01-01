<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=320,maximum-scale=1.3,user-scalable=no">
    <title>@yield('title')</title>
    @yield('keywords')
    @yield('description')
    <link rel="dns-prefetch" href="//static.meibk.com">
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/css/main.css"/>
    <link rel="stylesheet" href="/css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css"/>
    <!--<link rel="stylesheet" href="css/style.css" />-->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script>
        function setNavActive(com) {
            var navs = $('#navbar-nav li');
            var length = navs.length;
            for (var i = 0; i < length; i++) {
                $(navs[i]).attr("id") == com ? $(navs[i]).attr('class', 'active') : $(navs[i]).attr('class', '');
            }
        }
    </script>

</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="#">Brand</a>--}}
                <a href="/">
                    <img style="width:146px;height:40px; margin-top: 5px;" src="/img/logo.png" alt="博客logo"/>
                </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul id="navbar-nav" class="nav navbar-nav">
                <li id="home"><a href="/"><i class="fa fa-home fa-sm"></i>首页</a></li>
                <li id="album"><a href="/album"><i class="fa fa-picture-o fa-sm"></i>相册</a></li>
                <li id="about"><a href="/about"><i class="fa fa-info fa-sm"></i>关于</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- /input-group -->
                <div id="search" class="navbar-left" style="padding-top: 8px;" role="search">
                        <input id="keywords" type="text" style="" class="form-control" placeholder="输入关键字">
                </div>
                <li id="about"><a id="searchBtn" data-target="#myModal" href="javascript:(0);" target="_blank">搜索</a></li>
                <li id="about"><a href="/login" target="_blank">登录</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container" style="min-height: 700px;margin: 70px auto 0 auto;">
    <div class="row">
        <div id="pjax" class="col-lg-8 col-md-8">
            @yield('post')
        </div>
        <!--侧栏-->
        <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
            <!--联系-->
            <div class="panel panel-default" style="margin-top: 36px">
                <div class="panel-heading">
                    <h3 class="panel-title">社交</h3>
                </div>
                <div class="panel-body contact">
                    {{--<span class="feed"><a href="/feed" title="订阅" target="_blank"><i class="fa fa-feed fa-3x"></i></a></span>--}}
                    <span class="qq"><a href="http://wpa.qq.com/msgrd?v=3&uin=542395819&site=qq&menu=yes" title="QQ"
                                        target="_blank"><i class="fa fa-qq fa-3x"></i></a></span>
                        <span class="weibo"><a href="http://weibo.com/mayh12" title="新浪微博" target="_blank"><i
                                        class="fa fa-weibo fa-3x"></i></a></span>
                        <span class="twitter"><a href="http://twitter.com/meiweijia" target="_blank"><i
                                        class="fa fa-twitter fa-3x"></i></a></span>
                    {{--<span class="mobile"><a href="/" title="手机"><i class="fa fa-mobile fa-3x" target="_blank"></i></a></span>--}}
                    <span class="github"><a href="http://github.com/kubill" title="github" target="_blank"><i
                                    class="fa fa-github fa-3x"></i></a></span>
                </div>
            </div>


            <div class="well">更多精彩，敬请期待...</div>

        </div>
    </div>
    <!-- 模态框（Modal） -->


</div>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 hidden-xs footer-left">
            <div class="footer-content">
                <h4>微语</h4>
                <a href="#" style="float: left">
                    <img style="width:64px;height: 64px; margin-bottom: 10px;" src="/img/tx.png" alt="..." class="img-thumbnail">
                </a>
                <dl style="float: left;margin-top: 21px;margin-bottom: 0px;">
                    <dd>夜风</dd>
                    <dd>2015-12-31</dd>
                </dl>
                <div style="margin-left: 150px">
                    人生最大的悲哀不是失去太多，而是计较太多，这也是导致一个人不快乐的重要原因。
                </div>
                <!--hr>
                <a href="javascript:(0)"><i class="fa fa-thumbs-o-up fa-1x">赞</i></a>
                <a href="javascript:(0)"><i id="comment_a" class="fa fa-comments-o fa-1x no_hide">评论</i></a-->
            </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7">
            <div class="footer-content">
                <h4>友情链接</h4>
                <div class="f-links">
                    <a>暂无</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <footer class="footer" style="text-align: center; /*border-top: 2px solid #eee;*/">
        <p>&copy; 2014-<?php echo date('Y');?> <a style="color:#45BCF9" href='/' title="梅渭甲个人博客">夜风</a>
            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                document.write(unescape("%3Cspan class='tongji' id='cnzz_stat_icon_1254960549'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254960549' type='text/javascript'%3E%3C/script%3E"));</script>
            <a href="http://www.miitbeian.gov.cn/">湘ICP备15017914号</a>
            <a target="_blank" href="http://www.qiniu.com/" title="七牛云存储"><img style="width:37px;height:27px"
                                                                               src="/img/qiniu-55x41.png"
                                                                               alt="七牛云存储"></a>
        </p>
    </footer>
</div>
<button id="alert" style="display: none" class="btn btn-primary btn-lg" data-toggle="modal"
        data-target="#myModal">
    开始演示模态框
</button>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    提示
                </h4>
            </div>
            <div class="modal-body">
                请输入关键字查询
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">确定
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal -->
</div>
<script type='text/javascript' src='/js/nprogress.js'></script>
<script type="text/javascript" src="/js/qqFace.js"></script>
<script type='text/javascript' src='/js/pjax.js'></script>
<script type='text/javascript' src='/js/mei.js'></script>
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
    $("#searchBtn").click(function () {
        var keywords = $("#keywords").val();
        if (keywords == '') {
            $("#alert").trigger("click")
        } else {
            window.location.href = '/s=' + keywords;
        }
    });
    $(function () {
        $('#search').keydown(function (event) {
            if (event.keyCode == 13) {
                $("#searchBtn").trigger("click")
            }
        });
    });
    var duoshuoQuery = {short_name: "meiweijia"};
    (function () {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';
        ds.async = true;
        ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
        || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
<!-- 多说公共JS代码 end -->

</body>
</html>