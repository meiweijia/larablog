@extends('mei.main')
@section('title')
    <?php echo "{$post->post_title} - 夜风"; ?>
@stop
@section('keywords')
    <meta name="keywords" content="{{$post->post_keywords}}">
@stop
@section('description')
    <meta name="description" content="{{$post->post_description}}">
@stop
@section('post')
    <div id="content" class="right-col-fixed">
        <div class="posts fullwidth">
            <div class="short arc-con">
                <h1 class="text-center">{{$post->post_title}}</h1>

                <p class="posted meta text-center">
                    <span class="date_time">发布时间：<?php echo substr($post->created_at, 0, 10);?></span>
                    <span class="postedby">作者：夜风</span>
                    <span class="postview">分类：<a href="javascript:;" rel="category tag">{{$post->sort}}</a></span>
                </p>
                <hr>
                <div class="post-content"><?php echo changestring($post->post_content, 'http://static.meibk.com/ueditor/php'); ?></div>

            </div>
            <p></p>
        </div>

        <!--  END Page  -->

        <!--  END Clearfix  -->
    </div>
    <div class="title" id="comments">
        <h3>评论</h3>
    </div>
    <div class='ds-thread' data-thread-key='{$post->id}' data-title='{$post->post_title}' data-url='".home_url()."post/{$post->id}.html'></div>
@stop
