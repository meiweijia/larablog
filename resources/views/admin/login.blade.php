<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>后台登陆</title>

<link href="http://static.meibk.com/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://static.meibk.com/css/font-awesome.min.css" />
	<link href="/css/signin.css" rel="stylesheet">
	<script type="text/javascript" src="http://static.meibk.com/js/jquery.min.js"></script>

</head>

<body>

<div class="signin">
	<div class="signin-head"><a href="/" title="回到首页"><img src="http://static.meibk.com/img/junyong02.jpg" alt="" class="img-circle"></a></div>
	<div class="form-signin" role="form">

		<input id="_token" type="hidden" name="_token" value="{{ csrf_token() }}" />
		<input id="account" type="text" class="form-control" placeholder="用户名" required autofocus />
		<input id="password" type="password" class="form-control" placeholder="密码" required />
		<button id="submit" class="btn btn-lg btn-warning btn-block" type="submit">登录</button>
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> 记住我 <span id="info" style="float: right;color: red"></span>
		</label>
	</div>
	<div class="signin-foot"><a href="/"><i class="fa fa-home fa-sm"></i> 返回首页</a></div>
</div>
<script>
	$("#submit").mousedown(function(){
		login(); //点击ID为"button_login"的按钮后触发函数 login();
	});
	function login(){ //函数 login();
		var account = $("#account").val();//取框中的用户名
		var password = $("#password").val();//取框中的密码
		var _token = $("#_token").val();
		$.ajax({
			type: "post", //以post方式与后台沟通
			url : "User/login", //与此php页面沟通
			dataType:'json',//从php返回的值以 JSON方式 解释
			data: 'user_login='+account+'&password='+password+'&_token='+_token, //发给php的数据有两项，分别是上面传来的u和p
			success: function(json){//如果调用php成功
				if(json.success)
				{
					window.location = '/admin';
				}
				else
				{
					$("#info").html('帐号或密码错误！');
				}
			},
			error:function(v)
			{
				$("#info").html('服务器连接错误！');
			}
		});
	}
	$(function(){
		$('#loginWraper').keydown(function(event){
			if(event.keyCode==13){
				login();
			}
		});
	})
</script>
</body>
</html>