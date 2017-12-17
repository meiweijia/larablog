<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li class="{{ active_class(if_route('root') || if_route('page')) }}"><a href="{{ route('root') }}">Home</a></li>
        <li class="{{ active_class(if_route('about')) }}"><a href="{{ route('about') }}">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form" role="search">
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="text" class="form-control" placeholder="搜索">
                </div>
            </div>
        </form>
    </ul>
</div>