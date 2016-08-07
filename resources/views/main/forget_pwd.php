<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="UTF-8">
      	mui.init();
    </script>
    <style>
    	.mui-input-group {
			margin-top: 20px;
		}
		.mui-input-group label {
			width: 22%;
		}
		.mui-input-row label~input,
		.mui-input-row label~select,
		.mui-input-row label~textarea {
			width: 78%;
		}
		.mui-btn-block {
    		margin-top: 20px;
    		padding: 12px 0;
    	}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="/"></a>
		<h1 class="mui-title">找回密码</h1>
	</header>
	<div class="mui-content">
		<form class="mui-input-group">
			<div class="mui-input-row">
				<label>账号</label>
				<input id='email' type="email" class="mui-input-clear mui-input" placeholder="请输入注册手机号">
			</div>
		</form>
		<div class="mui-content-padded">
			<button id='send' class="mui-btn mui-btn-block mui-btn-primary">提交</button>
		</div>
		</div>
</body>
</html>