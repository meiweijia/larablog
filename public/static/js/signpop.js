define(function (){

return {
	init: function (){
		var signHtml = '\
			<div class="sign">\
			    <div class="sign-mask"></div>\
			    <div class="container">\
			        <a href="javascript:;" class="close-link signclose-loader"><i class="fa fa-close"></i></a>\
			        <div class="sign-tips"></div>\
			        <form id="sign-in">\
			            <h3>登录</h3>\
			            <h6>\
			                <label for="inputEmail">用户名或邮箱</label>\
			                <input type="text" name="account" class="form-control" id="inputEmail" placeholder="用户名或邮箱">\
			            </h6>\
			            <h6>\
			                <label for="inputPassword">密码</label>\
			                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="登录密码">\
			            </h6>\
			            <div class="sign-submit">\
			                <input type="button" class="btn btn-primary signsubmit-loader" name="submit" value="登录">\
			                <label><input type="checkbox" checked="checked" name="remember" value="forever">记住我</label>\
			            </div>'+(jsui.url_rp ? '<div class="sign-info"><a href="'+jsui.url_rp+'">找回密码？</a></div>' : '')+
			        '</form>\
			    </div>\
			</div>\
		'

	    jsui.bd.append( signHtml )

	    if( $('#issignshow').length ){
	        jsui.bd.addClass('sign-show')
	        $('.close-link').hide()
	        setTimeout(function(){
	        	$('#sign-in').show().find('input:first').focus()
	        }, 300);
	        $('#sign-up').hide()
	    }


	    $('.signin-loader').on('click', function(){
	    	jsui.bd.addClass('sign-show')
	    	setTimeout(function(){
            	$('#sign-in').show().find('input:first').focus()
            }, 300);
            $('#sign-up').hide()
	    })

	    $('.signup-loader').on('click', function(){
	    	jsui.bd.addClass('sign-show')
	    	setTimeout(function(){
            	$('#sign-up').show().find('input:first').focus()
            }, 300);
            $('#sign-in').hide()
	    })

	    $('.signclose-loader').on('click', function(){
	    	jsui.bd.removeClass('sign-show')
	    })

		$('.sign-mask').on('click', function(){
	    	jsui.bd.removeClass('sign-show')
	    })

	    $('.sign form').keydown(function(e){
			var e = e || event,
			keycode = e.which || e.keyCode;
			if (keycode==13) {
				$(this).find('.signsubmit-loader').trigger("click");
			}
		})

	    $('.signsubmit-loader').on('click', function(){
	    	if( jsui.is_signin ) return

            var form = $(this).parent().parent()
            var inputs = form.serializeObject()
            var isreg = (inputs.action == 'signup') ? true : false

            if( isreg ){
            	if( !is_mail(inputs.email) ){
	                logtips('邮箱格式错误')
	                return
	            }

                if( !/^[a-z\d_]{3,20}$/.test(inputs.name) ){
                    logtips('昵称是以字母数字下划线组合的3-20位字符')
                    return
                }
            }else{
            	if( inputs.password.length < 6 ){
	                logtips('密码太短，至少6位')
	                return
	            }
            }
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
            $.ajax({  
                type: "POST",  
                url:  '/login',
                data: inputs,  
                dataType: 'json',
                success: function(data){
					if(data.success)
					{
						location.reload()
					}
					else
					{
						logtips(data.msg)
					}
                },
				error:function(v)
				{
					logtips(v.statusText+'：'+ v.status);
				}
            });  
	    })

		var _loginTipstimer;
		function logtips(str){
		    if( !str ) return false
		    _loginTipstimer && clearTimeout(_loginTipstimer)
		    $('.sign-tips').html(str).animate({
		        height: 29
		    }, 220)
		    _loginTipstimer = setTimeout(function(){
		        $('.sign-tips').animate({
		            height: 0
		        }, 220)
		    }, 2000)
		}

	}
}

})