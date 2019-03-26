<!DOCTYPE HTML>
<?php include("../controleur/ct_inscription.php"); ?>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_inscription.css"/>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<h1>Inscription</h1>
		<form method="POST" action="">
			<div class="container">
			<div id="col1">
					<h2>Vos informations personnelles</h2>
						
						<input type="text" placeholder="prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>"/>	
						<input type="text" placeholder="nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>"/>
						<input type="text" placeholder="Adresse" id="adresse" name="adresse" value="<?php if(isset($adresse)) {echo $adresse;}?>"/>
						<br>
						<div id=civilite>
							<p id="p1">
								<input type="radio" id="civilité1" name="civilité" value="M" checked/>
								<label for="civilité1">M</label>
							</p>
							<p id="p2">
								<input type="radio" id="civilité2" name="civilité" value="Mme"/>
								<label for="civilité2">Mme</label>
							</p>
						</div>
						<br>
						<input type="mail" placeholder="mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>
						<input type="mail" placeholder="confirmer le mail" id="confmail" name="confmail" value="<?php if(isset($confmail)) {echo $confmail;}?>"/>
						<input type="password" placeholder="mot de passe" id="mdp" name="mdp"/>
						<input type="password" placeholder="confirmer le mot de passe" id="confmdp" name="confmdp"/>
						<input type="submit" id="btnValider" name="inscription" value="Confirmer"/>
					<?php 
					if(isset($erreur)){
						echo $erreur;
					}
					?>
				
				</div>
				<div id="col2">
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