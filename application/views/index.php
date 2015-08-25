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
		
		.list-unstyled li
		{
			font-size:18px;
			margin-left:90px;
			list-style-type:circle;
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
				<li class="active"><a href="#intro">概述</a></li>
				<li><a href="#entrance">可视化入口</a></li>
				<li><a href="#analyse">总结</a></li>
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

	<div class="jumbotron" id="intro">
		<div class="container">
			<h2>概述</h2>
			<p>
				&nbsp &nbsp &nbsp &nbsp综合测评是电院衡量同学们学习、社交等多个方面能力的方法。多年综测的推行，使得同学们不拘泥于课业，从多个维度发展自身能力。<br/>
				&nbsp &nbsp &nbsp &nbsp综合测评总分由70%的学积分成绩和30%的素拓成绩组成。作业通过对历年不同专业同学测评数据的可视化，探究电院同学学积分成绩和素拓成绩之间的隐性关系。并结合电院综测网站的素拓数据，可视化分析素拓具体的组成结构，给出取得高分素拓成绩的建议，并尝试对当前素拓成绩计算方式做出评价。<br/>
				&nbsp &nbsp &nbsp &nbsp作业由WEB网站、文档和ppt展示三部分组成。WEB部分采用PHP作为后端，使用CI框架，使用JQuery、D3等JS库及Bootstrap实现前端逻辑。<br/>
				&nbsp &nbsp &nbsp &nbsp数据取自电院历年综合评测成绩的公示与电院综合评测素拓统计网站(z.seiee.com)。
			</p>
		</div>
    </div>
	
	<div class="container marketing" id="entrance">
		<h2>可视化入口</h2>
		<div class="row">
			<div class="col-lg-4">
				<img class="img-circle" src="/alpha/image/score-quality.jpg" alt="Score-Quality" width="140" height="140">
				<h2>学积分&amp素拓</h2>
				<p>
					探究学积分与素拓成绩的关系<br/>
					借助D3、JQuery等工具<br/>
					使用折线图、散点图可视化数据
				</p>
				
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/line_index" target="_blank" role="button">
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
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/quality_num" target="_blank" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
			<div class="col-lg-4">
				<img class="img-circle" src="/alpha/image/bubble.jpg" alt="Generic placeholder image" width="140" height="140">
				<h2>素拓可视化</h2>
				<p>
					探究不同同学素拓成绩具体组成结构<br/>
					使用PHP库实现动态抓取数据<br/>
					使用D3可视化数据
				</p>
				<p><a class="btn btn-default" href="/alpha/index.php/welcome/show/bubble_index" target="_blank" role="button">View details &raquo;</a></p>
			</div><!-- /.col-lg-4 -->
		</div><!-- /.row -->
		<br/><br/>
	</div><!-- /.container -->	
	
	<div class="jumbotron" id="analyse">
		<div class="container">
			<h2>总结</h2>
			<p>
				&nbsp &nbsp &nbsp &nbsp作业主要从<strong>学积分与素拓分数的关系、素拓具体结构</strong>两个角度进行数据分析，并结合PHP、D3、JQ、Excel等工具从三个角度进行数据可视化。<br/>
				&nbsp &nbsp &nbsp &nbsp作业主要得到以下结论：
			</p>
					<ul class="list-unstyled">
						<li>素拓成绩与学积分呈一定负相关。基本表现为一方面优秀，另一方面平庸甚至很差。</li>
						<li>随着年级升高，高学积分同学的素拓成绩趋于中上水平，参与素质拓展活动意识增强。</li>
						<li>20-28分素拓成绩的提高，主要依靠参与素拓项目数的增加；28-29分素拓成绩的提高，主要依靠满分素拓项目数的增加；29-30+分素拓成绩的提高，主要依靠硬加分。</li>
					</ul>
			<p>
				&nbsp &nbsp &nbsp &nbsp学积分和素拓成绩的负相关，反映出同学们发展的单一性，同时说明多角度评测机制的重要性。 <br/>
				&nbsp &nbsp &nbsp &nbsp素拓成绩计算方式方面，积极参与各类活动的同学确能取得较好成绩，但评价机制仍过于简单化，同学只需选择性参加高分素拓活动，并达到一定活动数量，便可取得较好的成绩。换言之，当前的素拓计算方式无法区分素拓成绩中上、中等同学的真实素质拓展能力。<br/>
				&nbsp &nbsp &nbsp &nbsp硬加分是学业、社交等各方面高水准素质的体现。建议将其从素拓总分中独立出来，使素拓统计更清晰，同时作为综合测评加分项，参与综合测评的计算。同时设置合理上限，保证公平性。
			</p>
		</div>
    </div>
	
</body>
</html>


