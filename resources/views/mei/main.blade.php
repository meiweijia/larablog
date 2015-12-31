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
<div class="container">
    <div class="pjax">
        <a href="/" style="float: left;margin: 20px 10px 10px 10px;">
            <img style="width:146px;height:40px" src="http://static.meibk.com/img/logo.png" alt="博客logo"/>
        </a>
    </div>

    <nav class="nav navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse">
                <ul id="navbar-nav" class="nav navbar-nav">
                    <li id="home"><a href="/"><i class="fa fa-home fa-sm"></i> 首页</a></li>
                    <li id="talk"><a href="/talk"><i class="fa fa-twitter fa-sm"></i> 微语</a></li>
                    <li id="album"><a href="/album"><i class="fa fa-picture-o fa-sm"></i> 相册</a></li>
                    <li id="about"><a href="/about"><i class="fa fa-info fa-sm"></i> 关于</a></li>
                    <div id="search" class="input-group" style="width: 200px; height: 34px;margin-top: 8px;">
                        <input id="keywords" type="text" class="form-control" placeholder="输入关键字">
                <span class="input-group-btn"><button id="searchBtn" class="btn btn-default" type="button"
                                                      data-target="#myModal">搜索
                    </button></span>

                    </div>
                </ul>
                <!--<div class="navbar-form  navbar-right">
                    <a href="#" class="navber-link">登录</a>
                </div>-->
            </div>
        </div>
    </nav>
    <div class="row">
        <div id="pjax" class="col-lg-8">
            @yield('post')
        </div>
        <!--侧栏-->
        <div class="col-lg-4 hidden-sm hidden-xs hidden-md">
            <!--联系-->
            <div class="panel panel-default" style="margin-top: 36px">
                <div class="panel-heading">
                    <h3 class="panel-title">Contact</h3>
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
            <!--简介-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">技能</h3>
                </div>
                <div class="panel-body" style="margin: 5px;">
                    <div class="skillbar clearfix " data-percent="60%">
                        <div class="skillbar-title" style="background: rgb(251, 128, 105);"><span>laravel</span></div>
                        <div class="skillbar-bar" style="background: rgba(251, 128, 105, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">60%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="30%">
                        <div class="skillbar-title" style="background: rgb(49, 112, 143);"><span>PHP</span></div>
                        <div class="skillbar-bar" style="background: rgba(49, 112, 143, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">30%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="35%">
                        <div class="skillbar-title" style="background: rgb(169, 68, 66);"><span>javascript</span></div>
                        <div class="skillbar-bar" style="background: rgba(169, 68, 66, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">35%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="65%">
                        <div class="skillbar-title" style="background: rgb(120, 143, 55);"><span>extjs</span></div>
                        <div class="skillbar-bar" style="background: rgba(120, 143, 55 , 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">65%</div>
                    </div> <!-- End Skill Bar -->


                    <div class="skillbar clearfix " data-percent="15%">
                        <div class="skillbar-title" style="background: rgb(51, 122, 183);"><span>ASP.NET</span></div>
                        <div class="skillbar-bar" style="background: rgba(51, 122, 183, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">15%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="22%">
                        <div class="skillbar-title" style="background: rgb(76, 188, 246);"><span>jquery</span></div>
                        <div class="skillbar-bar" style="background: rgba(76, 188, 246, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">22%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="10%">
                        <div class="skillbar-title" style="background: rgb(138, 109, 59);"><span>css</span></div>
                        <div class="skillbar-bar" style="background: rgba(138, 109, 59, 0.66);margin-left: 99px"></div>
                        <div class="skill-bar-percent">10%</div>
                    </div> <!-- End Skill Bar -->

                </div>
            </div>

            <div class="well">更多精彩，敬请期待...</div>

        </div>
    </div>
    <!-- 模态框（Modal） -->

    <footer class="footer" style="text-align: center;    border-top: 2px solid #eee;">
        <p>&copy; 2014-<?php echo date('Y');?> <a style="color:#45BCF9" href='/' title="梅渭甲个人博客">夜风</a> |
            基于 <a style="color:rgb(251, 128, 105)" href='http://lumen.laravel.com' title="为速度而生的 Laravel 框架"
                  target="_blank">lumen</a> |
            <a target="_blank" href="/sitemap.xml">网站地图</a> |
            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254960549'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254960549' type='text/javascript'%3E%3C/script%3E"));</script> |
            <a href="http://www.miitbeian.gov.cn/">湘ICP备15017914号</a> |
            <a target="_blank" href="http://www.qiniu.com/" title="七牛"><img style="width:37px;height:27px"
                                                                            src="/img/qiniu-55x41.png" alt="七牛"></a>
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