<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_contact.css"/>
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
				<form method="post" action="formulaire"></form>
					<input type="mail" placeholder="Adresse mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>	
					<input type="titre" placeholder="Titre du message" id="titre" name="titre" value="<?php if(isset($itre)) {echo $titre;}?>"/>
					<br>
					<textarea id="text" name="text" rows="10" cols="100" placeholder="Ecrivez votre message ici ...">  </textarea>	
					<br>
					<input type="submit"  id="envoiMessage" name="envoi" value="Envoyer"/>
				</form>
			</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>