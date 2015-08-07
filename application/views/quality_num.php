<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<script src="/alpha/js/jquery-1.11.3.js"></script>
	<script src="/alpha/js/jquery.enlarge.min.js"></script>
	
	<style type="text/css">
	
		body 
		{
			width:960px;
			margin:0 auto;
			height:1000px;
		}
		
		.pair-image
		{
			margin-bottom:10px;
		
		}
		
		.bottom-clear{
			clear:both;
		}
		
		.image-group
		{
			float:left;
			margin-left:10px;
			margin-right:10px;
		}
		
		.image-heading
		{
			font-family: "Helvetica Neue", Helvetica, sans-serif;
			text-align:center;
		}
		
		#heading
		{
			font-size:25px;
			margin-left:40px;
		}
		
		#image-content
		{
			float:left;
			width:60%;
		}
		
		#intro-content
		{
			float:left;
			width:38%;
		}
		
		#intro-content li
		{
			font-family: "Helvetica Neue", Helvetica, sans-serif;
			font-size:15px;
			margin-bottom:15px;
		}
	</style>

</head>

<script>
$(function(){
	$(".dd").enlarge(
	{
		// 鼠标遮罩层样式
		shadecolor: "#FFD24D",
		shadeborder: "#FF8000",
		shadeopacity: 0.4,
		cursor: "move",

		// 大图外层样式
		layerwidth: 480,
		layerheight: 360,
		layerborder: "#DDD",
		fade: true,

		// 大图尺寸
		largewidth: 960,
		largeheight: 720
	});
});

</script>

<body>
	<div id="image-content">
		
		<p id="heading">各学院素拓成绩与参与素拓项目数的关系</p>
		
		<div class="pair-image">
			<div class="image-group">
				<p class="image-heading">信安</p>
				<a href="/alpha/image/14-is.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-is-small.png" width="240" height="180">
					<img src="/alpha/image/14-is.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="bottom-clear"></div>
			</div>
			<div class="image-group">
				<p class="image-heading">软工</p>
				<a href="/alpha/image/14-se.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-se-small.png" width="240" height="180">
					<img src="/alpha/image/14-se.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="bottom-clear"></div>
			</div>
			<div class="bottom-clear"></div>
		</div>
		
		<div class="pair-image">
			<div class="image-group">
				<p class="image-heading">电子信息类</p>
				<a href="/alpha/image/14-seiee.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-seiee-small.png" width="240" height="180">
					<img src="/alpha/image/14-seiee.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="bottom-clear"></div>
			</div>
			<div class="image-group">
				<p class="image-heading">微电子</p>
				<a href="/alpha/image/14-ic.png" class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-ic-small.png" width="240" height="180">
					<img src="/alpha/image/14-ic.png" width="960" height="720" style="display: none;z-index=1">
				</a>
				<div class="bottom-clear"></div>
			</div>
			<div class="bottom-clear"></div>
		</div>
		
		<div class="pair-image">
			<div class="image-group">
				<p class="image-heading">电子信息科学类</p>
				<a href="/alpha/image/14-seiees.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-seiees-small.png" width="240" height="180">
					<img src="/alpha/image/14-seiees.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="bottom-clear"></div>
			</div>
			
			<div class="image-group">
				<p class="image-heading">工试</p>
				<a href="/alpha/image/14-eec.png" class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-eec-small.png" width="240" height="180">
					<img src="/alpha/image/14-eec.png" width="960" height="720" style="display: none;z-index=1">
				</a>
				<div class="bottom-clear"></div>
			</div>
		</div>
		
		<div  style="margin-left: 150px">
			<img src="/alpha/image/sub.png"/>
		
		</div>
		<div class="bottom-clear"></div>
	</div>
	
	<div id="intro-content">
		<h1>Conclusion:</h1>
		<ol>
			<li>素拓分数和参加项目数没有必然联系</li>
			<li>素拓分数低，参加项目数往往也少</li>
			<li>参加项目多的人，素拓分数都不低</li>
			<li>素拓分数超高的人，参加项目数往往并不是很多</li>
		</ol>
	</div>
</body>
</html>
