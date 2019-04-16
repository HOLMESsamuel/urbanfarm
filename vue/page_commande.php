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
				<?php include("../modele/requeteInstallation.php"); ?>
    		</div>

		    <div id="col2">
				<?php $nbCapteur = recupereCapteur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbCapteur; $i++): ?>
					<div class="capteur">
						<?php echo recupereInfoCapteur($bdd, $_SESSION['mail'], "type", $i); ?>
						<p>Etat : <?php echo recupereInfoCapteur($bdd, $_SESSION['mail'], "etat", $i); ?></p>
					</div>
				<?php endfor ?>
	    	</div>

			<div id="col3">
				<?php $nbAct = recupereActionneur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbAct; $i++): ?>
					<div class="capteur">
						<?php echo recupereInfoActionneur($bdd, $_SESSION['mail'], "type", $i); ?>
						<p>Etat : <?php echo recupereInfoActionneur($bdd, $_SESSION['mail'], "etat", $i); ?></p>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>