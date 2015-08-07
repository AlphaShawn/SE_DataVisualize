<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<meta http-equiv="Content-type" content="text/html"; charset='utf-8'></meta>
	<script src="/alpha/js/d3.min.js" charset='utf-8'></script>
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	<style>

		body {
		  font: 10px sans-serif;
		}

		.axis path,
		.axis line {
		  stroke: #000;
		}

		#line-score {
		  fill: none;
		  stroke: steelblue;
		  stroke-width: 1.5px;
		}
		
		#line-quality {
		  fill: none;
		  stroke:#000;
		  stroke-width: 1.5px;
		}
		
		#score-average-line
		{
			stroke-width:1px;
			stroke: steelblue;	
		}
		
		#quality-average-line 
		{
			stroke-width:1px;
			stroke: #000;
		}

		#vertival-line
		{
			stroke-width:1px;
			stroke: #000;
		}
		
		#control-console {
			font :14px Tahoma,Helvetica,Arial,"\5b8b\4f53",sans-serif
		}
		
		#info 
		{
			float:right;
			margin-right:20px;
		}
		
		#info li
		{
			display:inline;
			margin-right:5px;
		}
	</style>
</head>

<body>
	<script>
	
		var url = "<?php echo $url?>";
	
		var margin = {top: 20, right: 30, bottom: 30, left: 30},
			width = window.innerWidth- margin.left - margin.right,
			height = 530 - margin.top - margin.bottom;
		
		var svg = d3.select("body").append("svg")
					.attr("width", width + margin.left + margin.right)
					.attr("height", height + margin.top + margin.bottom)
					.append("g")
					.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
		var scoreAverage ,y1;
		var qualityAverage, y2;
		var dat, vertialLine;
		var x;
		
		d3.csv('/alpha/data/'+url, function(error, data){
			
			//console.log(data);
			
			//转化字符串为数字
			dat = data;
			data.forEach(function(d){
				d.score = parseFloat(d.score);
				d.quality = parseFloat(d.quality);
				d.finalscore = parseFloat(d.finalscore);
			})
			
			//x轴坐标映射函数
			x = d3.scale.linear()
						.domain([0,data.length])
						.range([0,width])
			
			//console.log(d3.min(data,function(d){return d.score;}));
			//console.log(d3.max(data, function(d){return d.score;}));
			
			//y1轴映射函数
			y1 = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.score;})-5, 
								d3.max(data, function(d){return d.score;})+5]
							)
					  .range([height,0]);
			
			//y2轴映射函数
			y2 = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.quality;})-1, 
								d3.max(data, function(d){return d.quality;})+1]
							)
					  .range([height,0]);
					  
			//学积分折线
			var lineScore = d3.svg.line()
						 .x(function(d,i) { return x(i); })
						 .y(function(d,i) { return y1(d.score); });
			
			//素拓分折线
			var lineQuality = d3.svg.line()
						 .x(function(d,i) { return x(i); })
						 .y(function(d,i) { return y2(d.quality); });
			
			
			//y1坐标轴
			var yAxis1 = d3.svg.axis()
							.scale(y1)
							.orient('left');
			
			//y2坐标轴
			var yAxis2 = d3.svg.axis()
							.scale(y2)
							.orient('right');
						
			//x坐标轴
			var xAxis = d3.svg.axis()
							.scale(x)
							.orient("bottom");
			
			
			svg.append("g")
			   .attr("class", "x axis")
			   .attr("transform", "translate(0," + height + ")")
			   .call(xAxis);
			   
			svg.append("g")
				.attr("class", "y axis")
				.call(yAxis1);
			
			svg.append("g")
				.attr("class", "y axis")
				.attr("transform", "translate("+(width)+",0)")
				.call(yAxis2);
			
			svg.append("path")
			   .datum(data)
			   .attr("id", "line-score")
			   .attr("d", lineScore);
			
			svg.append("path")
			   .datum(data)
			   .attr("id", "line-quality")
			   .attr("d", lineQuality)
			   .attr('style',"stroke:#000");
		
		//	console.log(data);
			
			scoreAverage = d3.mean(data,function(d){return d.score;}).toFixed(2);
			qualityAverage = d3.mean(data,function(d){return d.quality}).toFixed(2);
			
			var scoreAverageLine = svg.append('g')
									  .attr('id', 'score-average-group')
									  .attr('transform', 'translate(0,'+y1(scoreAverage)+")");
			
			scoreAverageLine.append('text')
							.text(scoreAverage)
							.attr("fill", "steelblue")
							.attr('transform', 'translate(5,-5)');
			
			scoreAverageLine.append('line')
							.attr('id', 'score-average-line')
							.attr('x1',0)
							.attr('y1',0)
							.attr('x2',width)
							.attr('y2',0);
			
			
			var qualityAverageLine = svg.append('g')
										.attr('id', 'quality-average-group')
										.attr('transform', 'translate(0,' + y2(qualityAverage) + ')');
			
			qualityAverageLine.append('text')
							.text(qualityAverage)
							.attr('transform', 'translate(5,-5)');
			
			qualityAverageLine.append('line')
							.attr('id', 'quality-average-line')
							.attr('x1',0)
							.attr('y1',0)
							.attr('x2',width)
							.attr('y2',0);
			
			vertialLine = svg.append('g')
							 .attr('id', 'vertival-group')
							 .attr('transform', 'translate(-100,0)');
			
			vertialLine.append('text')
					   .attr('transform', 'translate(0,0)');
			
			vertialLine.append('line')
						.attr('id', 'vertival-line')
						.attr('x1',0)
						.attr('y1',0)
						.attr('x2',0)
						.attr('y2',height);
						
			$('#total-students').text(" " + data.length);
		});
	</script>
	
	<div id = "control-console">
		<div style="float:left">
			<input type="checkbox" id="score-control" checked = "true"><span style="color:steelblue">学积分</span></input>
			<input type="checkbox" id="quality-control" checked = "true">素拓分</input>
			<input type="checkbox" id="score-average-control" checked = "true"><span style="color:steelblue">学积分平均值</span></input>
			<input type="checkbox" id="quality-average-control" checked = "true">素拓分平均值</input>
		</div>
		<div id = "info">
			<td>
				<li>总人数:<span id="total-students"></span></li>
				<li>学积分低于平均分人数：<span id="score-lower-average">0</span></li>
				<li>素拓分低于平均分人数：<span id="quality-lower-average">0</span></li>
			</td>
		</div>
	</div>
	
	<script>
			
		$('#score-control').on('click',function(){
			
		//	console.log(dat);
			
			if(this.checked != true)
			{
				$('#line-score').attr('style', "stroke-width:0");
			}
			else{
				$('#line-score').attr('style', "stroke-width:1.5px");
			
			}
		});
		
		$('#quality-control').on('click',function(){
			if(this.checked != true)
			{
				$('#line-quality').attr('style', "stroke-width:0");
			}
			else{
				$('#line-quality').attr('style', "stroke-width:1.5px");
			
			}
		});
		
		
		$('#score-average-control').on('click',function(){
			if(this.checked != true)
			{
				d3.select('#score-average-group').transition()
										.duration(1000)
										.attr('transform', "translate(0," + 800+")");
			}
			else{
				d3.select('#score-average-group')
						.transition()
						.duration(1000)
						.attr('transform', "translate(0," + y1(scoreAverage)+")");
			}
		});
		
		$('#quality-average-control').on('click',function(){
			if(this.checked != true)
			{
				d3.select('#quality-average-group').transition()
										.duration(1000)
										.attr('transform', "translate(0,800)");
			}
			else{
				d3.select('#quality-average-group')
						.transition()
						.duration(1000)
						.attr('transform', "translate(0," + y2(qualityAverage)+")");
			}
		});
		
		
		$('svg').on('mouseover', function(){
			//console.log('over');
		});

		$('svg').on('mousemove', function(event){
			//console.log('move');
			var mouseX = event.clientX-margin.left;
			var mouseY = event.clientY-margin.top;
			if(mouseX<0 || mouseX>width || mouseY<0 || mouseY>height)
				verticalLineRemove();
			else
			{
				var num = Math.floor(x.invert(mouseX))+1;
				d3.select('#vertival-group')
					.attr('transform', "translate("+mouseX+","+0+")")
					.select('text')
					.text(num)
					.attr('transform', "translate(-15,"+mouseY+")");
				
				var scoreLower=0, qualityLower=0;
				for(var i=0;i<num;i++)
				{
					if(dat[i].score<scoreAverage)
						scoreLower++;
					if(dat[i].quality<qualityAverage)
						qualityLower++;
				}
				
				d3.select('#score-lower-average').text(scoreLower);
				d3.select('#quality-lower-average').text(qualityLower);
				//d3.select('#line-group')
					//.attr('transform', "translate(0,0)");
			}
		});

		
		
		$('svg').on('mouseout', function(){
			verticalLineRemove();
		});

		
		function verticalLineRemove()
		{
			d3.select('#vertival-group')
				.attr('transform', "translate(-100,0)");
			d3.select('#score-lower-average').text(0);
				d3.select('#quality-lower-average').text(0);
		}
		
	</script>
	
</body>
	
</html>