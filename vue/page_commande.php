<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel="stylesheet" href="vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_commande.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){ //attend que tout le reste soit chargé
				var capteurPattern = /^capteur(\d+)$/ //permet de recuperer le numero qui suit "capteur"
				var actionneurPattern = /^actionneur(\d+)$/
			$(".sliderBtnCapteur").click(function(e){
				$.post('controleur/ct_commande.php', //envoie par post
					{
						numero : parseInt(this.id.replace(capteurPattern, '$1')),
						etat : $(this).is(":checked"),
						mail : $("#mail").val(),
						type : "capteur"
					},
					function(data){ //recupere ce qui envoye par le code php
						
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$(".sliderBtnActionneur").click(function(e){
				$.post('controleur/ct_commande.php', //envoie par post
					{
						numero : parseInt(this.id.replace(actionneurPattern, '$1')),
						etat : $(this).is(":checked"),
						mail : $("#mail").val(),
						type : "actionneur"
					},
					function(data){ //recupere ce qui envoye par le code php
						console.log(data);
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
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
		<input style="display: none;" id="mail"value="<?php echo $_SESSION['mail']; ?>">
	</header>
	<body>	
	
	<body>
		<div class="container">
	    	<div id="col1">
				<?php include("vue/elem/elem_menu.php"); ?>
				<?php include("modele/connexion.php"); ?>
				<?php include("modele/requeteUtilisateur.php"); ?>
				<?php include("modele/requeteInstallation.php"); ?>
				<?php include("modele/requeteCapteur.php"); ?>
    		</div>

		    <div id="col2">
			<h3>Les capteurs </h3>
				<?php $nbCapteur = recupereCapteur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbCapteur; $i++): ?>
					<div class="capteur">
						<?php $numeroCapteur = recupereInfoCapteur($bdd, $_SESSION['mail'], "n°capteur", $i); ?>
						<?php $insta = recupereInfoCapteur($bdd, $_SESSION['mail'], "n°installation", $i); ?>
						<?php echo recupereNom($bdd, $insta); ?>
						<br>
						<?php echo recupereInfoCapteur($bdd, $_SESSION['mail'], "type", $i); ?>
						<?php $etat = recupereInfoCapteur($bdd, $_SESSION['mail'], "etat", $i); ?>
						<br>
						<label class="switch">
							<input class="sliderBtnCapteur" id="<?php echo 'capteur'.$i ?>" type="checkbox" <?php if($etat == "on"){ echo "checked";} ?>>
							<span class="slider round"></span>
						</label>
						<br>
						<?php
							echo derniereValeur($bdd, $numeroCapteur);
						?>
					</div>
				<?php endfor ?>
	    	</div>

			<div id="col3">
				<h3>Les actionneurs </h3>
				<?php $nbAct = recupereActionneur($bdd, $_SESSION['mail']); ?>
				<?php for($i=0; $i<$nbAct; $i++): ?>
					<div class="capteur">
						<?php $insta = recupereInfoActionneur($bdd, $_SESSION['mail'], "n°installation", $i); ?>
						<?php echo recupereNom($bdd, $insta); ?>
						<br>
						<?php echo recupereInfoActionneur($bdd, $_SESSION['mail'], "type", $i); ?>
						<?php $etat = recupereInfoActionneur($bdd, $_SESSION['mail'], "etat", $i); ?>
						<br>
						<label class="switch">
							<input class="sliderBtnActionneur" id="<?php echo 'actionneur'.$i ?>" type="checkbox" <?php if($etat == "on"){ echo "checked";} ?>>
							<span class="slider round"></span>
						</label>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</body>

	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>