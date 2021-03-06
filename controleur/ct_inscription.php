<?php
session_start();

include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");

function estComplexe(String $mdp): bool{
	$longueur = strlen($mdp);
	if($longueur<5){
		return false;
	} else {
		return true;
	}
}

$prenom = htmlspecialchars($_POST['prenom']); //pour rendre impossible la saisie de code
$nom = htmlspecialchars($_POST['nom']);
$adresse = htmlspecialchars($_POST['adresse']);
$mail = htmlspecialchars($_POST['mail']);
$confmail = htmlspecialchars($_POST['confmail']);
$mdp = htmlspecialchars($_POST['mdp']);//sha1 est une metode de cryptage pour ne pas stocker le mdp tel quel
$confmdp = htmlspecialchars($_POST['confmdp']);
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
	} elseif(!estComplexe($mdp)){
		echo "Le mot de passe doit contenir au moins 5 caractères dont une lettre majuscule et un chiffre";
	} else {
		try {
			$mdpCrypte = sha1($_POST['mdp']);
			ajoutUtilisateur($bdd, $mail, $nom, $prenom, $civilite, $adresse, $mdpCrypte);
			if ( substr($mail, -9) == '@urban.fr') {
				passageAdmin($bdd, $mail);
			}
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
				}
			}
			$header = "MIME-Version: 1.0\r\n";
			$header.='From:"urbanfarm.fr"<sam@urban.fr>'."\n";
			$header.='Content-Type:text/html; charset="utf-8"'."\n";
			$header.='Content-Transfer-Encoding: 8bit';

			$code =  recupereInfo($bdd, $mail, 'code_validation');
			$message='
			<html>
			<body>
			<div align="center">
			Merci de votre inscription, vous recevrez un mail quand votre compte sera prêt.
			<br>
			Pour accelerer cette démarche vous pouvez confirmer votre e-mail avec le code :'.$code.' en vous rendant dans la partie Se Connecter > Confirmer mail.
			<br>
			L\'équipe UrbanFarm
			<br>
			</div>
			</body>
			</html>
			';

			mail($mail, "inscription", $message, $header);
			
			echo "ok";

		} catch (Exception $e) {
			echo $e;
		}
	}
} else {
	echo "tous les champs doivent être remplis";
}
?>