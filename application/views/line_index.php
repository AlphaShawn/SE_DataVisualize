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
		
		#content {
			width:960px;
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
		
		
	</style>
</head>

<body>
	<div id = "content">
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
		
		</select>
		
		<input id = "search" type = "button" value="show"/>
	</content>
	<script>
	
		$('#search').on('click',function(){
			var mess = $('#select-data').find('option:selected').val();
			$('iframe').attr('src', '/alpha/index.php/welcome/show_line/'+mess);
			
		});
		
	</script>
</body>


</html>