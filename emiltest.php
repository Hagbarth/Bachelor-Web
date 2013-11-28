<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Emils test page</title>
	<button onclick="addFeeding()">Add Feeding</button>
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript">
		function addFeeding() {
			$.ajax({
				url: 'backend/?path=feedings/delete',
				data:{
					animalID: 1,
					description: "hej",
					placeID: 1,
					time: "hej",
					type: "hej"
				},
				type: 'POST',
				success: function(data){
					console.log(data);				
				}
			});
		}
		
	</script>
</body>
</html>