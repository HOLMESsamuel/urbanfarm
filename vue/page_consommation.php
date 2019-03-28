<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_consommation.css"/>

		<script>
		window.onload = function () {

		//Better to construct options first and then pass it as a parameter
		var options = {
			title: {
				text: "Données des capteurs",
				fontFamily:"Roboto Slab",
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
	
	<body onload="createComboBox(5);">
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				
			<div id="comboBox" >azerty</div>
			<div id="test">qsdfgyhjhfdfk</div>
			<div id="chartContainer">huhuhuhuhuhuhuhu</div>				
			
	    	</div>
		</div>
	</body>
	<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="script/script_consommation.js"></script>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>