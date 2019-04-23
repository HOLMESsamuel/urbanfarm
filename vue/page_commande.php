<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel="stylesheet" href="style/style.css"/>
		<link rel = "stylesheet" href = "style/style_commande.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){ //attend que tout le reste soit chargé
			$(".sliderBtn").click(function(e){
				$.post('../controleur/ct_commande.php', //envoie par post
					{
						id : $(this).attr('id'),
						etat : $(this).is(":checked")
					},
					function(data){ //recupere ce qui envoye par le code php
						console.log(data);
				
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
		});
		</script>
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
			<h3>Les capteurs </h3>
				<?php $nbCapteur = recupereCapteur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbCapteur; $i++): ?>
					<div class="capteur">
						<?php echo recupereInfoCapteur($bdd, $_SESSION['mail'], "type", $i); ?>
						<?php $etat = recupereInfoCapteur($bdd, $_SESSION['mail'], "etat", $i); ?>
						<p>Etat : <?php echo $etat ?></p>
						<label class="switch">
							<input class="sliderBtn" type="checkbox" <?php if($etat == "on"){ echo "checked";} ?>>
							<span class="slider round"></span>
						</label>
					</div>
				<?php endfor ?>
	    	</div>

			<div id="col3">
				<h3>Les actionneurs </h3>
				<?php $nbAct = recupereActionneur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbAct; $i++): ?>
					<div class="capteur">
						<?php echo recupereInfoActionneur($bdd, $_SESSION['mail'], "type", $i); ?>
						<?php $etat = recupereInfoActionneur($bdd, $_SESSION['mail'], "etat", $i); ?>
						<p>Etat : <?php echo $etat ?></p>
						<label class="switch">
							<input class="sliderBtn" id="<?php echo 'actionneur'.$i ?>" type="checkbox" <?php if($etat == "on"){ echo "checked";} ?>>
							<span class="slider round"></span>
						</label>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>