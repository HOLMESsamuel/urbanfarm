<!DOCTYPE HTML>
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=urbanfarm;charset=utf8', 'root', '');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}



if(isset($_POST['inscription'])) {

	$prenom = htmlspecialchars($_POST['prenom']); //pour rendre impossible la saisie de code
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['mail']);
		$confmail = htmlspecialchars($_POST['confmail']);
		$mdp = sha1($_POST['mdp']);
		$confmdp = sha1($_POST['confmdp']);

	if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mail']) AND !empty($_POST['confmail']) AND !empty($_POST['mdp']) AND !empty($_POST['confmdp'])){
		

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
				$bdd->exec('INSERT INTO compte(email, prenom, mdp) VALUES ("'.$mail.'","'.$prenom.'","'.$mdp.'")');
			} catch (Exception $e) {
				echo $e;
			}
			
			$erreur = "compte créé";
			$test = $bdd->query('SELECT * FROM actionneur');
			$data = $test->fetch();
			echo $data['type'];
			
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
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				<h2>Inscription</h2>
				<form method="POST" action="">
					<label for="prenom">Prénom : </label>
					<input type="text" placeholder="prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>"/>
					</br>
					<label for="nom">Nom : </label>
					<input type="text" placeholder="nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>"/>
					</br>
					<label for="mail">Mail : </label>
					<input type="mail" placeholder="mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>
					</br>
					<label for="confmail">Confirmez le Mail : </label>
					<input type="mail"  id="confmail" name="confmail" value="<?php if(isset($confmail)) {echo $confmail;}?>"/>
					</br>
					<label for="password">Mot de passe : </label>
					<input type="password" placeholder="mot de passe" id="mdp" name="mdp"/>
					</br>
					<label for="confpassword">Confirmez le mot de passe : </label>
					<input type="password" id="confmdp" name="confmdp"/>
					</br>
					<input type="submit" name="inscription" value="Confirmer"/>
				</form>
				<?php 
				if(isset($erreur)){
					echo $erreur;
				}
				?>
			
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>