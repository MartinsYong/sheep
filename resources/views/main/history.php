<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/iconfont.css"/>
    <style type="text/css">
    	.mui-table-view {
   			box-shadow: 0 .05rem .1rem rgba(0,0,0,.3);
   			margin: .5rem;
    	}
    	.mui-table-view:before{
    		background-color: #fff;
    	}
    	.mui-table-view li:first-child {
    		margin: .5rem;
    		padding: 20px 23px;
    	}
    	.mui-table-view-cell:first-child:after {
    		left: 0;
    	}
    	.mui-table-view-cell:nth-child(2):after,
    	.mui-table-view-cell:nth-child(4):after{
    		left: 70%;
    	}
    	.arrow {
    		width: 10%;
    		display: block;
    		font-size: 20px;
    		position: absolute;
    		left: 48%;
    	}
    	
    	.mui-pull-right {
    		text-align: right;
    	}
    	.taken {
    		color: greenyellow;
    	}
    	.nottaken {
    		color: red;
    	}
    </style>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
		<a class="mui-pull-left mui-icon mui-icon-left-nav" href="/select"></a>
		<h1 class="mui-title">历史</h1>
	</header>
	<div class="mui-content" id="vuecontainer">
			<ul class="mui-table-view" v-for="item in items">
				<li class="mui-table-view-cell mui-collapse">
					<div class="mui-pull-left">{{item.origin}}</div>
					<span class="mui-icon iconfont icon-qianwang arrow"></span>
					<div class="mui-pull-right">{{item.dest}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-left">司机</div>
					<div class="mui-pull-right">{{item.picker_name?item.picker_name:'&nbsp;'}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-right">{{item.picker_phone?item.picker_phone:'&nbsp;'}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-left">乘客</div>
					<div class="mui-pull-right">{{item.owner_name}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-right">{{item.owner_phone}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-left">备注</div>
					<div class="mui-pull-right">{{item.description}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-left">状态</div>
					<div class="mui-pull-right" v-bind:class="{'taken':parseInt(item.taken),'nottaken':!parseInt(item.taken)}">{{parseInt(item.taken)?'已接':'未接'}}</div>
				</li>
				<li class="mui-table-view-cell">
					<div class="mui-pull-left mui-h6">更新于：{{item.updated_at}}</div>
				</li>
			</ul>
	</div>
	<script src="js/mui.min.js"></script>
	<script src="js/vue.min.js"></script>
	<script type="text/javascript">
		mui.init();
		window.onload = function(){
				mui.get('/indexHistory',{},function(data){
				var vue = new Vue({
					el:'#vuecontainer',
					data:{
						items:data
					}
				});
			},'json');
		}
	</script>
</body>
</html>