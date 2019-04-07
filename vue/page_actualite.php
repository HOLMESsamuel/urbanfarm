<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_actualite.css"/>
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
				<h2> 
					<?php afficheDernierTitre($bdd); ?>
				</h2>
				<div class="article">
					<?php afficheDernierArticle($bdd); ?>
				</div>
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