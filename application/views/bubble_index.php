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
			margin: 1em auto 4em auto;
			position: relative;
			tab-size: 2;
			width: 960px;
		}
	
		#frame
		{
			height:540px;
		}
		
		#content {
			width:960px;
			margin: 0 auto;
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
		
		.jumbotron
		{
			background-color:#fff;
		}
		
	</style>
</head>

<body>

	<div id = "content">
		<div id="frame" class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="/alpha/index.php/welcome/show/bubble_prompt"></iframe>
		</div>
		
		<div class="col-lg-4" style="margin: 0 auto;margin-bottom:50px;float:none">
			<div class="input-group">
				<input type="text" class="form-control" id="ID" placeholder="enter student ID..."/>
				<span class="input-group-btn">
					<button class="btn btn-default" id = "search" type="button">Show</button>
				</span>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-4 -->
		<div class = "clearfix"></div>
	</div>
	
	<div class="jumbotron" style="padding-bottom:0px;margin-bottom:0px;">
		<div class="container">
			<h2>Note:</h2>
			<p>
				&nbsp &nbsp &nbsp &nbsp 数据来源：电院综测网站抓取并处理得到<br/>
				&nbsp &nbsp &nbsp &nbsp 分析维度：素拓成绩、纯素拓成绩<small>（除去硬加分）</small>、硬加分、参与活动数目、高分活动数目、参与硬加分活动数目
			</p>
		</div>
	</div>
		
	<div class="jumbotron" >
		<div class="container">
			<h2>Analyse</h2>
			<p>
				&nbsp &nbsp &nbsp &nbsp 将素拓成绩分段，对各个区间的各项素拓数据取平均值得下图。可以看到，不同数据在不同区间段有不一样的变化幅度。据此进行推测并做进一步分析。
			</p>
			<img src="/alpha/image/quality-all.png" class="img-thumbnail center-block" style="margin-top:15px;margin-bottom:50px;"/>
			<p>
				&nbsp &nbsp &nbsp &nbsp 取素拓成绩分段作为X轴，做硬加分与纯素拓的折线图。发现，同为素拓总分的组成部分，纯素拓在总分较低时变化较快，而硬加分在总分比较高时，变化幅度较大。<br/>
				&nbsp &nbsp &nbsp &nbsp 结论：硬加分成就高分素拓。
			</p>
			<img src="/alpha/image/plus-purescore.png" class="img-thumbnail center-block" style="margin-top:15px;margin-bottom:50px;"/>
			<p>
				&nbsp &nbsp &nbsp &nbsp 参与活动数随着素拓总分较稳定得呈线性下降。<br/>
				&nbsp &nbsp &nbsp &nbsp 高分满分项数在27-29分区间对纯素拓影响较大。<br/>
				&nbsp &nbsp &nbsp &nbsp 27-29分区间内，参与活动数和纯素拓相关度:0.383，高分满分项和纯素拓相关度：0.654。<br/>
				<span class="text-right" style="display:block; font-size:14px">(计算方式：Excel内CORREL函数，越接近1越相关)</span>
				&nbsp &nbsp &nbsp &nbsp 结论：高分满分项个数是达到28分以上的关键。<br/>
			</p>
			<div class="row" style="margin-bottom:50px;">
				<div class="col-md-6">
				<img src="/alpha/image/highscorenum-purescore.png" class="img-thumbnail"/>
				</div>
				<div class="col-md-6">
				<img src="/alpha/image/num-purescore.png" class="img-thumbnail"/>
				</div>
			</div>
			
			<p>
				&nbsp &nbsp &nbsp &nbsp 总分20-28区间下，纯素拓与参与项目总数关系更明显<br/>
				&nbsp &nbsp &nbsp &nbsp 该区间下，参与活动数和纯素拓相关度:0.529，高分满分项和纯素拓相关度：0.201。<br/>
				<span class="text-right" style="display:block; font-size:14px">(计算方式：Excel内CORREL函数，越接近1越相关)</span>
				&nbsp &nbsp &nbsp &nbsp 结论：纯素拓在该区间下主要由参与活动数决定。<br/>
			</p>	
			<div class="row" style="margin-bottom:50px;">
				<div class="col-md-6">
				<img src="/alpha/image/20-28-purescore-num.png" class="img-thumbnail"/>
				</div>
				<div class="col-md-6">
				<img src="/alpha/image/20-28-purescore-highnum.png" class="img-thumbnail"/>
				</div>
			</div>
			
		</div>
		<div class="clearfix"></div>
	</div>
		
	<div class="jumbotron" style="margin-top:-130px;">
		<div class="container">
			<h2>Suggestion</h2>
			<p>
				&nbsp &nbsp &nbsp &nbsp 参与活动数不需要多，但一定不能过少<br/>
				&nbsp &nbsp &nbsp &nbsp 想取得28分以上素拓成绩，满分高分素拓活动必不可少</br>
				&nbsp &nbsp &nbsp &nbsp 想获得29分以上的素拓，要积极参与硬加分素拓项目</br>
			</p>
		</div>
	</div>		

	
	<script>
		$('#search').on('click',function(){
			var ID = $('#ID').val();
			ID = $.trim(ID);
			if(ID=="")
			{
				$('iframe').attr('src', '/alpha/index.php/welcome/show/wrong_page');
				return;
			}
			$.ajax({url:'/alpha/index.php/welcome/check_id/'+ID, 
					success:function(d){
						if(d==false)
							$('iframe').attr('src', '/alpha/index.php/welcome/show/wrong_page');
						else
							$('iframe').attr('src', '/alpha/index.php/welcome/show_bubble/'+ID+"/1");
					}
			})
		});
		
	</script>
	
</body>


</html>