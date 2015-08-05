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
			width:100%px;
			height: 500px;
			margin: 0 auto;
			
		}
		
		#content {
			width:960px;
			margin: 0 auto;
		}
		
	</style>
</head>

<body>
	<div id = "content">
		<div id="frame">
			<iframe marginheight="0" marginwidth="0" scrolling="no" style="height:500; width:100%">
			
			
			</iframe>
		</div>
		
		<br/>
		<input id="ID" type="text" /><br/>
		<input id = "search" type = "button" value="click"/>
	</content>
	<script>
		$('#search').on('click',function(){
			var ID = $('#ID').val();
			//console.log(ID);
			$('iframe').attr('src', '/alpha/index.php/welcome/show_bubble/'+ID+"/1");
		});
	
	</script>
</body>


</html>