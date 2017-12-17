@extends('layouts.main')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{$article->title}}</h3>
            <span>
                    <i class="fa fa-user"></i> <a href="javascript:void(0)">{{$article->author}}</a>
                    | <i class="fa fa-clock-o"></i> {{$article->created_at}}
                    | <i class="fa fa-folder-open-o"></i> {{$article->category}}
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
                <li>123</li>
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
                <li class="list-group-item media">
                    <div class="media-left">
                        <a href="javascript:void(0)">
                            <img class="media-object img-circle img-thumbnail"
                                 src="https://dn-phphub.qbox.me/uploads/avatars/5951_1474424339.jpeg?imageView2/1/w/100/h/100"
                                 style="width:55px;height:55px;">
                        </a>
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading">
                            <a href="javascript:void(0)">Kubill</a>
                            <span class="pull-right">
                                <a href="javascript:void(0)"><i class="fa fa-thumbs-o-up"></i></a>
                                <a href="javascript:void(0)"><i class="fa fa-reply"></i></a>
                            </span>
                        </h5>
                        <p>
                            .test 不是标准的通用顶级域名，当你直接输入 site.test 你会发现默认情况下浏览器会带你去搜索结果而不是直接打开网址，除非自己加上http前缀。
                        </p>
                        <p>
                            注册个比较简单的域名的好处就是在windows下使用homestead开发可以避免每次修改hosts文件，主要是widnows缺少类似dnsmasq这样的方便工具，在mac下使用valet已经很方便了，找一个罕见的通用顶级域名代替.dev/.app是非常简单的做法。
                        </p>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <form>
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
    </script>
@endsection