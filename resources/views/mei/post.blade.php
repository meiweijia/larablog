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
                    <span class="postview">分类：<a href="javascript:;" rel="category tag">HTML/CSS</a></span>
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
    <?php
    foreach ($post->comment as $comment) {
        $html_head = '<div class="media">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="/img/avatar.png" alt="...">
                    </a>
                </div>
                <div class="media-body">
                    <div class="media-heading comment-info">
                        <h4 class="pull-left">%s</h4>
                    </div>
                    <p class="media-bottom comment-body">%s</p>
                    <div class="comment-oper">
                        <i class="fa fa-clock-o"></i>%s&nbsp;&nbsp;
                        <a class="reply" href="javascript:0"><i class="fa fa-reply"></i>回复</a>
                    </div>
                    <hr>
                    <!--回复开始-->';
        $html_foot = '</div></div>';
        $res = sprintf($html_head,$comment['name'],$comment['content'],$comment['updated_at']);
        if (isset($comment['child'])) {
            foreach ($comment['child'] as $reply) {
                $res .= sprintf($html_head.$html_foot,$reply['name'],"回复 <a href='javascript:(0)' style='color: red;'>@{$reply['parent_name']}</a>：{$reply['content']}",$comment['updated_at']);
            }
        }
        $res .= $html_foot;
        echo $res;
    }
    ?>
    <div id="comment-input" style=""><textarea class="form-control" rows="3" id="saytext"></textarea>

        <p class="no_hide">
            <button type="button" id="sub_btn" class="btn btn-success" style="float: right">提交</button>
            <span class="emotion">表情</span></p>
    </div>
    <script>
        $(function () {
            $('.emotion').qqFace({
                id: 'facebox', //表情盒子的ID
                assign: 'saytext', //给那个控件赋值
                path: '/img/face/'	//表情存放的路径
            });
            $("#sub_btn").click(function () {
                var str = $("#saytext").val();
            });
        });
    </script>
@stop
