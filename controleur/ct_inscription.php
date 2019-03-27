<?php
include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");


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
				ajoutUtilisateur($bdd, $mail, $nom, $prenom, $civilite, $adresse, $mdp);
				for($i=1; $i<10; $i++){
					if(isset($_POST['titre'.$i])){
						$titre = htmlspecialchars($_POST['titre'.$i]);
						$type = htmlspecialchars($_POST['liste'.$i]);
						$adresse = htmlspecialchars($_POST['adresse'.$i]);
						ajoutInstallation($bdd, $titre, $type, $adresse, $mail);
						$derniereInstallation = derniereInstallation($bdd);
						if(isset($_POST['temperature'.$i])){
							ajoutCapteur($bdd, 'temperature', 'on', $derniereInstallation);
						}
						if(isset($_POST['lumiere'.$i])){
							ajoutCapteur($bdd, 'lumiere', 'on', $derniereInstallation);
						}
						if(isset($_POST['mouvement'.$i])){
							ajoutCapteur($bdd, 'mouvement', 'on', $derniereInstallation);
						}
					}
				}
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