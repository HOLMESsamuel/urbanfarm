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
				<div class="galleryContainer">
					<div class="slideShowContainer">
						<div id="playPause" onclick="playPauseSlides()"></div>
						<div onclick="plusSlides(-1)" class="nextPrevBtn leftArrow"><span class="arrow arrowLeft"></span></div>
						<div onclick="plusSlides(1)" class="nextPrevBtn rightArrow"><span class="arrow arrowRight"></span></div>
						<div class="captionTextHolder">
							<p class="captionText slideTextFromTop"></p>
						</div>
						<div class="imageHolder">
							<img src="img/f1.jpg">
							<p class="captionText">Construisez votre propre ferme sans efforts !</p>
						</div>
						<div class="imageHolder">
							<img src="img/f2.jpg">
							<p class="captionText">Automatisez l'entretien d'une serre !</p>
						</div>
						<div class="imageHolder">
							<img src="img/f3.jpg">
							<p class="captionText">Goutez au bonheur de la compagnie des poules !</p>
						</div>
						<div class="imageHolder">
							<img src="img/f4.jpg">
							<p class="captionText">Automatisez tout un poulailler</p>
						</div>
					</div>
					<div id="dotsContainer"></div>
				</div>
						<script src="script/scriptCarousel.js"></script>
						<br><br>
						<h2>Dernières actualités</h2>
					</div>
						
					</div>
				</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>