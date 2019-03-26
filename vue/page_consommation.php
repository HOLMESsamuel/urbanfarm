<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_consomation.css"/>
		<script>
		window.onload = function () {

		//Better to construct options first and then pass it as a parameter
		var options = {
			title: {
				text: "Spline Chart with Export as Image"
			},
			animationEnabled: true,
			exportEnabled: true,
			data: [
			{
				type: "spline", //change it to line, area, column, pie, etc
				dataPoints: [
					{ x: 10, y: 10 },
					{ x: 20, y: 12 },
					{ x: 30, y: 8 },
					{ x: 40, y: 14 },
					{ x: 50, y: 6 },
					{ x: 60, y: 24 },
					{ x: 70, y: -4 },
					{ x: 80, y: 10 }
				]
			}
			]
		};
		$("#chartContainer").CanvasJSChart(options);

		}
		</script>
	</head>

	<header>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				
				<div id="chartContainer"></div>
			
	    	</div>
		</div>
		<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
		<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>