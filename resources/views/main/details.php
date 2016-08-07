<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/iconfont.css"/>
    <style>
    	.arrow {
    		width: 10%;
    		display: block;
    		font-size: 20px;
    		position: absolute;
    		left: 48%;
    	}
    	.mui-table-view {
   			margin: .5rem;
    	}
    	.mui-table-view li:first-child {
    		margin: .5rem;
    		padding: 20px 25px;
    	}
    	.mui-table-view-cell:first-child:after {
    		left: 0;
    	}
    	.mui-pull-right {
    		text-align: right;
    	}
    	.dt {
    		color: #8f8f94;
    	}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-icon mui-icon-left-nav mui-pull-left" href="/select">首页</a>
		<h1 class="mui-title">订单详情</h1>
	</header>
	<div class="mui-content" id="vuecontainer">
		<ul class="mui-table-view mui-card">
			<li class="mui-table-view-cell mui-collapse">
				<div class="mui-pull-left">{{order.origin}}</div>
				<span class="mui-icon iconfont icon-qianwang arrow"></span>
				<div class="mui-pull-right">{{order.dest}}</div>
			</li>
			<li class="mui-table-view-cell">
				<div class="mui-pull-left"><span class="mui-icon mui-icon-contact"></span>乘客</div>
				<div class="mui-pull-right dt">{{user.name}}</div>
			</li>
			<li class="mui-table-view-cell">
				<div class="mui-pull-left"><span class="mui-icon mui-icon-phone-filled"></span>电话</div>
				<div class="mui-pull-right dt">{{user.phone}}</div>
			</li>
			<li class="mui-table-view-cell">
				<div class="mui-pull-left"><span class="mui-icon mui-icon-chat"></span>备注</div>
				<div class="mui-pull-right dt">{{order.description}}</div>
			</li>
			<li class="mui-table-view-cell">
				<div class="mui-pull-left"><span class="mui-icon mui-icon-spinner"></span>出发时间</div>
				<div class="mui-pull-right dt">{{order.setout_time}}</div>
			</li>
		</ul>
	</div>
	<script src="js/mui.min.js"></script>
	<script src="js/vue.min.js" ></script>
    <script type="text/javascript" charset="UTF-8">
      	mui.init();
      	var vue = new Vue({
      		el: '#vuecontainer',
      		data:{
      			user: <?php echo $user; ?>,
      			order: <?php echo $order; ?>
      		}
      	});
    </script>
</body>
</html>