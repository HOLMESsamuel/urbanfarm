<!DOCTYPE HTML>
<?php include("../controleur/ct_inscription.php"); ?>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_profil.css"/>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<form method="POST" action="">
			<div class="container">
				<div class="titre">
					<h1>Mon profil</h1>
					
				</div>
			<div id="col1">
				<div id ="nav">
					<form method="post" action="">
						<p>	
							<input type="text" name="mail" placeholder="E-mail"/>
		<br/>
		<input type="password"  name="mdp" placeholder="Mot de passe"/>
		<br/>
		<input name="valider" class="entree" type="submit" value="Valider"/>
	</p>
				
			</div>
			</form>
<br/>
<form action="page_inscription.php">
	<input type="submit" class="entree" value="Nouvel Utilisateur">
</form>
</div>
			<div id="col2">
					<h2>Vos informations personnelles</h2>
						
						<input type="button" value="prenom">
						<input type="button" value="nom">
						<input type="button" value="Domiciliation">
						<br>
						<div id=civilite>
							<p id="p1">
								<input type="button" value="civilité">
							</p>
						</div>
						<br>
						<input type="button" placeholder="mail" id="mail" name="mail" value="Votre mail"/>
						<input type="button" placeholder="confirmer le mail" id="confmail" name="confmail" value="Votre mot de Passe"/>
						<input type="submit" id="btnValider" name="inscription" value="suppression compte"/>
					
				</div>
				<div id="col3">
					<h2>Votre installation</h2>
					
						<div id=conteneur>
							
						</div>
						<input type="button" value="ajouter une installation" onclick="ajouterChamps();">
					
		

				</div>
		    
			</div>
		</form>
	</body>
	<script src="script/script_inscription.js"></script>
	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>
