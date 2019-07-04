$(function () {
    $('[data-toggle="popover"]').popover({
        trigger: "manual",
        placement: "bottom", //placement of the popover. also can use top, bottom, left or right
        html: true, //needed to show html of course
        content: '<img src="../images/wx.jpg" width="200" height="200" />', //this is the content of the html box. add the image here or anything you want really.
        animation: true
    }).on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $(this).siblings(".popover").on("mouseleave", function () {
            $(_this).popover("hide");
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide")
            }
        }, 100);
    });

    //设置评论昵称
    $("#comment-name").val($.cookie('comment-name'));
});

$(".reply-btn").click(function () {
    let formHtml = $("#comment-form").prop("outerHTML");
    let replyStatus = $(this).data("reply-status");
    let commentId = $(this).data("comment-id");
    let commentName = $(this).data('comment-name');
    let commentRootId = $(this).data('comment-root-id');
    $("#comment-form").remove();

    if (replyStatus == 0) {
        $("#comment-reply-box-" + commentId).append(formHtml);
        $("#comment-parent-id").val(commentId);
        $("#comment-root-id").val(commentRootId);
        $(".reply-btn").data("reply-status", 0);
        $(".reply-btn").text(" 回复");
        $(this).data("reply-status", 1);
        $(this).text(" 取消回复");
        $("#reply-comment").attr("placeholder", "回复 " + commentName);
        $("#reply-comment").focus();
    }
    else {
        $(".reply-btn").text(" 回复");
        $(this).data("reply-status", 0);
        $(".reply-box").append(formHtml);
        $("#comment-parent-id").val(null);
        $("#comment-root-id").val(null);
        $("#reply-comment").attr("placeholder", "");
    }
});

comment_form_submit = function () {
    let comment_name = $.cookie('comment-name');
    console.log(comment_name);
    if (!comment_name) {
        swal("输入昵称:", {
            content: "input",
        }).then((value) => {
            if (value) {
                $.cookie('comment-name', value);
                $("#comment-name").val(value);
                $("#comment-form").submit();
            }
            else {
                swal("请输入昵称", "", "warning");
            }
        });
        return false;
    }
    else {
        return true;
    }
};
