<?php
include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");

$mail = htmlspecialchars($_POST['mail']);
$mdp = sha1($_POST['mdp']);

if(empty($_POST['mail']) OR empty($_POST['mdp'])){
	echo "certains champs ne sont pas remplis";
} else {
	if(estInscrit($bdd, $mail, $mdp)){
		if(estConfirme($bdd, $mail)){
			session_start();
			$_SESSION['mail'] = $mail;
			if(estAdmin($bdd, $mail)){
				echo "admin";
			} else {
				echo "client";
			}
		} else {
			echo "votre compte n'est pas encore validé";
		}
		
		
	} else {
		echo "Le mail ou le mot de passe est incorect";
	}
}

?>