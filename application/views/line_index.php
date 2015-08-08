<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Score | Visualize</title>
	<meta charset = "utf-8"/>
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	<script src = "/alpha/js/d3.min.js"></script> 
	<link rel="stylesheet" href="/alpha/css/bootstrap.css" type="text/css"/>
	<style>
		body { 
			font-family: "Helvetica Neue", Helvetica, sans-serif;
			margin: 1em auto 4em auto;
			position: relative;
			tab-size: 2;
			width: 960px;
		}
	
		#frame {
			width:100%;
			height: 560px;
			margin: 10px 0 20px 0 ;
			
		}
		
		#data-content {
			width:100%;
		}
		
		#frame-info {
			width:28%;
			height:100%;
			float:right;
			font-family: "sans-serif";
		}
		
		#ok-info {
			background:url("/alpha/image/ok.png");
			height:14px;
			width:14px;
		}
		
		#invalid-info {
			background:url("/alpha/image/invalid.png");
			padding-left:14px;
		}
		
		#analyse-content
		{
			width:100%;
			margin-top:30px;
		}
		
	</style>
</head>

<body>
	<div id = "data-content">
	
		<div id="frame" class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src=""></iframe>
		</div>
		
		<div class="row">
			<div class="col-xs-4">
				<select id = "select-data" class="form-control">
					<option value="14-1-14-se.csv" selected="selected">14-15学年14级软件</option>
					<option value="14-1-14-seiee.csv">14-15学年14级电子信息类</option>
					<option value="14-1-14-ic.csv">14-15学年14级微电子</option>
					<option value="14-1-14-is.csv">14-15学年14级信安</option>
					<option value="14-1-14-seiees.csv">14-15学年14级电子信息科学类</option>
					<option value="14-1-14-eec.csv">14-15学年14级工科实验班</option>
					<option value="14-1-13-se.csv">14-15学年13级软件</option>
					<option value="14-1-13-cs.csv">14-15学年13级计算机科学</option>
					<option value="14-1-13-auto.csv">14-15学年13级自动化</option>
					<option value="14-1-13-eea.csv">14-15学年13级电气工程及自动化</option>
					<option value="14-1-13-est.csv">14-15学年13级电子科学与技术</option>
					<option value="14-1-13-is.csv">14-15学年13级信安</option>
					<option value="14-1-13-it.csv">14-15学年13级信息工程</option>
					<option value="14-1-13-mcti.csv">14-15学年13级测控</option>
					<option value="14-1-13-ic.csv">14-15学年13级微电子</option>
					<option value="14-1-13-seiees.csv">14-15学年13级电子信息科学类</option>
				</select>
			</div>
			<div class="col-xs-3">
				<label class="radio-inline">
					<input name="vis" type="radio" value="scatter">散点图
				</label>
				<label class="radio-inline">
					<input name="vis" type="radio" value="lineChart" checked="checked">折线图
				</label>
			</div>
			<div class="col-xs-2">
				<input id = "search" class="btn btn-default" type = "button" value="show"/>
			</div>
		</div>
	</div>
	<script>
	
		$('#search').on('click',function(){
			var mess = $('#select-data').find('option:selected').val();
			var val= $('input:radio[name="vis"]:checked').val();
			if(val == "lineChart")
				$('iframe').attr('src', '/alpha/index.php/welcome/show_line/'+mess);
			else if(val == "scatter")
				$('iframe').attr('src', '/alpha/index.php/welcome/show_scatter/'+mess);
			
		});
		
	</script>
	
	<div id="analyse-content">
		<hr>
		<h1>Analyse</h1>
			<p>随着综测排名下降，学积分总体呈下降趋势，但存在几处较大波动</p>
			<p>学积分曲线和素拓分数曲线形状基本呈上下对称</p>
			<p>学积分高的人，素拓分往往不会特别突出，而素拓分高的人，学积分也不会特别优异</p>
			<p>高学积分低综测排名的现象在14级同学中出现更多</p>
		<hr>
		<h1>Conclusion</h1>
			<p>学积分的高低往往决定综测排名的高低</p>
			<p>较多同学在学积分和素拓上存在“偏科”</p>
			<p>年级的升高，使得课业优秀的同学更有意识的去参与素质拓展活动</p>
	</div>
</body>


</html>