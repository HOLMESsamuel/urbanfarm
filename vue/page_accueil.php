<?php 
session_start();
session_destroy(); ?>
<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_accueil.css"/>
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
				<div id="image_slider">
					
					<div id="slider">
						<figure>
						<img src="img/f1.jpg">
						<img src="img/f2.jpg">
						<img src="img/f3.jpg">
						<img src="img/f4.jpg">
						<img src="img/f1.jpg">
						</figure>
					</div>
				</div>
					<br><br>
					<h2>Dernières actualités</h2>
				</div>
					
				</div>
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>