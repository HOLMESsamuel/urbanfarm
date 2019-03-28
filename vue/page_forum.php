<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/styleforum.css"/>
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
				<div id="gcheader1">
					<h1>Aide et Support</h1>
				</div>
				<div id="gctextin">
					<input type="text"value="Entrez question ici..." 
					onfocus="if(value=='Entrez question ici...'){value=''}"
					onblur="if(value=''){value='Entrez question ici...'}"/>
				</div>
				<div id="gcsearch">
					<a href="">
				</div>	

	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>