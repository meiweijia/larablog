<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Meiweijia's Blog</title>
    <meta name="keywords" content="梅渭甲,laravel,PHP,后端开发">
    <meta name="description" content="梅渭甲的个人博客，记录我的coding之路.">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body background="{{asset('images/wood.jpg')}}">

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
            <a class="navbar-brand" href="{{route('root')}}">Meiweijia's blog</a>
        </div>
        @include('layouts.partials.nav')
    </div>
</nav>

<div class="container" style="min-height: 900px">
    <div class="row">
        <div class="col-sm-9">
            @yield('content')
        </div>

        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                        <img style="width: 100px;" src="{{asset('images/avatar.jpg')}}"
                             alt="Karan Singh Sisodia"
                             title="Karan Singh Sisodia" class="img-circle img-thumbnail">
                    </div>
                    <div class="user-info-block text-center">
                        <div class="user-heading">
                            <h3>梅渭甲</h3>
                            <span class="help-block"><i class="fa fa-location-arrow"></i> ShenZhen</span>
                        </div>
                        <ul class="navigation">
                            <li class="active">
                                <a data-toggle="tab" href="#information">
                                    <i class="fa fa-id-card-o"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#settings">
                                    <i class="fa fa-weixin" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#email">
                                    <i class="fa fa-envelope-o"></i>
                                </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" href="#events">
                                    <i class="fa fa-git" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="user-body">
                            <div class="tab-content">
                                <div id="information" class="tab-pane active">
                                    <h4>To be a Full Stack</h4>
                                </div>
                                <div id="settings" class="tab-pane text-center">
                                    <img width="150" height="150" src="{{asset('images/wx.png')}}">
                                </div>
                                <div id="email" class="tab-pane">
                                    <h4><a href="mailto:meiweijia@gmail.com">meiweijia@gmail.com</a></h4>
                                </div>
                                <div id="events" class="tab-pane">
                                    <h4>
                                        <a href="https://github.com/kubill" target="_blank" title="GitHub"><i
                                                    class="fa fa-github fa-3x"></i></a>
                                        <a href="https://gitee.com/kubill" target="_blank" title="码云"><i
                                                    class="fa fa-github-alt fa-3x"></i></a>
                                    </h4>
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    分类
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a href="/categories/{{$category['uri']}}" class="list-group-item">{{$category['title']}}</a>
                        @endforeach
                    </div>
                </div>
            </div>

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
    </div>
</div>
<footer class="blog-footer">
    © {{date('Y')}} <a href="/" title="梅渭甲的博客">meiwj.dev</a>
</footer>
<script src="{{asset('js/app.js')}}"></script>
@yield('script')
</body>
</html>