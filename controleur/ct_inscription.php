<?php
session_start();

include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");

$prenom = htmlspecialchars($_POST['prenom']); //pour rendre impossible la saisie de code
$nom = htmlspecialchars($_POST['nom']);
$adresse = htmlspecialchars($_POST['adresse']);
$mail = htmlspecialchars($_POST['mail']);
$confmail = htmlspecialchars($_POST['confmail']);
$mdp = sha1($_POST['mdp']);//sha1 est une metode de cryptage pour ne pas stocker le mdp tel quel
$confmdp = sha1($_POST['confmdp']);
$cgu = $_POST['cgu'];
if($_POST['civilite'] == "true"){
	$civilite = "M";
} else {
	$civilite ="Mme";
}


if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['adresse']) AND !empty($_POST['mail']) AND !empty($_POST['confmail']) AND !empty($_POST['mdp']) AND !empty($_POST['confmdp'])){
	if($cgu == "false"){
		echo "Vous devez accepter les conditions generales d'utilisation";
	} elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
		echo "le mail n'est pas valide";	
	} elseif(mailDejaPris($bdd, $mail)){
		echo "Ce mail est déjà utilisé";
	} elseif ($mail != $confmail) {
		echo "Votre mail de confirmation n'est pas le même";
	} elseif($mdp != $confmdp){
		echo "Les mots de passe ne correspondent pas";
	} else {
		try {
			ajoutUtilisateur($bdd, $mail, $nom, $prenom, $civilite, $adresse, $mdp);
			for($i=1; $i<10; $i++){
				if(isset($_POST['titre'.$i])){
					$titre = htmlspecialchars($_POST['titre'.$i]);
					$type = htmlspecialchars($_POST['type'.$i]);
					$adresse = htmlspecialchars($_POST['adresse'.$i]);
					ajoutInstallation($bdd, $titre, $type, $adresse, $mail);
					$derniereInstallation = derniereInstallation($bdd);
					if($_POST['temperature'.$i] == "true"){
						ajoutCapteur($bdd, 'temperature', 'on', $derniereInstallation);
					}
					if($_POST['lumiere'.$i] == "true"){
						ajoutCapteur($bdd, 'lumiere', 'on', $derniereInstallation);
					}
					if($_POST['mouvement'.$i] == "true"){
						ajoutCapteur($bdd, 'mouvement', 'on', $derniereInstallation);
					}
					if($_POST['moteur'.$i] == "true"){
						ajoutActionneur($bdd, 'moteur', 'off', $derniereInstallation);
					}
					if($_POST['lampe'.$i] == "true"){
						ajoutActionneur($bdd, 'lampe', 'off', $derniereInstallation);
					}
					if($_POST['ventilateur'.$i] == "true"){
						ajoutActionneur($bdd, 'ventilateur', 'off', $derniereInstallation);
					}
					$_SESSION['mail'] = $mail;
					$_SESSION['prenom'] = $prenom;
					echo "ok";
				}
			}

		} catch (Exception $e) {
			echo $e;
		}
	}
} else {
	echo "tous les champs doivent être remplis";
}
?>