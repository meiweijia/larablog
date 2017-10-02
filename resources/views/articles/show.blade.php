@extends('layouts.main')
@section('title')@endsection
@section('back')
    <a href="{{url()->previous()}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
@endsection
@section('content')
    <div class="col-md-12 blog-post">


        <!-- Post Headline Start -->
        <div class="post-title">
            <h1>{{$article['title']}}</h1>
        </div>
        <!-- Post Headline End -->


        <!-- Post Detail Start -->
        <div class="post-info">
            <span>{{substr($article['created_at'],0,10)}} / by <a href="javascrip:(0)">路人甲</a></span>
        </div>
        <!-- Post Detail End -->

    @php echo $article['content'];@endphp

    <!-- Post Author Bio Box Start -->
        <div class="about-author margin-top-70 margin-bottom-50">

            <div class="picture">
                <img src="/images/blog/author.png" class="img-responsive" alt="">
            </div>

            <div class="c-padding">
                <h3>作者 <a href="javascrip:(0)" data-toggle="tooltip" data-placement="top" title="Visit Alex Website">路人甲</a></h3>
                <p>
                    本站发布的原创文章、评论、图片等内容的版权均归本站所有，允许在互联网范围内，转载该作品，并在使用时指明作者姓名、作品名称及作品来源。<br>
                    本站转载、复制、截图等方式获取他人内容，如有侵权请联系删除。
                </p>
            </div>
        </div>
        <!-- Post Author Bio Box End -->
    </div>
@endsection