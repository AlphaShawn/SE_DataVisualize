<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Score | Visualize</title>
	<meta http-equiv="Content-type" content="text/html"; charset='utf-8'></meta>
	<script src="/alpha/js/d3.min.js" charset='utf-8'></script>
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	
	<style>
	
	body {
	  font: 10px sans-serif;
	}

	.axis path,
	.axis line {
	  fill: none;
	  stroke: #000;
	  shape-rendering: crispEdges;
	}

	.dot {
	  stroke: #000;
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
	</style>
	
</head>


<body>
	<script>
	
		var margin = {top: 20, right: 30, bottom: 30, left: 30},
			width = window.innerWidth- margin.left - margin.right-20,
			height = 530 - margin.top - margin.bottom-20;
		
		var svg = d3.select("body").append("svg")
					.attr("width", width + margin.left + margin.right)
					.attr("height", height + margin.top + margin.bottom)
					.append("g")
					.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
		var scoreAverage=0,x;
		var qualityAverage=0,y;
		var dat, vertialLine;
		
		var url = "<?php echo $url?>";
		
		d3.csv('/alpha/data/'+url, function(error,data){
			if(error)
				throw error;
			
			dat = data;
			data.forEach(function(d){
				d.score = parseFloat(d.score);
			//	scoreAverage += d.score;
				d.quality = parseFloat(d.quality);
				d.quality = d.quality/0.3;			//
			//	quality += d.quality;
				d.finalscore = parseFloat(d.finalscore);
			});
			
			
			
			x = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.score;})-1, 
								d3.max(data, function(d){return d.score;})+1]
							)
					  .range([0,width]).nice();
			
			y = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.quality;})-1, 
								d3.max(data, function(d){return d.quality;})+1]
							)
					  .range([height,0]).nice();
					  
			var xAxis = d3.svg.axis()
							.scale(x)
							.orient("bottom");

			var yAxis = d3.svg.axis()
							.scale(y)
							.orient("left");
			
			
			svg.append("g")
				.attr("class", "x axis")
				.attr("transform", "translate(0," + height + ")")
				.call(xAxis)
				.append('text')
				.attr('transform',"translate("+(width-margin.right) + ",-5)")
				.text('学积分');
				
			svg.append("g")
				.attr("class", "y axis")
				.call(yAxis)
				.append('text')
				.text("素拓分数");
			
			scoreAverage = d3.mean(data,function(d){return d.score;}).toFixed(2);
			qualityAverage = d3.mean(data,function(d){return d.quality}).toFixed(2);
			
			svg.selectAll(".dot")
				.data(data)
				.enter().append("circle")
				.attr("class", "dot")
				.attr("r", 3.5)
				.attr("cx", function(d) { return x(d.score); })
				.attr("cy", function(d) { return y(d.quality); })
				.style("fill", function(d) {
					if(d.score>scoreAverage && d.quality<qualityAverage)
						return "red";
					else
						return "#000";
			
				});
				
				
			
			var scoreAverageLine = svg.append('g')
									  .attr('id', 'score-average-group')
									  .attr('transform', 'translate('+x(scoreAverage)+ ",0)");
			
			scoreAverageLine.append('text')
							.text("平均学积分："+scoreAverage)
							.attr("fill", "steelblue")
							.attr('transform', 'translate(5,-5)');
			
			scoreAverageLine.append('line')
							.attr('id', 'score-average-line')
							.attr('x1',0)
							.attr('y1',0)
							.attr('x2',0)
							.attr('y2',height);
			
			
			var qualityAverageLine = svg.append('g')
										.attr('id', 'quality-average-group')
										.attr('transform', 'translate(0,' + y(qualityAverage) + ')');
			
			qualityAverageLine.append('text')
							.text("平均素拓分："+qualityAverage)
							.attr('transform', 'translate(5,-5)');
			
			qualityAverageLine.append('line')
							.attr('id', 'quality-average-line')
							.attr('x1',0)
							.attr('y1',0)
							.attr('x2',width)
							.attr('y2',0);
			
		})
	</script>

</body>

</html>