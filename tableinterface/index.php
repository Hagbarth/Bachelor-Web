<html>
<head>
	<title>
		Table interface
	</title>
	<style>
		body{
			background: #000;
			font-family: helvetica;
		}
		#america{
			height: 640px;
			width: 640px;
			top: 60px;
			right: 0px;
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
			height: 400px;
			top: 60px;
			left: 270px;
			position: fixed;
		}
		#asia{
			height: 400px;
			top: 300px;
			left: 0px;
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
	<button class="btn btn-primary" id="hour-inc-btn">+</button>
	<input type="text" id="hour">
	<button class="btn btn-warning" id="hour-dec-btn">-</button>
<!--	<div id="feeding1"><div class="feed-dot"><span class="title">Søkoen!</span></div></div>-->
	<div id="america">
		<img src="southamerica.png" class="dome-img" alt="" />
<!--		<div id="test-feed" style="position: absolute; top: 160; left: 390; color: white;" class="feed-surround-dot"><div class="feed-dot"><span class="title">Test!</span></div></div>-->
	</div>
	<img src="africa.png" id="africa" alt="" />
	<img src="asia.png" id="asia" alt="" />
	<img src="aqua.png" id="aqua" alt="" />
	<img src="title-thingy.png" class="title-thingy" alt="" />
	<img src="lilledreng.png" class="lilledreng" alt="" />
	<span class="americaTitle">Sydamerica</span>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://momentjs.com/downloads/moment-with-langs.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(function(){	
			var hourInput = $("#hour");
			hourInput.val(moment().format("HH"));
			$("#hour-inc-btn").click(function(){
				updateTime(hourInput.val(parseInt(hourInput.val()) + 1).val());
			});
			$("#hour-dec-btn").click(function(){
				updateTime(hourInput.val(parseInt(hourInput.val()) - 1).val());
			});
			
			var updateTime = function(hour){
				var	pt = moment().format("HH"),
					diff = hour - pt;
				updateFeedings(moment().add("h", diff));
			}
		
			var now = moment().format("YYYY-MM-DD HH:mm:ss"),
			updateFeedings = function(time) {
				if (time) now = time.format("YYYY-MM-DD HH:mm:ss");
				else now = moment().format("YYYY-MM-DD HH:mm:ss");
				$.ajax({
					url: '../backend/?path=feedings/atTime/' + now.replace(" ", "%20"),
					type: 'GET',
					dataType: "jsonp",
					jsonpCallback: "feedingsCallback"
				});	
			}
			//updateInterval = setInterval(updateFeedings,3000);
			updateFeedings();
			
			
		});
		
		function feedingsCallback(json) {
			if (json.error) {
				alert(json.error);
			} else {
				var feedings = json.feedings;
				$(".feed-surround-dot").remove();
				$.each(feedings, function(index, feeding){
					var areaID;
					switch (feeding.place.areaID) {
						case 1 :
							areaID = "america";
							break;					
					}
					console.log(feeding);
					if (areaID) addFeedingToArea(feeding, areaID);
				});
			}	
		}
		
		function addFeedingToArea(feeding, area) {
			console.log(feeding);
			console.log(area);
			var domArea = $("#" + area);
			var place = feeding.place;
			domArea.append('<div id="feeding-'+feeding.id+'" style="position: absolute; top: '+place.y+'; left: '+place.x+'; color: white;" class="feed-surround-dot"><div class="feed-dot"><span class="title">'+feeding.animal.name+'</span></div></div>');
		}
		
		
	</script>
</body>
</html>