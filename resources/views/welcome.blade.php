<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>

    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form" role="search">
                    <div class="form-group">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" placeholder="Search for...">
                        </div>
                    </div>
                </form>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-9">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="blog-main">
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="#">测试文章，测试样式</a></h2>
                            <div class="text-center" style="margin: 0 0 11px;">
                                <span>
                                    <i class="fa fa-user"></i> <a href="#">Admin</a>
                                    | <i class="fa fa-calendar"></i> Sept 16th, 2012 at 4:20 pm
                                </span>
                            </div>
                            <p class="blog-post-content">
                                strpos: 返回boolean值.FALSE和TRUE不用多说.用
                                “===”进行判断.strpos在执行速度上都比以上两个函数快,另外strpos有一个参数指定判断的位置,但是默认为空.意思是判断整个字符串.缺点是对中文的支持不好.使用方法
                                strpos: 返回boolean值.FALSE和TRUE不用多说.用
                                “===”进行判断.strpos在执行速度上都比以上两个函数快,另外strpos有一个参数指定判断的位置,但是默认为空.意思是判断整个字符串.缺点是对中文的支持不好.使用方法
                                strpos: 返回boolean值.FALSE和TRUE不用多说.用
                                “===”进行判断.strpos在执行速度上都比以上两个函数快,另外strpos有一个参数指定判断的位置,但是默认为空.意思是判断整个字符串.缺点是对中文的支持不好.使用方法
                                strpos: 返回boolean值.FALSE和TRUE不用多说.用
                                “===”进行判断.strpos在执行速度上都比以上两个函数快,另外strpos有一个参数指定判断的位置,但是默认为空.意思是判断整个字符串.缺点是对中文的支持不好.使用方法 </p>
                            <div class="text-right"><a class="btn btn-default" href="#">read more</a></div>
                        </div>
                    </div><!-- /.blog-main -->
                </div>
            </div>

            <nav aria-label="Page navigation" class="text-right">
                <ul class="pagination">
                    <li>
                        <a href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    标签
                </div>
                <div class="panel-body">
                    <div class="content sidebar">
                        <a href="/tag/ke-hu-duan/">客户端</a>
                        <a href="/tag/android/">Android</a>
                        <a href="/tag/jquery/">jQuery</a>
                        <a href="/tag/ghost-0-7-ban-ben/">Ghost 0.7 版本</a>
                        <a href="/tag/opensource/">开源</a>
                        <a href="/tag/zhu-shou-han-shu/">助手函数</a>
                        <a href="/tag/tag-cloud/">标签云</a>
                        <a href="/tag/navigation/">导航</a>
                        <a href="/tag/customize-page/">自定义页面</a>
                        <a href="/tag/static-page/">静态页面</a>
                        <a href="/tag/roon-io/">Roon.io</a>
                        <a href="/tag/configuration/">配置文件</a>
                        <a href="/tag/upyun/">又拍云存储</a>
                        <a href="/tag/upload/">上传</a>
                        <a href="/tag/handlebars/">Handlebars</a>
                        <a href="/tag/email/">邮件</a>
                        <a href="/tag/shortcut/">快捷键</a>
                        <a href="/tag/yong-hu-zhi-nan/">用户指南</a>


                        <a href="/tag-cloud/">...</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.container -->

<footer>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="copyright">
                        © 2017 <a href="/" title="梅渭甲的博客">Laravel</a> All rights reserved | <a
                                href="http://www.miibeian.gov.cn/" target="_blank"> 湘ICP备15017914号</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>