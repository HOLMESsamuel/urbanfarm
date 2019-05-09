<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_actualite.css"/>
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
						$(document).ready();
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$(".titre").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('../controleur/ct_actualite.php', //envoie par post au fichier controleur
					{
						numArticle : this.id
					},
					function(data){ //recupere ce qui envoye par le code php
						$("#title").html(data.split("&&")[1]);
						$(".article").html(data.split("&&")[2]);
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
                -ms-grid-columns: 1fr 150fr 50fr ;
                grid-template-columns: 1fr 150fr 50fr;
                }
            </style>
        <?php endif ?>
	</header>	
	
	<body>
		<div class="container">
	    <div id="col1">
			  <?php include("elem/elem_menu.php"); ?>
			</div>
			<div id="col2">
				<h2 id="title"> 
					<?php afficheDernierTitre($bdd); ?>
				</h2>
				<div class="article">
					<?php afficheDernierArticle($bdd); ?>
				</div>

				<form id="from">
					Search : <input type="text" id="id" name="id"> 
					<button type="submit" id="btnSearch" name="Find" style="border: 0; background: transparent">
    				<img src="img/loupe.PNG" width="20" height="20" alt="submit" />
					</button>
					<!--<input type="submit" id="btnSearch" name="Find" value="O">-->
				</form>
				<div id="rep"></div>

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
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>