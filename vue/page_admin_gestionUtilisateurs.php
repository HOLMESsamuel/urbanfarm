<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_admin_message.css"/>

	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
		<?php include("../modele/connexion.php"); ?>
		<?php include("../modele/requeteUtilisateur.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				<?php $n=nonConfirme($bdd); ?>
				<?php for($i=0; $i<$n; $i++): ?>
					<div>
					<?php echo recupereInfoNonConfirme($bdd, "prenom", $i); ?>
					<?php echo recupereInfoNonConfirme($bdd, "nom", $i); ?>
					<?php echo recupereInfoNonConfirme($bdd, "email", $i); ?>
					<br>
					</div>
				<?php endfor ?>
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>