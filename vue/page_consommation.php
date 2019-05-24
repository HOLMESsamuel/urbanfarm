<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_consommation.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<script>
		
		$(document).ready(function(){
			$("#combobox").change(function(){
				$.post('controleur/ct_consommation.php', //envoie par post au fichier controleur
							{
								capteur : $("#combobox").val(),	
							},
							function(data){ //recupere ce qui envoye par le code php
								var longueur = data.length;
								for(var i=0; i<longueur; i++){
									data[i] = data[i].split("-");
								}
								graphe(data, longueur);
							},
							"json" 
				);
				
			});
			
			function  graphe(tab, longueur){
				var ctx = document.getElementById('myChart').getContext('2d');
				
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'line',

					// The data for our dataset
					data: {
						labels: [tab[0][0], '2', '3', '4', '5', '6', '7', '8', '9', '10'],
						datasets: [{
							label: 'My First dataset',
							backgroundColor: 'rgb(255, 229, 153)',
							borderColor: 'rgb(182, 215, 168)',
							data: [tab[0][1], 10, 5, 2, 20, 30, 45]
						}]
					},

					// Configuration options go here
					options: {}
				});
				}
			setInterval(function(){
				$.post('controleur/ct_trame.php', //envoie par post au fichier controleur
							{
								
							},
							function(data){ //recupere ce qui envoye par le code php
			
							},
							"text" //a mettre pour pouvoir recuperer du texte
				);}
			, 10000);
		});

		
		</script>
		
		
	</head>

	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

			<?php 
				include("modele/connexion.php"); 
				include("modele/requeteCapteur.php"); 
				include("modele/requeteInstallation.php");
			
     			$requete = $bdd->prepare( "SELECT * FROM capteur INNER JOIN installation ON capteur.n°installation = installation.n°installation WHERE email=?");
				$requete->execute(array($_SESSION["mail"]));
				$results = new ArrayObject(array());
				$valeur = "";
				while ( $res =  $requete->fetch() )
				{
					 $results->append($res[1]."-".recupereInfoInstallation($bdd, "nom", $res['n°installation'])."-".$res['n°capteur']);
				}
			?>
			<select name="the_name" id="combobox">
     			<?php foreach ( $results as $option ) :
					echo "<option>".$option."</option>";
     			endforeach; ?>
			</select>
			<div id="chartContainer">			
				<canvas id="myChart"></canvas>
	    	</div>
			</div>
			
		</div>
	</body>
	<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="vue/script/script_consommation.js"></script>
	

	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>