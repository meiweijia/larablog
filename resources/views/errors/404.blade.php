<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>首页</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <!--<link rel="stylesheet" href="css/style.css" />-->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <style type="text/css">

        article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
        audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }
        audio:not([controls]) { display: none; }
        [hidden] { display: none; }
        html { font-size: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        html, button, input, select, textarea { font-family: sans-serif; color: #222; }
        body { margin: 0; font-size: 1em; line-height: 1.4; }
        ::-moz-selection { background: #E37B52; color: #fff; text-shadow: none; }
        ::selection { background: #E37B52; color: #fff; text-shadow: none; }
        a { color: #00e; }
        a:visited { color: #551a8b; }
        a:hover { color: #06e; }
        a:focus { outline: thin dotted; }
        a:hover, a:active { outline: 0; }
        abbr[title] { border-bottom: 1px dotted; }
        b, strong { font-weight: bold; }
        blockquote { margin: 1em 40px; }
        dfn { font-style: italic; }
        hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
        ins { background: #ff9; color: #000; text-decoration: none; }
        mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }
        pre, code, kbd, samp { font-family: monospace, serif; _font-family: 'courier new', monospace; font-size: 1em; }
        pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }
        q { quotes: none; }
        q:before, q:after { content: ""; content: none; }
        small { font-size: 85%; }
        sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
        sup { top: -0.5em; }
        sub { bottom: -0.25em; }
        ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
        dd { margin: 0 0 0 40px; }
        nav ul, nav ol { list-style: none; list-style-image: none; margin: 0; padding: 0; }
        img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }
        svg:not(:root) { overflow: hidden; }
        figure { margin: 0; }
        form { margin: 0; }
        fieldset { border: 0; margin: 0; padding: 0; }
        label { cursor: pointer; }
        legend { border: 0; *margin-left: -7px; padding: 0; white-space: normal; }
        button, input, select, textarea { font-size: 100%; margin: 0; vertical-align: baseline; *vertical-align: middle; }
        button, input { line-height: normal; }
        button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; *overflow: visible; }
        button[disabled], input[disabled] { cursor: default; }
        input[type="checkbox"], input[type="radio"] { box-sizing: border-box; padding: 0; *width: 13px; *height: 13px; }
        input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
        input[type="search"]::-webkit-search-decoration, input[type="search"]::-webkit-search-cancel-button { -webkit-appearance: none; }
        button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
        textarea { overflow: auto; vertical-align: top; resize: vertical; }
        input:valid, textarea:valid {  }
        input:invalid, textarea:invalid { background-color: #f0dddd; }
        table { border-collapse: collapse; border-spacing: 0; }
        td { vertical-align: top; }

        body
        {
            font-family:'Droid Sans', sans-serif;
            font-size:10pt;
            color:#555;
            line-height: 25px;
        }

        .wrapper
        {
            width:760px;
            margin:0 auto 5em auto;
        }

        .main
        {
            overflow:hidden;
        }

        .error-spacer
        {
            height:4em;
        }

        a, a:visited
        {
            color:#2972A3;
        }

        a:hover
        {
            color:#72ADD4;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="wrapper">
        <div class="error-spacer"></div>
        <div role="main" class="main">
            <img src="img/404_image.jpg" style="margin: 0 auto;text-align: center;" />
            <h2>很抱歉，您要访问的页面不存在！>> <a href="/">返回首页</a></h2>
            <hr>
            <h3>温馨提示：</h3>
            <p>
                1. 检查地址是否输入正确！
            </p>
            <p>
                2. 稍后重试！
            </p>
        </div>
    </div>
    <footer class="footer" style="text-align: center;    border-top: 2px solid #eee;">
        <p>? 2014-2015 <a style="color:#45BCF9" href="/" title="梅渭甲个人博客">夜风</a> All rights reserved | 基于
            <a style="color:rgb(251, 128, 105)" href="http://lumen.laravel.com" title="为速度而生的 Laravel 框架" target="_blank"> lumen</a>
            <a target="_blank" href="/sitemap.xml"> | 网站地图</a> |
            <script type="text/javascript">
                var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                document.write(unescape("%3Cspan id='cnzz_stat_icon_1254960549'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1254960549' type='text/javascript'%3E%3C/script%3E"));
            </script>
            <script src=" https://s95.cnzz.com/z_stat.php?id=1254960549" type="text/javascript"></script>
            <script src="https://c.cnzz.com/core.php?web_id=1254960549&amp;t=z" charset="utf-8" type="text/javascript"></script>
        </p>
    </footer>
</div>

</body>

</html>