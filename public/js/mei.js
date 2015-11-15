$(function () {
    $(document).pjax('a[target!=_blank]', '#pjax', {fragment: '#pjax', timeout: 6000}); //这是a标签的pjax。#content 表示执行pjax后会发生变化的id，改成你主题的内容主体id或class。timeout是pjax响应时间限制，如果在设定时间内未响应就执行页面转跳，可自由设置。
    $(document).on('submit', 'form', function (event) {
        $.pjax.submit(event, '#pjax', {fragment: '#pjax', timeout: 6000});
    }); //这是提交表单的pjax。form表示所有的提交表单都会执行pjax，比如搜索和提交评论，可自行修改改成你想要执行pjax的form id或class。#content 同上改成你主题的内容主体id或class。
    $(document).on('pjax:send', function () {
        NProgress.start();
    });
    $(document).on('pjax:complete', function () {
        NProgress.done();
        pajx_loadDuodsuo();

        /*页面存在图片列表就加载相册插件*/
        if($('#photo-list').length>0)
        {
            $.getScript("/layer/layer.min.js")
                .done(function () {
                    $.getScript("/layer/extend/layer.ext.js")
                        .done(function () {
                            //初始加载即调用，所以需放在ext回调里
                            layer.photosPage({
                                html: '<div style="padding:20px;">这里传入自定义的html<p>相册支持左右方向键，支持Esc关闭</p><p>另外还可以通过异步返回json实现相册。更多用法详见官网。</p><p id="change"></p></div>',
                                title: '快捷模式-获取页面元素包含的所有图片',
                                //id: 100, //相册id，可选
                                parent: '#photo-list'
                            });
                        })

                })
                .fail(function () {
                    alert('加载失败!');
                });
            $('head').append('<link href="/layer/skin/layer.css" rel="stylesheet" type="text/css" />')
            $('head').append('<link href="/layer/skin/layer.ext.css" rel="stylesheet" type="text/css" />')
        }
    });
});