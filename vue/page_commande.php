<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel="stylesheet" href="style/style.css"/>
		<link rel = "stylesheet" href = "style/style_commande.css"/>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
	</header>
	<body>	
	
	<body>
		<div class="container">
	    	<div id="col1">
				<?php include("elem/elem_menu.php"); ?>
				<?php include("../modele/connexion.php"); ?>
				<?php include("../modele/requeteUtilisateur.php"); ?>
    		</div>

		    <div id="col2">
				<?php $nbCapteur = recupereCapteur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbCapteur; $i++): ?>
					<div class="capteur">
						capteur
					</div>
				<?php endfor ?>
				
			
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>