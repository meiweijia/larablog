<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <meta name="description" content="梅渭甲的个人博客">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.meibk.com">
    <meta name="copyright" content="riyi">
    <meta name="robots" content="index,follow">


    <title>梅渭甲的博客</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="/images/favicon/apple-touch-icon.png">

    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="/css/plugin.css">

    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">


    <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>


<!-- Preloader Start -->
<div class="preloader">
    <div class="rounder"></div>
</div>
<!-- Preloader End -->


<div id="main">
    <div class="container">
        <div class="row">


            <!-- About Me (Left Sidebar) Start -->
            <div class="col-md-3">
                <div class="about-fixed">

                    <div class="my-pic">
                        <img src="/images/pic/cat.jpg" alt="">
                        {{--<a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse"><i--}}
                                    {{--class="icon-menu menu"></i></a>--}}
                        {{--<div id="menu" class="collapse">--}}
                            {{--<ul class="menu-link">--}}
                                {{--<li><a href="about.html">About</a></li>--}}
                                {{--<li><a href="work.html">Work</a></li>--}}
                                {{--<li><a href="contact.html">Contact</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </div>


                    <div class="my-detail">

                        <div class="white-spacing">
                            <h1>路人甲</h1>
                            <span>a PHP Artisan.</span>
                        </div>

                        <ul class="social-icon">
                            <li><a href="mailto:meiweijia@gmail.com" class="github"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
                            <li><a href="https://tiwtter.com/meiweijia" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://weibo.com/mayh12" target="_blank" class="weibo"><i class="fa fa-weibo"></i></a></li>
                            <li><a href="https://github.com/kubill" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- About Me (Left Sidebar) End -->


            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                <div class="col-md-12 page-body">
                    <div class="row">


                        <div class="sub-title">
                            <h2>@yield('title')</h2>
                            {{--<a href="/contact.html"><i class="icon-envelope"></i></a>--}}
                            @yield('back')
                        </div>


                        <div class="col-md-12 content-page">

                        @yield('content')


                        </div>

                    </div>


                    <!-- Subscribe Form Start -->
                    {{--<div class="col-md-8 col-md-offset-2">--}}
                        {{--<form id="mc-form" method="post"--}}
                              {{--action="http://uipasta.us14.list-manage.com/subscribe/post?u=854825d502cdc101233c08a21&amp;id=86e84d44b7">--}}

                            {{--<div class="subscribe-form margin-top-20">--}}
                                {{--<input id="mc-email" type="email" placeholder="Email Address" class="text-input">--}}
                                {{--<button class="submit-btn" type="submit">Submit</button>--}}
                            {{--</div>--}}
                            {{--<p>Subscribe to my weekly newsletter</p>--}}
                            {{--<label for="mc-email" class="mc-label"></label>--}}
                        {{--</form>--}}

                    {{--</div>--}}
                    <!-- Subscribe Form End -->

                </div>


                <!-- Footer Start -->
                <div class="col-md-12 page-body margin-top-50 footer">
                    <footer>
                        {{--<ul class="menu-link">--}}
                            {{--<li><a href="/">首页</a></li>--}}
                            {{--<li><a href="/about.html">关于</a></li>--}}
                            {{--<li><a href="/work.html">工作</a></li>--}}
                            {{--<li><a href="/contact.html">联系</a></li>--}}
                        {{--</ul>--}}

                        <!-- UiPasta Credit Start -->
                        <div class="uipasta-credit">
                            © 2014-{{date('Y')}} <a href="/" title="梅渭甲的博客">路人甲</a> | <a href="http://www.miibeian.gov.cn/" target="_blank"> 湘ICP备15017914号</a>
                        </div>
                        <!-- UiPasta Credit End -->
                        <p><a></a></p>

                    </footer>
                </div>
                <!-- Footer End -->

            </div>
            <!-- Blog Post (Right Sidebar) End -->

        </div>
    </div>
</div>


<!-- Back to Top Start -->
<a href="javascrip:(0)" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
<!-- Back to Top End -->


<!-- All Javascript Plugins  -->
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/plugin.js"></script>

<!-- Main Javascript File  -->
<script type="text/javascript" src="/js/scripts.js"></script>


</body>
</html>