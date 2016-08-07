<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>打绵羊</title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <style>
    	.mui-btn-block {
    		margin-top: 40px;
    		padding: 12px 0;
    	}
    	.mui-input-group label {
				width: 22%;
		}
		.mui-input-group{
			margin-top: 220px;
		}	
		.mui-input-row label~input,
		.mui-input-row label~select,
		.mui-input-row label~textarea {
				width: 78%;
		}
		.link-area {
			display: block;
			margin-top: 25px;
			text-align: center;
		}
			
		.spliter {
			color: #bbb;
			padding: 0px 8px;
		}
		
		#remember_me{
			display: none;
		}
		
		span {
			color: red;
		}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<h1 class="mui-title">登录</h1>
	</header>
	<div class="mui-content">
		<form action="/login" class="mui-input-group" method="post" id="form">
			<div class="mui-input-row">
	    		<label>账号</label>
	    		<input type="text" name="phone" class="mui-input-clear mui-input" placeholder="输入手机号">
			</div>
			<div class="mui-input-row">
				<label>密码</label>
				<input id='password' name="password" type="password" class="mui-input-clear mui-input" placeholder="请输入密码">
			</div>
				<input type="checkbox" name="remember_me" id="remember_me" />
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--生成令牌-->
		</form>
		<ul class="mui-table-view mui-table-view-chevron">
			<li class="mui-table-view-cell">
				自动登录
				<div id="autoLogin" class="mui-switch">
					<div class="mui-switch-handle"></div>
				</div>
			</li>
		</ul>
		<?php if(session('msg')) echo '<span>'.session('msg').'</span>'; ?>   <!--提交后状态信息返回-->
		<div class="mui-content-padded">
				<button id='login' class="mui-btn mui-btn-block mui-btn-primary">登录</button>
				<div class="link-area"><a id='reg' href="/reg">注册账号</a> <span class="spliter">|</span> <a id='forgetPassword' href="/forget">忘记密码</a>
				</div>
		</div>
	</div>
<script src="js/mui.min.js"></script>
<script>
	mui.init();
	document.getElementById("autoLogin").addEventListener("toggle",function(event){
  		if(event.detail.isActive){
    		document.getElementById('remember_me').checked = true;
  		}else{
  			document.getElementById('remember_me').checked = false;
  		}
	});
	document.getElementById('login').addEventListener('tap',function(e){
		document.getElementById('form').submit();
	});
</script>
</body>
</html>