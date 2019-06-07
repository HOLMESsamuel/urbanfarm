<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_contact.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$("#envoiMessage").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_contact.php', //envoie par post
					{
						mail : $("#email").val(),
						titre : $("#titre").val(),
						texte : $("#text").val()
					},
					function(data){ //recupere ce qui envoye par le code php
						if(data != 'ok'){
							$("#erreur").html(data);
						} else {
							document.location.href="index.php?page=contact";
						}
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
		});
		</script>
	</head>
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
		<?php 
        if(isset($_SESSION['mail'])): ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 3fr 1fr;
                grid-template-columns: 1fr 3fr 1fr;
            }
            </style>
        <?php else: ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 150fr 50fr;
                grid-template-columns: 1fr 150fr 50fr;
                }
            </style>
        <?php endif ?>
	</header>
    <input style="display: none;" id="email"value="<?php if (isset($_SESSION['mail'])): echo $_SESSION['mail']; endif ?>">

	<body>
		<div class="container">
	    <div id="col1">
			  <?php include("vue/elem/elem_menu.php"); ?>
			</div>
		  <div id="col2">
				<h2> Nous contacter </h2>

				<h4> Vous avez des questions sur Urban Farm ? </h4>
				<p> Consultez la rubrique 
					<a href="index.php?page=forum"> Questions fréquentes </a>.
				</p>

				<h4> Contactez nous directement </h4>
				<?php if (isset($_SESSION['mail'])): ?>
					<p>
						UrbanFarm s'engage à répondre à toutes vos questions dans les plus brefs délais. <br>
						Pour cela, remplissez le formulaire ci-dessous.
					</p>
					<br>
					<form>
						<input type="titre" placeholder="Titre du message" id="titre" name="titre" value="<?php if(isset($itre)) {echo $titre;}?>"/>
						<br>
						<textarea  id="text" placeholder="Ecrivez votre message ici ..."></textarea>
						<br>
						<input type="submit" id="envoiMessage" name="envoi" value="Envoyer"/>
					</form>

				<?php else: ?>
					<p>
						UrbanFarm s'engage à répondre à toutes vos questions dans les plus brefs délais. <br>
						Pour cela, merci de vous conecter.
					</p>

                <?php endif ?>
				<p id="erreur"></p>

			</div>

			<div id="col3">
				<h3> Où nous retrouver ? </h3>
				<a href="https://fr-fr.facebook.com/" onclick="window.open(this.href); return false;"><img src="vue/img/facebook-logo.png" width=40 class="logo" ></a>
				<br>
				<a href="https://www.instagram.com/?hl=fr" onclick="window.open(this.href); return false;"><img src="vue/img/instagram_logo.png" width=40 class="logo" ></a>
				<br>
				<a href="https://fr.linkedin.com/" onclick="window.open(this.href); return false;"><img src="vue/img/linkedin.png" width=55 class="logo" ></a>
				<br>
				<a href="https://twitter.com/" onclick="window.open(this.href); return false;"><img src="vue/img/twitter_logo.png" width=75 class="logo" ></a>

			</div>
		</div>
	</body>

	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>