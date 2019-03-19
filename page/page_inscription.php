<!DOCTYPE HTML>
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=urbanfarm;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}


if(isset($_POST['inscription'])) {

	$prenom = htmlspecialchars($_POST['prenom']); //pour rendre impossible la saisie de code
	$nom = htmlspecialchars($_POST['nom']);
	$civilite = $_POST['civilité'];
	$adresse = htmlspecialchars($_POST['adresse']);
	$mail = htmlspecialchars($_POST['mail']);
	$confmail = htmlspecialchars($_POST['confmail']);
	$mdp = sha1($_POST['mdp']);
	$confmdp = sha1($_POST['confmdp']);


	if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['mail']) AND !empty($_POST['mail']) AND !empty($_POST['confmail']) AND !empty($_POST['mdp']) AND !empty($_POST['confmdp'])){
		

		if(strlen($prenom) > 20){
			$erreur = "Le prenom doit être inférieur à 20 caractères";
		}
		elseif(strlen($nom) > 20){
			$erreur = "Le nom doit être inférieur à 20 caractères";
		}
		elseif(!($mail == $confmail)){
			$erreur="les mails ne sont pas les même";
		} 
	
		elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
			$erreur = "le mail n'est pas valide";	
		}
		
		elseif(!($mdp == $confmdp)){
			$erreur="les mot de passe ne sont pas les même";
		}
		else {
			try {
				$req = $bdd->prepare('INSERT INTO utilisateur(email, nom, prenom, civilité, adresse, motdepasse, propriétaire) VALUES (?,?,?,?,?,?,?)');
				$req->execute(array($mail,$nom,$prenom,$civilite,$adresse,$mdp,"oui"));
			} catch (Exception $e) {
				echo $e;
			}

			
			$erreur = "compte créé";
			
		}

	} else {
		$erreur = "Il faut tout compléter";
	}
}
?>
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
		<div class="container">
		<div id="col1">
				<h2>Vos informations personnelles</h2>
				<form method="POST" action="">	
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
				</form>
				<?php 
				if(isset($erreur)){
					echo $erreur;
				}
				?>
			
	    	</div>
	    	<div id="col2">
				<h2>Votre installation</h2>
				<form method="POST" action="">
					<div id=conteneur>
						<div id="champs1">
							<input type="text" id="input1" name="input1">
						</div>
					</div>
					<input type="button" value="ajouter une installation" onclick="ajouterChamps();">
				</form>
	

    		</div>
		    
		</div>
	</body>
	<script src="script/script_inscription.js"></script>
	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>