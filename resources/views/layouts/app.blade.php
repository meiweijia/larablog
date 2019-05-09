<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="keywords" content="梅渭甲,laravel,PHP,博客,个人博客">
    <meta name="description" content="梅渭甲的个人博客，记录我的coding之路.">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/prism.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @component('layouts.navbar')
    @endcomponent
    <main class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-9 mb-lg-0" id="content">
                    @yield('content')
                </div>
                <div class="col-md-3">
                    @component('layouts.profile')
                    @endcomponent
                    @component('layouts.category')
                    @endcomponent
                    @component('layouts.tag')
                    @endcomponent
                </div>
            </div>
        </div>
    </main>

    <footer class="main-footer bg-dark">
        <div class="container text-center">
            <span class="text-muted">© {{date('Y')}} <a href="/" title="梅渭甲的博客">meiwj.dev</a></span>
        </div>
    </footer>
</div>
</body>
</html>
