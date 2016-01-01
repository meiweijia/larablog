@extends('mei.main')
@section('title')
    <?php echo "微语 - 梅渭甲的个人博客"; ?>
@stop
@section('keywords')
    <meta name="keywords" content="微语,说说,梅渭甲">
@stop
@section('description')
    <meta name="description" content="记录一些短篇的文章，心情之类的记录！">
@stop
@section('post')
    <div class="page-title">
        <h3 class="f16"><span>最新发布</span></h3>
    </div>
    <div id="comment" style="display: none">
        <textarea class="form-control" rows="3" id="saytext"></textarea>
        <p class="no_hide">
            <button type="button" id="sub_btn" class="btn btn-success" style="float: right">提交</button>
            <span class="emotion">表情</span>
        </p>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="#" style="float: left">
                <img style="width:64px;height: 64px" src="/img/tx.png" alt="..." class="img-thumbnail">
            </a>
            <dl style="float: left;margin-top: 21px;margin-bottom: 0px;">
                <dd>夜风</dd>
                <dd>2015-13-31</dd>
            </dl>
            <div style="margin-left: 160px">
                1、出自子姓，为商汤后裔。据《通志·氏族略》和《唐书·宰相世系表》等所载，殷商时，君王太丁封其弟于梅（今安徽省亳州东南），为伯爵，世称梅伯。至商纣时，梅国国君梅伯为纣王所醢，后世子孙以封邑为氏。
            </div>
            <!--hr>
            <a href="javascript:(0)"><i class="fa fa-thumbs-o-up fa-1x">赞</i></a>
            <a href="javascript:(0)"><i id="comment_a" class="fa fa-comments-o fa-1x no_hide">评论</i></a-->
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="#" style="float: left">
                <img style="width:64px;height: 64px" src="/img/tx.png" alt="..." class="img-thumbnail">
            </a>
            <dl style="float: left;margin-top: 21px;margin-bottom: 0px;">
                <dd>夜风</dd>
                <dd>2015-13-31</dd>
            </dl>
            <div style="margin-left: 160px">
                1、出自子姓，为商汤后裔。据《通志·氏族略》和《唐书·宰相世系表》等所载，殷商时，君王太丁封其弟于梅（今安徽省亳州东南），为伯爵，世称梅伯。至商纣时，梅国国君梅伯为纣王所醢，后世子孙以封邑为氏。
            </div>
            <!--hr>
            <a href="javascript:(0)"><i class="fa fa-thumbs-o-up fa-1x">赞</i></a>
            <a href="javascript:(0)"><i id="comment_a" class="fa fa-comments-o fa-1x no_hide">评论</i></a-->
        </div>
    </div>
    <?php
    if (\Illuminate\Support\Facades\Auth::check()) {
        ?>
    <script>
        $('#comment').show();
    </script>
    <?php
    }
    ?>
    <script>
        setNavActive('talk');
        $("#comment_a").click(function () {
//            $("#comment").is(":hidden") ? $("#comment").show(200) : $("#comment").hide(200);
        });
        //        $("#comment").click(function (e) {
        //            e.stopPropagation();
        //        });
        //        $(document).on('click', function (e) {
        //            console.log($("#saytext").val());
        //            var e = e ? e : window.event;
        //            var tar = e.srcElement || e.target;
        //            if (tar.id != "comment_a" && $("#saytext").val() == '') {
        //                $("#comment").hide(200);
        //            }
        //        });
        $(function () {
            $('.emotion').qqFace({
                id: 'facebox', //表情盒子的ID
                assign: 'saytext', //给那个控件赋值
                path: 'face/'	//表情存放的路径
            });
            $("#sub_btn").click(function () {
                var str = $("#saytext").val();
                console.log(str);
                $("#show").html(replace_em(str));
//                $("#saytext").html(replace_em(str));
            });
        });
        function replace_em(str) {
            str = str.replace(/\</g, '&lt;');
            str = str.replace(/\>/g, '&gt;');
            str = str.replace(/\n/g, '<br/>');
            str = str.replace(/\[em_([0-9]*)\]/g, '<img src="face/$1.gif" border="0" />');
            return str;
        }
    </script>
@stop