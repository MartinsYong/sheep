<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/iconfont.css"/>
    <style>
    	.mui-table-view {
				margin: .5em;
			}
			
		.arrow {
			width: 10%;
			display: block;
			font-size: 20px;
			position: absolute;
			left: 45%;
		}
			
		.mui-col-xs-10 {
			padding-right: 15px;
		}
			
		.mui-col-xs-2 {
			vertical-align: middle;
		}
			
		.mui-col-xs-2 button {
			margin-left: 20%;
		}
			
		.time {
			clear: both;
			margin-top: 35px;
		}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title">开车</h1>
	</header>
	<div class="mui-content mui-scroll-wrapper" id="refreshContainer">
		<div class="mui-scroll" id="vuecontainer">
			<ul class="mui-table-view mui-card" v-for="item in items">
				<li class="mui-table-view-cell">
					<div class="mui-table">
						<div class="mui-table-cell mui-col-xs-10">
							<div class="mui-pull-left">{{item.origin}}</div>
							<span class="mui-icon iconfont icon-qianwang arrow"></span>
							<div class="mui-pull-right">{{item.dest}}</div>
							<div class="mui-h5 time">出发时间：{{item.setout_time}}</div>
						</div>
						<div class="mui-table-cell mui-col-xs-2">
							<button type="button" class="mui-btn mui-btn-primary" id="{{item.id}}" v-tap="send">确认</button>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<form action="/details" id="form" method="post">
			<input type="hidden" name="id" id="id" value="" />    <!--发送订单id-->
			<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> <!--生成令牌-->
		</form>
	</div>
    <script src="js/mui.min.js"></script>
    <script src="js/vue.min.js"></script>
    <script src="js/vue-tap-click.js"></script>
	<script type="text/javascript">
		mui.init({
			pullRefresh: {
				container: "#refreshContainer", 
				down: {
					contentdown: "下拉可以刷新", 
					contentover: "释放立即刷新", 
					contentrefresh: "正在刷新...", 
					callback: pullfresh 
				}
			}
		});
		function pullfresh(){
			mui.get('/indexOrder',{},function(data){load(data);},'json');
			mui('#refreshContainer').pullRefresh().endPulldownToRefresh();
		}
//	解析json并生成节点插入DOM
		function load(data){
			var vue = new Vue({
				el:'#vuecontainer',
				data:{items:data},
				methods:{
					//form逻辑
					send:function(e){
						document.getElementById('id').value = e.target.id;
						document.getElementById('form').submit();
					}
				}
			});
		}
//	ajax动态获取json
		window.onload = function(){
			mui.get('/indexOrder',{},function(data){load(data);},'json');
		} 
		
	</script>
</body>
</html>