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
			height: 500px;
			margin: 0 auto;
			
		}
		
		#content {
			width:960px;
			height:500px;
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
		
		
	</style>
</head>

<body>
	<div id = "content">
		<div id="frame">
			<iframe marginheight="0" marginwidth="0" scrolling="no" style="float:left;height:inherit; width:70%">
			
			
			</iframe>
			<div id = "frame-info">
				<p>素拓总分： <span id = "total-score"></span></p>
				<p>硬加分：</p>
				<p>排名：</p>
				<p>参与活动数：</p>
				
			</div>
		</div>
		
		<br/>
		<div>
			<input id="ID" type="text" />
			<img id = "notify" ></img>
		</div>
		
		
		<input id = "search" type = "button" value="click"/>
	</content>
	<script>
	
	
		$('#search').on('click',function(){
			var ID = $('#ID').val();
			ID = $.trim(ID);
			if(ID == "")
			{
				alert("empty");
				return;
			}
			$('iframe').attr('src', '/alpha/index.php/welcome/show_bubble/'+ID+"/1");
			
			$.ajax({ url: "/alpha/index.php/welcome/test", success: function(d){
				console.log(d);
				$('#total-score').html(d);
			}});
		});
		
		
		$('#ID').keyup(function(){
			var ID = $('#ID').val();
			ID = $.trim(ID);
			if(ID == "")
				$('#notify').attr('src', '/alpha/image/invalid.png');
			else
			{
				$.ajax({ url: "/alpha/index.php/welcome/check_id/"+ID, success: function(d){
					if(d == "true")
						$('#notify').attr('src', '/alpha/image/ok.png');
					else
						$('#notify').attr('src', '/alpha/image/invalid.png');
				}});
			}
		})
		
		
	</script>
</body>


</html>