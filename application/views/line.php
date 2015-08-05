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
	
		#note-line 
		{
			stroke-width:2px;
			stroke:#000;
			
		}
		
	
	</style>
</head>

<body>
	<script>
	
		var margin = {top: 20, right: 30, bottom: 30, left: 30},
			width = window.innerWidth- margin.left - margin.right,
			height = 530 - margin.top - margin.bottom;
		
		var svg = d3.select("body").append("svg")
					.attr("width", width + margin.left + margin.right)
					.attr("height", height + margin.top + margin.bottom)
					.append("g")
					.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
		
		d3.csv('/alpha/data/14-1-ee.csv', function(error, data){
			
			console.log(data);
			
			data.forEach(function(d){
				d.score = parseFloat(d.score);
				d.quality = parseFloat(d.quality);
				d.finalscore = parseFloat(d.finalscore);
			})
			
			var x = d3.scale.linear()
					  .domain([0,data.length])
					  .range([0,width])
			
			console.log(d3.min(data,function(d){return d.score;}));
			console.log(d3.max(data, function(d){return d.score;}));
			
			var y1 = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.score;})-5, 
								d3.max(data, function(d){return d.score;})+5]
							)
					  .range([height,0]);
			
			
			var y2 = d3.scale.linear()
					  .domain([d3.min(data,function(d){return d.quality;})-1, 
								d3.max(data, function(d){return d.quality;})+1]
							)
					  .range([height,0]);
					  
			
			var lineScore = d3.svg.line()
						 .x(function(d,i) { return x(i); })
						 .y(function(d,i) { return y1(d.score); });
			
			var lineQuality = d3.svg.line()
						 .x(function(d,i) { return x(i); })
						 .y(function(d,i) { return y2(d.quality); });
			
			var yAxis1 = d3.svg.axis()
							.scale(y1)
							.orient('left');
			
			
			var yAxis2 = d3.svg.axis()
							.scale(y2)
							.orient('right');
							
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
		
 			//var hoverLine = svg.append('g').append('line')
				//			.attr('x1',0)
					//		.attr('y1',y1(83.397999))
						//	.attr('x2',width)
							//.attr('y2',y1(83.397999))
							//.attr("id", "note-line"); 
							
		
		});
	</script>
	
	<div>
		<input type="checkbox" id="score-control" checked = "true">学积分</input>
		<input type="checkbox" id="quality-control" checked = "true">素拓分</input>
	</div>
	
	<script>
		$('#score-control').on('click',function(){
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
		
		
		
	</script>
	
</body>
	
</html>