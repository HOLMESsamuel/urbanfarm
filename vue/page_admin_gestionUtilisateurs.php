<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_admin_gestionUtilisateurs.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$(".confirmation").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('../controleur/ct_gestion.php', //envoie par post
					{
						commande : "confirmation",
						mail : this.id //recupere les valueurs par id
					},
					function(data){ //recupere ce qui envoye par le code php
						document.location.href="page_admin_gestionUtilisateurs.php";
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$(".supression").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('../controleur/ct_gestion.php', //envoie par post
					{
						commande : "supression",
						mail : this.id 
					},
					function(data){ //recupere ce qui envoye par le code php
						document.location.href="page_admin_gestionUtilisateurs.php";
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
		});
		</script>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
		<?php include("../modele/connexion.php"); ?>
		<?php include("../modele/requeteUtilisateur.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				<?php $n=nonConfirme($bdd); ?>
				<?php if($n == 0): ?>
					<h3>Il n'y a pas de nouveaux utilisateurs</h3>
				<?php else: ?>
					<?php for($i=0; $i<$n; $i++): ?>
						<div class="nouvelUtilisateur" >
						<?php echo recupereInfoNonConfirme($bdd, "prenom", $i); ?>
						<?php echo recupereInfoNonConfirme($bdd, "nom", $i);?>
						<br>
						<?php echo recupereInfoNonConfirme($bdd, "email", $i); ?>
						<br>
						<?php echo nbInstallations($bdd, recupereInfoNonConfirme($bdd, "email", $i))?> Installations
						<br>
						<input type="button" class="confirmation" id="<?php echo recupereInfoNonConfirme($bdd, "email", $i); ?>" value="confirmer">
						<input type="button" class="supression" id="<?php echo recupereInfoNonConfirme($bdd, "email", $i); ?>" value="supprimer">
						<br>
						</div>
					<?php endfor ?>
				<?php endif ?>
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>