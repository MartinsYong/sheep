<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link rel="stylesheet" href="css/iconfont.css"/>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <style>
    	.title {
    		margin-top: 100px;
    		font-size: 30px;
    		text-align: center;
    	}
    	.mui-btn {
    		font-size: 20px;
    		width: 49.4%;
    		padding: 12px 0;
    	}
    	.mui-pull-left {
    		padding-top: 12px;
    	}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-pull-left" href="/logout">登出</a>
		<h1 class="mui-title">Hi，<?php echo $name; ?>！</h1>
		<a class="mui-pull-right" href="/history"><span class="mui-icon iconfont icon-lishihistory2"></span></a>
	</header>
	<div class="mui-content">
		<h1 class="title">请选择</h1>
	</div>
	<div class="mui-content-padded">
		<a href="/orders" class="mui-btn mui-btn-success"><span class="mui-icon icon-motuo iconfont"></span>我是司机</a>
		<a href="/placeOrder" class="mui-btn mui-btn-warning"><span class="mui-icon iconfont icon-font19"></span>我是乘客</a>
	</div>
<script src="js/mui.min.js"></script>
<script type="text/javascript" charset="UTF-8">
      	mui.init();
</script>
</body>
</html>