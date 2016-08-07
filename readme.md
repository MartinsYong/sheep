# 打绵羊——校园打车

如此顺风，上车！

## 后端

基于laravel 5.2

## 前端

使用MUI 2.8.0 + vuejs

## 主要文件目录结构描述

	├──app
	|    ├──Http
	|          ├──Controller
	|                      └── AccountController.php 用户控制器
	|                      └── OrderController.php 订单控制器
	|          └── routes.php 路由表
	|    └── User.php 用户数据模型
	|    └── Order.php 订单数据模型
	├──public 存储静态文件
	├──resources
	|          ├──view
	|                ├── main 存储所有视图文件
