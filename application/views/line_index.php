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
		<div id="frame">
			<iframe marginheight="0" marginwidth="0" scrolling="no" style="height:100%; width:100%">
			
			
			</iframe>
		</div>
		
		<select id = "select-data">
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
		
		<input id = "search" type = "button" value="show"/>
	</div>
	<script>
	
		$('#search').on('click',function(){
			var mess = $('#select-data').find('option:selected').val();
			$('iframe').attr('src', '/alpha/index.php/welcome/show_line/'+mess);
			
		});
		
	</script>
	
	<div id="analyse-content">
		<hr>
		<h1>做图说明</h1>
		<ul>
			<li>横坐标按综测排名从小到大</li>
			<li>左纵坐标为学积分成绩</li>
			<li>右纵坐标为素拓成绩</li>
		</ul>
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