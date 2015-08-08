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
			font-family: "Helvetica Neue", Helvetica, sans-serif;
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

		<div id="frame" class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="/alpha/index.php/welcome/show/bubble_prompt"></iframe>
		</div>
		
		<div>
			<div class="col-lg-4" style="margin: 0 auto;float:none">
				<div class="input-group">
					<input type="text" class="form-control" id="ID" placeholder="enter student ID..."/>
					<span class="input-group-btn">
						<button class="btn btn-default" id = "search" type="button">Show</button>
					</span>
				</div><!-- /input-group -->
			</div><!-- /.col-lg-4 -->
			<div class = "clearfix"></div>
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