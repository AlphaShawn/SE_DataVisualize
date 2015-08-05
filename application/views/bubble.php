<!DOCTYPE html>
<html>
<head>
	<title>bubble</title>
	<meta charset="utf-8">
	<script src="/alpha/js/d3.min.js"></script>
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	<style>

	text {
	  font: 10px sans-serif;
	}

	</style>
</head>

<body>
	<script>

	var base_url = "/alpha/index.php";
	
	
	var ID = <?php echo $ID ?>;
	var isAll = <?php echo $isAll ?>;

	//console.log(base_url+"/welcome/getScore/"+ID + "/" + isAll);
	d3.json(base_url+"/welcome/getScore/"+ ID + "/" + isAll, function(error, root) {
		//console.log(root);
		if (error) throw error;
	
		
	
		var width = 40*root.children.length>780?780:40*root.children.length,
			height = 500;
			//height = 15*root.children.length>560?560:20*root.children.length,
			format = d3.format(",d"),
			color = d3.scale.category20c();
	
		var bubble = d3.layout.pack()
			.sort(null)
			.size([width, height])
			.padding(1.5);

		var svg = d3.select("body")
			.append("div")
			.attr("style","width:"+width+"px;height:"+height+"px;margin:0 auto")
			.append("svg")
			.attr("width", width)
			.attr("height", height)
			.attr("class", "bubble");
			
		
		
		var scale = d3.scale.sqrt()
						.domain([d3.min(root.children,function(d){
							return d.size;
						}),100])
						.range([5,20]);
									
		root.children.forEach(function(value){
			//console.log(value.score);
			value.size = scale(value.size);
		});
		
		
		var node = svg.selectAll(".node")
					  .data( bubble.nodes(classes(root)).filter(function(d) { return !d.children; }))
					  .enter()
					  .append("g")
					  .attr("class", "node");
					  //.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

		node.append("title")
			.text(function(d) { return "成绩" + ": " + d.score; });

		node.append("circle")
			.attr('r',0)
			.transition()
			.delay(function(d,i){ return i*100;})
			.duration(1000)
			.ease('bounce')
			.attr("r", function(d) { return d.r; })
			.style("fill", function(d) { 
				return color(d.r%20); 
			})
			.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
			
		node.append("text")
			.attr("dy", ".3em")
			.style("text-anchor", "middle")
			.text(function(d) { return d.className.substring(0, d.r / 3); })
			.transition()
			.duration(1000)
			.delay(function(d,i){ return i*100;})
			.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });
			
		
		d3.select(self.frameElement).style("height", height + "px");
	});

	// Returns a flattened hierarchy containing all leaf nodes under the root.
	function classes(root) {
		var classes = [];

		function recurse(name, node) {
			if (node.children) 
				node.children.forEach( function(child) { 
											recurse(node.name, child); 
									});
			else 
				classes.push({
							packageName: name, 
							className: node.name, 
							value: node.size,
							score:node.score
							});
		}

		recurse(null, root);
		return {children: classes};
		
	}

	
	</script>

</html>