$(function() {
$(document).pjax('a[target!=_blank]', '.content', {fragment:'.content', timeout:6000}); //这是a标签的pjax。#content 表示执行pjax后会发生变化的id，改成你主题的内容主体id或class。timeout是pjax响应时间限制，如果在设定时间内未响应就执行页面转跳，可自由设置。
$(document).on('submit', 'form', function (event) {$.pjax.submit(event, '.content', {fragment:'.content', timeout:6000});}); //这是提交表单的pjax。form表示所有的提交表单都会执行pjax，比如搜索和提交评论，可自行修改改成你想要执行pjax的form id或class。#content 同上改成你主题的内容主体id或class。
    $(document).on('pjax:send', function() {
          NProgress.start();
		  });
    $(document).on('pjax:complete', function() {
			NProgress.done();
		  });
});