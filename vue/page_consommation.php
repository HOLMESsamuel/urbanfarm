<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_consommation.css"/>

		<script>
window.onload = function () {

var dps = [];
var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	title :{
		text: "Dynamic Spline Chart"
	},
	axisY: {
		includeZero: false
	},
	data: [{
		type: "spline",
		markerSize: 0,
		dataPoints: dps 
	}]
});

var xVal = 0;
var yVal = 100;
var updateInterval = 1000;
var dataLength = 10; // number of dataPoints visible at any point

var updateChart = function (count) {
	count = count || 1;
	// count is number of times loop runs to generate random dataPoints.
	for (var j = 0; j < count; j++) {	
		yVal = yVal + Math.round(5 + Math.random() *(-10));
		dps.push({
			x: xVal,
			y: yVal
		});
		xVal++;
	}
	if (dps.length > dataLength) {
		dps.shift();
	}
	chart.render();
};

updateChart(dataLength); 
setInterval(function(){ updateChart() }, updateInterval); 

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
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

			<?php 
				include("../modele/connexion.php"); 
				include("../modele/requeteCapteur.php"); 
			
     			$requete = "SELECT * FROM capteur";
				$query = $bdd->query($requete);
				$results = new ArrayObject(array());
     			while ( $res =  $query->fetch() );
     			$results->append($res['n°installation']);
     			$results->append($res['n°installation']);
			?>
			<select name="the_name">
     			<?php foreach ( $results as $option ) :
          			echo "<option>".$option['type']."</option>";
     			endforeach; ?>
			</select>

			
			<div id="chartContainer"></div>				
			
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