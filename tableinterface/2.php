<html>
<head>
	<title>
		Table interface
	</title>
	<meta http-equiv="refresh" content="3" />
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css"><!-- Angular does some things with CSS so it's good to load this in the head -->
	<link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap-timepicker.min.css" type="text/css"/>
	<style>
		body{
			background: pink;
			font-family: helvetica;
		}
		#america{
			height: 620px;
			width: 620px;
			top: 20px;
			left: 0px;
			position: fixed;
		}
		.dome-img{
			position: absolute;
		    z-index: -1;
		    width: 100%;
		    top: 0;
		    left: 0;
		}
		#africa{
			height: 420px;
			top: 20px;
			right: 200px;
			position: fixed;
		}
		#asia{
			height: 420px;
			bottom: 0px;
			right: 0px;
			position: fixed;
		}
		#aqua{
			width: 300px;
			bottom: 0px;
			left: 400px;
			position: fixed;
		}
		#feeding1{
			padding: 3px;
			background: rgba(0,0,255,0.1);
			border-radius: 90;
			-webkit-animation: anmtn-feed 3s infinite;
			top: 650px;
			right: 300px;
			position: fixed;
			z-index: 9999;
		}
		
		.feed-dot{
			width: 20px;
			height: 20px;
			background: blue;
			border-radius: 90;
		}
		
		.feed-surround-dot{
			padding: 3px;
			background: rgba(0,0,255,0.1);
			border-radius: 90;
			-webkit-animation: anmtn-feed 3s infinite;
		}
		
		.title{
			position: absolute;
			margin-left: -20px;
			margin-top: -20px;
			opacity: 0.6;
		}
		
		@-webkit-keyframes anmtn-feed /* Safari and Chrome */
		{
		0% {background: rgba(0,0,255,0.1);}
		50% {background: rgba(0,0,255,0.5);}
		100% {background: rgba(0,0,255,0.1);}
		}
		
		.title-thingy{
			z-index: 999;
			width: 400px;
			position: fixed;
		}
		.lilledreng{
			right: 0;
			position: fixed;
			bottom: 0;
			width: 200px;
		}	
		.americaTitle{
			color: yellow;
			position: fixed;
			right: 190px;
			font-size: 30pt;
			text-transform: uppercase;
			font-weight: bold;
		}
	</style>
</head>
<body>
	
		
<!--	<div id="feeding1"><div class="feed-dot"><span class="title">Søkoen!</span></div></div>-->
	<div id="america">
		<img src="southamerica.png" class="dome-img" alt="" />
<!--		<div id="test-feed" style="position: absolute; top: 160; left: 390; color: white;" class="feed-surround-dot"><div class="feed-dot"><span class="title">Test!</span></div></div>-->
	</div>
	<img src="africa.png" id="africa" alt="" />
	<img src="asia.png" id="asia" alt="" />
	<!-- <img src="aqua.png" id="aqua" alt="" /> -->
<!--
	<img src="title-thingy.png" class="title-thingy" alt="" />
	<img src="lilledreng.png" class="lilledreng" alt="" />
	<span class="americaTitle">Sydamerica</span>
-->
	</body>
</html>