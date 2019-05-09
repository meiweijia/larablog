<nav class="navbar navbar-expand-lg navbar-dark bg-primary nav-pills">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link {{ active_class(if_route('index')) }}" href="{{ route('index') }}">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ active_class(if_route('about')) }}" href="{{ route('about') }}">关于</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="get" action="{{ route('search') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="q" aria-label="Search">
            </form>
        </div>
    </div>
</nav>
