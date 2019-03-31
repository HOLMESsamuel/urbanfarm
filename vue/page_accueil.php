<?php 
session_start();
session_destroy(); ?>
<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_accueil.css"/>
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
					<p> blablabla </p>
				<div id="img_slider">
					<input type="radio" name="images" id="i1" checked>
					<input type="radio" name="images" id="i2">
					<input type="radio" name="images" id="i3">
					<input type="radio" name="images" id="i4">
					<div class="image" id="one">
						<img src="img/f1.jpg">
						<label for="i4" class="precedent">&lt;</label>
						<label for="i2" class="suivant">&gt;</label>
						<label class="descriptif">Construisez votre propre ferme sans efforts !</label>
					</div>
					<div class="image" id="two">
						<img src="img/f2.jpg">
						<label for="i1" class="precedent">&lt;</label>
						<label for="i3" class="suivant">&gt;</label>
						<label class="descriptif">Automatisez l'entretien d'une serre !</label>
					</div>
					<div class="image" id="three">
						<img src="img/f3.jpg">
						<label for="i2" class="precedent">&lt;</label>
						<label for="i4" class="suivant">&gt;</label>
						<label class="descriptif">Goutez au bonheur de la compagnie des poules !</label>
					</div>
					<div class="image" id="four">
						<img src="img/f4.jpg">
						<label for="i3" class="precedent">&lt;</label>
						<label for="i1" class="suivant">&gt;</label>
						<label class="descriptif">Automatisez tout un poulailler </label>
					</div>
					<img src="img/f4.jpg" width="100%">
				</div>
					<h2>Dernières actualités</h2>
				</div>
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>