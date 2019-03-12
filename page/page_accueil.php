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
				
			<div id="img_slider">
			<input type="radio" name="images" id="i1" checked>
			<input type="radio" name="images" id="i2">
			<input type="radio" name="images" id="i3">
			<input type="radio" name="images" id="i4">
			<div class="image" id="one">
				<img src="img/ferme_1.jpg">
				<label for="i3" class="precedent">&lt;</label>
				<label for="i2" class="suivant">&gt;</label>
			</div>
			<div class="image" id="two">
				<img src="img/ferme_2.jpg">
				<label for="i1" class="precedent">&lt;</label>
				<label for="i3" class="suivant">&gt;</label>
			</div>
			<div class="image" id="three">
				<img src="img/ferme_3.jpg">
				<label for="i2" class="precedent">&lt;</label>
				<label for="i4" class="suivant">&gt;</label>
			</div>
			<div class="image" id="four">
				<img src="img/ferme_4.jpg">
				<label for="i3" class="precedent">&lt;</label>
				<label for="i1" class="suivant">&gt;</label>
			</div>
		</div>

	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>