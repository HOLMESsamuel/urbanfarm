<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_admin_stat.css"/>

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
					<span>Bienvenue </span>
					<?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?>

				<!-- 
				nb d'incrit actuel nd apache_child_terminate
				graph date message 
				graph date d'actu
				-->
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>