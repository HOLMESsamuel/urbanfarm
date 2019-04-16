<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_admin_stat.css"/>

	</head>
	<script>
		window.onload = function () {

var chart1 = new CanvasJS.Chart("chartC", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Nombre de messages par jour"
	},
	axisY: {
		title: "Nombres de messages"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Jour",
		dataPoints: [      
			{ y: 5, label: "08/04" },
			{ y: 6,  label: "09/04" },
			{ y: 5,  label: "10/04" },
			{ y: 5,  label: "11/04" },
			{ y: 4,  label: "12/04" },
			{ y: 3, label: "13/04" },
			{ y: 3,  label: "14/04" },
			{ y: 4,  label: "15/04" }
		]
	}]
});

		var chart2 = new CanvasJS.Chart("chartActu", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title:{
				text: "Nouvelles actualitées par jour"
			},
			axisY: {
				title: "Nombre d'actualitées"
			},
			data: [{        
				type: "column",  
				showInLegend: true, 
				legendMarkerColor: "grey",
				legendText: "Jour",
				dataPoints: [      
					{ y: 5, label: "08/04" },
					{ y: 3,  label: "09/04" },
					{ y: 6,  label: "10/04" },
					{ y: 6,  label: "11/04" },
					{ y: 4,  label: "12/04" },
					{ y: 3, label: "13/04" },
					{ y: 1,  label: "14/04" },
					{ y: 2,  label: "15/04" }
				]
			}]
		});
		chart1.render();
		chart2.render();

		}
	</script>

	<header>
		<?php include("elem/elem_entete.php"); ?>
		<?php include("../modele/connexion.php"); ?>
		<?php include("../modele/requeteUtilisateur.php"); ?>
	</header>	
	<input style="display: none;" id="mail"value="<?php echo $_SESSION['mail']; ?>">
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
					<span>Bienvenue </span>
					<?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?>
					<span><br>Il y a actuelment </span>
					<?php echo countUtilisateur($bdd); ?>
					<span> personnes inscrites (dont </span>
					<?php echo countAdmin($bdd); ?>
					<span>administrateurs)</span>
					
					<div id="chartC" style="height: 300px; width: 100%;"></div>
					<div id="chartActu" style="height: 300px; width: 100%;"></div>
					
	    	</div>
		</div>
	</body>

	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>