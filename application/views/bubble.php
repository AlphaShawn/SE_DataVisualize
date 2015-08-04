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

	var diameter = 960,
		format = d3.format(",d"),
		color = d3.scale.category20c();

	var bubble = d3.layout.pack()
		.sort(null)
		.size([diameter, diameter])
		.padding(1.5);

	var svg = d3.select("body").append("svg")
		.attr("width", diameter)
		.attr("height", diameter)
		.attr("class", "bubble");
	
	d3.json("getScore/5140379058/1", function(error, root) {
		if (error) throw error;
	
		var scale = d3.scale.sqrt()
						.domain([d3.min(root.children,function(d){
							return d.size;
						}),100])
						.range([5,20]);
									
		root.children.forEach(function(value){
			value.size = scale(value.size);
		});
		
		
		var node = svg.selectAll(".node")
					  .data(bubble.nodes(classes(root))
					  .filter(function(d) { return !d.children; }))
					  .enter().append("g")
					  .attr("class", "node");
					  //.attr("transform", function(d) { return "translate(" + d.x + "," + d.y + ")"; });

		node.append("title")
			.text(function(d) { return d.className + ": " + format(d.value); });

		node.append("circle")
			.attr('r',0)
			.transition()
			.delay(function(d,i){ return i*100;})
			.duration(1000)
			.ease('bounce')
			.attr("r", function(d) { return d.r; })
			.style("fill", function(d) { 
				return color(d.packageName); 
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
							value: node.size
							});
		}

		recurse(null, root);
		return {children: classes};
	}

	d3.select(self.frameElement).style("height", diameter + "px");
	
	</script>

	<input id="ID" type="text">
	<input id = "search" type = "button" value="click"/>
	
	<script>
		$('#remove').on('click',function(){
			$("svg").remove();
			
			
		});
	
	</script>

</html>