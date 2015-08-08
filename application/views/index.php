<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Score | Visualize</title>
	<meta charset = "utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	<script src = "/alpha/js/d3.min.js"></script> 
	<link rel="stylesheet" href="/alpha/css/bootstrap.css" type="text/css"/>
	
	<style>
		body
		{
			padding-top: 50px;
		}
		
		
		#heading ul 
		{
			list-style:none;
		}
		#heading li
		{
			padding-top:10px;
		}

		.starter-template {
			margin-top:50px;
			padding-left:15px;
			padding-right:15px;
			padding-bottom:20px;
			text-align: center;
		}
		
		.middle-template {
			
			text-align: center;
			padding-bottom:20px;
		}
		
		.footer {
			position: absolute;
			bottom: 0;
			width: 100%;
			/* Set the fixed height of the footer here */
			height: 60px;
			background-color: #f5f5f5;
		}
		
		.btn-ultra
		{
			background-color: #337ab7;
			border: 1px solid #2e6da4;
			border-radius: 15px;
			box-shadow: none;
			color: #fff;
			text-align:center;
			font-weight: 700;
			padding-top:15px;
			padding-bottom:15px;
			width: 20%;
			font-size: 14px;
			margin: 0 40px;
			-webkit-font-smoothing: antialiased;
			-webkit-transition: all .25s;
			-moz-transition: all .25s;
			transition: all .25s;
			-webkit-backface-visibility: hidden;
			-webkit-transform: translateZ(0) scale(1,1)
		}
	</style>
	
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Score Visualize</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
				<li class="active"><a href="#">概述</a></li>
				<li><a href="#entrance">可视化入口</a></li>
				<li><a href="#analyse">分析总结</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
    </nav>

    <div class="container">

		<div class="starter-template">
			<h1>软件工程职业素养</h1>
			<p class="lead">数据可视化大作业</p>
			<p class="lead">F1403703\5140379066\肖煜伟</p>
			
		</div>
    </div><!-- /.container -->
	<hr/>
	
	<div class="container marketing" id="entrance">

		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="/alpha/image/score-quality.jpg" alt="Score-Quality" width="140" height="140">
				<h2>学积分&amp素拓</h2>
				<p>
					探究学积分与素拓成绩的关系<br/>
					借助D3、JQuery等工具<br/>
					使用折线图、散点图可视化数据
				</p>
				
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/line_index" role="button">
					View details &raquo;
				</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="/alpha/image/14-se.png" alt="Generic placeholder image" width="140" height="140">
				<h2>素拓&amp参与活动数</h2>
				<p>
					探究素拓成绩与参与的素质拓展活动数量的关系<br/>
					利用Excel清洗并可视化数据<br/>
					结合JS等WEB开发工具整合并展现可视化结果
				</p>
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/quality_num" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="/alpha/image/bubble.jpg" alt="Generic placeholder image" width="140" height="140">
				<h2>素拓可视化</h2>
				<p>
					探究不同同学素拓成绩具体组成结构<br/>
					使用PHP库实现动态抓取数据<br/>
					使用D3可视化数据
				</p>
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/bubble_index" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
	
	</div><!-- /.container -->
	<hr/>
	
</body>
</html>


