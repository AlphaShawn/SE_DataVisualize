<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src = "/alpha/js/jquery-1.11.3.js" charset = 'utf-8'></script>
	<link rel="stylesheet" href="/alpha/css/bootstrap.css" type="text/css"/>
	
	<style>
		body
		{
			height:500px;
			background-color:#fff;
			color:#000;
		}
		
		.container
		{
			margin:0 auto;
			margin-top:100px;
			text-align:center;
		}
	
	</style>
	
</head>

<body>
	<script>
		$('body').attr('height', window.innerWidth-20);
	</script>
	
	<div class="jumbotron" style="background-color:#fff;">
		<div class="container">
			<h1>Bubble Visualization</h1>
			<h3>Enter student ID number</h3>
			<p>Then Click button To see the result</p>
			<small>参考：软工学号起止5140379001-5140379072</small>
		</div>
	</div>
	
	

</body>


</html>