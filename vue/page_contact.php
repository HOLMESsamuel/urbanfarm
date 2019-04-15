<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_contact.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){ //attend que tout le reste soit chargé
			$("#envoiMessage").click(function(e){
				e.preventDefault(); //empeche de recharger la page
				$.post('../controleur/ct_contact.php', //envoie par post
					{
						mail : $("#mail").val(),
						titre : $("#titre").val(),
						texte : $("#text").val()
					},
					function(data){ //recupere ce qui envoye par le code php
						if(data != 'ok'){
							$("#erreur").html(data);
						} else {
							document.location.href="page_accueil.php";
						}
						}
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
		<div class="container">
	    <div id="col1">
			  <?php include("elem/elem_menu.php"); ?>
			</div>
		  <div id="col2">
				<h2> Nous contacter </h2>

				<h4> Vous avez des questions sur Urban Farm ? </h4>
				<p> Consultez la rubrique 
					<a href="page_questions"> Questions fréquentes </a>.
				</p>

				<h4> Contactez nous directement </h4>
				<p>
					UrbanFarm s'engage à répondre à toutes vos questions dans les plus brefs délais. <br>
					Pour cela, remplissez le formulaire ci-dessous.
				</p>
				<br>
				<form></form>
					<input type="mail" placeholder="Adresse mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>	
					<br>
					<input type="titre" placeholder="Titre du message" id="titre" name="titre" value="<?php if(isset($itre)) {echo $titre;}?>"/>
					<br>
					<textarea  id="text" placeholder="Ecrivez votre message ici ..."></textarea>
					<br>
					<input type="submit"  id="envoiMessage" name="envoi" value="Envoyer"/>
				</form>
				<p id="erreur"></p>
			</div>

			<div id="col3">
				<h3> Où nous retrouver ? </h3>
				<a href="https://fr.wikipedia.org/wiki/Wikip%C3%A9dia:Accueil_principal" onclick="window.open(this.href); return false;"><img src="img\facebook-logo.png" width=40 class="logo" ></a>
				<br>
				<a href=""><img src="img\instagram_logo.png" width=40 class="logo" ></a>
				<br>
				<a href=""><img src="img\linkedin.png" width=55 class="logo" ></a>
				<br>
				<a href=""><img src="img\twitter_logo.png" width=75 class="logo" ></a>

			</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>