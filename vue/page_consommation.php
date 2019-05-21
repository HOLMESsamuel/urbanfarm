<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_consommation.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			setInterval(function(){
				$.post('../controleur/ct_trame.php', //envoie par post au fichier controleur
							{
								
							},
							function(data){ //recupere ce qui envoye par le code php
								console.log(data);
							},
							"text" //a mettre pour pouvoir recuperer du texte
				);}
			, 60000);
		});
		</script>
		<script>
window.onload = function () {

var dps = [];
var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	title :{
		text: "Données des 24 dernières heures"
	},
	axisX: {
		type: 'time'
	},
  	time: {
    	format: "HH:mm",
   	 	unit: 'hour',
	    unitStepSize: 1,
	    displayFormats: {
	      	'minute': 'HH:mm', 
	      	'hour': 'HH:mm', 
	      	min: '00:00',
	      	max: '23:59'
	    },
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

//var xVal = new Date().setHours(xVal.getHours() -24);
var today = new Date();
today.setHours(today.getHours() -24);
var xVal = new Date(today.getTime());
var yVal = 100;
var updateInterval = 3000; // temps avant mise a jour
var dataLength = 24; // number of dataPoints visible at any point

var updateChart = function (count) {
	count = count || 1;
	// count is number of times loop runs to generate random dataPoints.
	for (var j = 0; j < count; j++) {	
		
		yVal = yVal + Math.round(5 + Math.random() *(-10));
		dps.push({
			x: xVal,
			y: yVal
		});
		xVal = new Date(xVal.getTime());
		xVal.setHours(xVal.getHours() +1);
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
				while ( $res =  $query->fetch() )
				{
     				$results->append($res['type']." - ".$res['n°installation']);
				}
			?>
			<select name="the_name" id="combobox">
     			<?php foreach ( $results as $option ) :
					echo "<option>".$option."</option>";
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