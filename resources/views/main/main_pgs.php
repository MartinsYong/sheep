<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/mui.picker.min.css"/>
    <style>
    	.mui-input-group label {
			width: 30%;
		}
		.mui-input-row label~input,
		.mui-input-row label~select,
		.mui-input-row label~textarea {
				width: 70%;
		}
		.mui-input-row .mui-btn{
			width:inherit;
			color: #D8D8D8;
			float: none;
		}
		.mui-input-row .mui-btn:first-child{
			margin-left: 30%;
		}
		.mui-content-padded .mui-btn-primary{
			width: 100%;
			margin-top: 20px;
		}
		#time {
			display: none;
		}
		#time_select {
			font-size: 1em;
			width: 70%;
			padding: 9px 0;
			text-align: start;
			border: none;
		}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">等车</h1>
	</header>
	<div class="mui-content">
		<form action="/placeOrder" method="post" class="mui-input-group" id="form">
			<div class="mui-input-row">
	    		<label>起点</label>
	    		<input type="text" placeholder="如：图书馆、20栋宿舍" id="origin" name="origin">
			</div>
	    	<div class="mui-input-row">
	    		<button class="mui-btn mui-btn-outlined origin" type="button">主图</button>
	    		<button class="mui-btn mui-btn-outlined origin" type="button">五山</button>
	    		<button class="mui-btn mui-btn-outlined origin" type="button">三角市</button>
	    		<button class="mui-btn mui-btn-outlined origin" type="button">西园</button>
	    	</div>
			
			<div class="mui-input-row">
	    		<label>终点</label>
	    		<input type="text" placeholder="如：图书馆、20栋宿舍" id="dest" name="dest">
			</div>
	    	<div class="mui-input-row">
	    		<button class="mui-btn mui-btn-outlined dest" type="button">主图</button>
	    		<button class="mui-btn mui-btn-outlined dest" type="button">五山</button>
	    		<button class="mui-btn mui-btn-outlined dest" type="button">三角市</button>
	    		<button class="mui-btn mui-btn-outlined dest" type="button">西园</button>
	    	</div>
			<div class="mui-input-row">
				<label>备注</label>
				<input type="text" class="mui-input-clear mui-input" placeholder="可写短号或其它联系方式" name="description">
			</div>
			<div class="mui-input-row">
				<label>出发时间</label>
				<input type="text" id="time" name="setout_time" />
				<button type="button" id="time_select">选择时间日期</button>
			</div>
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--生成令牌-->
		</form>
		<div class="mui-content-padded">
			<button class="mui-btn mui-btn-block mui-btn-primary" id="confirm">确认</button>
		</div>
	</div>
	<script src="js/mui.min.js"></script>
	<script src="js/mui.picker.min.js"></script>
	<script type="text/javascript">
		mui.init();
		mui('.mui-input-row').on('tap','.origin',function(e){
			document.getElementById('origin').value=this.innerText;
		});
		mui('.mui-input-row').on('tap','.dest',function(e){
			document.getElementById('dest').value=this.innerText;
		});
		document.getElementById('time_select').addEventListener('tap',function(){
			var options = JSON.parse('{}');
			var picker = new mui.DtPicker(options);
			picker.show(function(rs){
				document.getElementById('time').value = rs.text;
				document.getElementById('time_select').innerText = rs.text;
				picker.dispose();
			});
		},false);
		document.getElementById('confirm').addEventListener('tap',function(e){
			document.getElementById('form').submit();
		});
	</script>
</body>
</html>