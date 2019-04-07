<?php 
session_start();
session_destroy(); ?>
<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_accueil.css"/>
		<?php include("../controleur/ct_actualite.php"); ?>
	</head>
	
	<header>
		<?php include("elem/elem_entete.php"); ?>
	</header>
	<?php include("elem/elem_menu.php"); ?>
	<body>
		<div id="description"> Urbanfarm en quelques mots ?
			<p>LA solution qu'il vous faut pour produire votre propre nourriture à votre echelle, tout est completement personnalisable et simple, laissez vous guider !</p>
		</div>
		<div class="container">
				<div id="col1">
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
						
					</div>
					<div id="col2">
						<h2>Dernières actualités</h2>
						<div id="actualité">
							<div id="titre"><?php afficheDernierTitre($bdd); ?></div>
							<div id="texte"><?php afficheDernierArticle($bdd); ?></div>
						</div>
					</div>
					<div id="col3">
						<h2>Nos best-sellers</h2>
						<div class="box_product">
							<!-- intitule du produit -->
							<h1>Lorem Ipsum</h1>
							<!-- numero de reference -->
							<h3 class="ref">ref 0000</h3>
							<!-- contenu descriptif du produit -->
							<div class="information">
								<!-- case representant la photo du produit -->
								<div class="photo">
								</div>
								<!-- description du produit -->
								<p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
									ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<!-- partie liee a l'achat -->
								<div class="achat">
									<!-- prix du produit -->
									<h2>00,00€</h2>
								</div>
							</div>
						</div>
					</div>
					<div id="col4">
						<h2>Une equipe surmotivée pour vous repondre !</h2>
						<div id="equipe">
							<div class="image-personnel" id="horticulteur">
								<img src="./img/horticulteur.jpg" width="200" height="200">
								<p class="cv"></p>
							</div>
							<div class="image-personnel" id="fermier">
								<img src="./img/fermier.jpg" width="200" height="200">
								<p class="cv"></p>
							</div>
							<div class="image-personnel" id="ingenieur">
								<img src="./img/ingenieur.png" width="200" height="200">
								<p class="cv"></p>
							</div>
							<div class="image-personnel" id="electronique">
								<img src="./img/electronique.jpg" width="200" height="200">
								<p class="cv"></p>
							</div>
						</div>
					</div>						
					</div>
				</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>