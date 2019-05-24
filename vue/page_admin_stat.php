<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_admin_stat.css"/>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<script>
		$(document).ready(function(){
			$.post('controleur/ct_stat.php', //envoie par post au fichier controleur
							{
		
							},
							function(data){ //recupere ce qui envoye par le code php
								graphe(data);
							},
							"json" 
			);
			function  graphe(tab){
				var ctx = document.getElementById('myChart').getContext('2d');
				var label = [];
				var data = [];
				var longueur = tab.length;
					for(var i = 0; i<longueur; i++){
						label.push(tab[i][1]);
						data.push(tab[i][0]);
					}
				
				var chart = new Chart(ctx, {
					// The type of chart we want to create
					type: 'line',

					// The data for our dataset
					data: {
						labels: label,
						datasets: [{
							label: 'Nombre de connexions par jour',
							backgroundColor: 'rgb(255, 229, 153)',
							borderColor: 'rgb(182, 215, 168)',
							data: data
						}]
					},

					// Configuration options go here
					options: {}
				});
				}
		});
	</script>

	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
		<?php include("modele/connexion.php"); ?>
		<?php include("modele/requeteUtilisateur.php"); ?>
	</header>	
	<input style="display: none;" id="mail"value="<?php echo $_SESSION['mail']; ?>">
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
					<span>Bienvenue </span>
					<?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?>
					<span><br>Il y a actuellement </span>
					<?php echo countUtilisateur($bdd); ?>
					<span> personnes inscrites (dont </span>
					<?php echo countAdmin($bdd); ?>
					<span>administrateurs)</span>
			<canvas id="myChart"></canvas>		
					
					
	    	</div>
		</div>
	</body>

	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<footer>
		<?php include("vue/elem/elem_admin_pied.php"); ?>
	</footer>
</html>