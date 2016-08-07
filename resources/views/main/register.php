<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <style>
    .mui-input-group {
    	margin-top: 20px;
    }
    .mui-btn-block {
    	margin-top: 40px;
    	padding: 12px 0;
    }
    .mui-input-group label {
		width: 25%;
	}
			
	.mui-input-row label~input,
	.mui-input-row label~select,
	.mui-input-row label~textarea {
		width: 75%;
	}
	
			
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="/"></a>
			<h1 class="mui-title">注册</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group" id="form" action="/reg" method="post">
			<div class="mui-input-row">
				<label>手机号</label>
				<input id='phone' type="text" class="mui-input-clear mui-input" placeholder="请输入手机号" name="phone">
			</div>
			<div class="mui-input-row">
				<label>昵称</label>
				<input id='name' type="text" class="mui-input-clear mui-input" placeholder="请输入用户名" name="name">
			</div>
			<div class="mui-input-row">
				<label>密码</label>
				<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码" name="password">
			</div>
			<div class="mui-input-row">
				<label>确认</label>
				<input id='password_confirm' type="password" class="mui-input-clear mui-input" placeholder="请确认密码">
			</div>
	    	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--生成令牌-->
		</form>
		<div class="mui-content-padded">
			<button id='reg' class="mui-btn mui-btn-block mui-btn-primary">注册</button>
		</div>
	</div>
<script src="js/mui.min.js"></script>
<script>
	mui.init();
	document.getElementById('reg').addEventListener('tap',function(e){
		var re = /^1\d{10}$/;
		var name = document.getElementById('name').value;
		var phone = document.getElementById('phone').value;
		var password = document.getElementById('password').value;
		var password_confirm = document.getElementById('password_confirm').value;
		if(!re.test(phone)){
			mui.alert('请重新输入手机号','错误','好的');
		}else if(!(name)){
			mui.alert('请输入昵称','错误','好的');
		}else if(!(password)){
			mui.alert('请输入密码','错误','好的');
		}else if(!(password === password_confirm)){
			mui.alert('密码和确认密码不一致','错误','好的');
		}else{
			document.getElementById('form').submit();
		}
	});
</script>
</body>
</html>