$(function () {
    $('[data-toggle="popover"]').popover({
        trigger: "manual",
        placement: "bottom", //placement of the popover. also can use top, bottom, left or right
        html: true, //needed to show html of course
        content: '<img src="/images/wx.png" width="200" height="200" />', //this is the content of the html box. add the image here or anything you want really.
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
    var formHtml = $("#reply-form").prop("outerHTML");
    var commentOrder = $(this).data("comment-order");
    var replyStatus = $(this).data("reply-status");
    var commentId = $(this).data("comment-id");
    $("#reply-form").remove();

    if (replyStatus == 0) {
        $("#reply-list-" + commentOrder + " .bottom-comment").append(formHtml);
        $("#comment-parent-id").val(commentId);
        $(".reply-btn").data("reply-status", 0);
        $(".reply-btn").text(" 回复");
        $(this).data("reply-status", 1);
        $(this).text(" 取消回复");
        $("#reply-comment").attr("placeholder", "回复 " + commentOrder + " 楼");
        $("#reply-comment").focus();
    }
    else {
        $(".reply-btn").text(" 回复");
        $(this).data("reply-status", 0);
        $(".reply-box").append(formHtml);
        $("#comment-parent-id").val(0);
        $("#reply-comment").attr("placeholder", "");
    }
});

comment_form_submit = function(){
    var comment_name = $.cookie('comment-name');
    if (!comment_name) {
        $('#comment-info-model').modal();
        return false;
    }
    else {
        return true;
    }
}

$("#btn-submit-comment-model").click(function () {
    var comment_name = $("#comment-info-model-name").val().trim();
    if (comment_name) {
        $.cookie('comment-name', comment_name);
        $("#comment-name").val(comment_name);
        $("#comment-form").submit();
    }
    else {
        alert("请输入昵称！");
    }
});
