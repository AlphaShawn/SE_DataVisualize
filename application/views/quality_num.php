<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title></title>
	<script src="/alpha/js/jquery-1.11.3.js"></script>
	<script src="/alpha/js/jquery.enlarge.min.js"></script>
	<link rel="stylesheet" href="/alpha/css/bootstrap.css" type="text/css"/>
	
	<style type="text/css">
	
		body 
		{
			width:960px;
			margin:0 auto;
			margin-top:50px;
			height:1000px;
			color:#333;
		}
		
		.pair-image
		{
			margin-bottom:10px;
			padding-left:28px;
		}
	
		.image-group
		{
			float:left;
			margin-left:10px;
			margin-right:10px;
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
			height:100%;
		}
		
		#intro-content p
		{
			font-size: 21px;
			font-weight: 200;
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
		
		<h3 class="text-center">各学院素拓成绩与参与素拓项目数的关系</h3>
		
		<div class="pair-image">
			<div class="image-group">
				<p class="text-center">信安</p>
				<a href="/alpha/image/14-is.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-is-small.png" width="240" height="180">
					<img src="/alpha/image/14-is.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				
			</div>
			<div class="image-group">
				<p class="text-center">软工</p>
				<a href="/alpha/image/14-se.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-se-small.png" width="240" height="180">
					<img src="/alpha/image/14-se.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="pair-image">
			<div class="image-group">
				<p class="text-center">电子信息类</p>
				<a href="/alpha/image/14-seiee.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-seiee-small.png" width="240" height="180">
					<img src="/alpha/image/14-seiee.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="image-group">
				<p class="text-center">微电子</p>
				<a href="/alpha/image/14-ic.png" class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-ic-small.png" width="240" height="180">
					<img src="/alpha/image/14-ic.png" width="960" height="720" style="display: none;z-index=1">
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		<div class="pair-image">
			<div class="image-group">
				<p class="text-center">电子信息科学类</p>
				<a href="/alpha/image/14-seiees.png"  class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-seiees-small.png" width="240" height="180">
					<img src="/alpha/image/14-seiees.png" width="960" height="720" style="display: none; z-index:100">
				</a>
				<div class="clearfix"></div>
			</div>
			
			<div class="image-group">
				<p class="text-center">工试</p>
				<a href="/alpha/image/14-eec.png" class="dd" style="position: relative;float: left;">
					<img src="/alpha/image/14-eec-small.png" width="240" height="180">
					<img src="/alpha/image/14-eec.png" width="960" height="720" style="display: none;z-index=1">
				</a>
				<div class="clearfix"></div>
			</div>
		</div>
		
		<div  style="margin-left: 200px">
			<img src="/alpha/image/sub.png"/>
		
		</div>
	</div>
	
	<div id="intro-content">
		<h1>Conclusion</h1>
		<div>
			<p>
				素拓分数低，参加项目数往往也少<br/>
				参加项目多的人，素拓分数都不低<br/>
				参加项目多，并不是高素拓的充要条件<br/>
			</p>
		</div>
	</div>
</body>
</html>
