<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_actualite.css"/>
		<link rel = "stylesheet" href = "style/style_admin_actu.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){ //attend que tout le reste soit chargé
				$("#btnSearch").click(function(e){
					e.preventDefault(); //empeche de recherarger la page
					$.post('../controleur/ct_actualiteSearch.php', //envoie par post au fichier controleur
						{
							id : $("#id").val()
						},
						function(data){ //recupere ce qui envoye par le code php
							$("#rep").html(data);
						},
						"text" //a mettre pour pouvoir recuperer du texte
					);
				});
			});
		</script> 

	</head>
	<header>
		<?php include("../controleur/ct_actualite.php"); ?>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2"> 
				<h2>Ecrire un nouvel article</h2>
				<input type="titre" placeholder="Titre de l'article" id="titre" name="titre" value="<?php if(isset($itre)) {echo $titre;}?>"/>
				<br>
				<textarea  id="text" placeholder="Rédigez votre article ..."></textarea>
				<br>
				<input type="submit" id="ajoutImage" name="ajoutImage" value="Ajouter une image">
				<input type="submit" id="ajoutArticle" name="ajoutArticle" value="Publier">
	    	</div>
			<div id="col3">
				<h3> Les dernières Actualités </h3>
				<div id="article">
					<?php recupereTitre($bdd);	?>
				</div>
			</div> 
		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>