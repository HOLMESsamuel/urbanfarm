<?php
include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");

$mail = htmlspecialchars($_POST['mail']);
$mdp = sha1($_POST['mdp']);

if(empty($_POST['mail']) OR empty($_POST['mdp'])){
	echo "certains champs ne sont pas remplis";
} else {
	if(estInscrit($bdd, $mail, $mdp)){
		session_start();
		$_SESSION['mail'] = $mail;
		if(estAdmin($bdd, $mail)){
			echo "admin";
		} else {
			echo "client";
		}
		
	} else {
		echo "Le mail ou le mot de passe est incorect";
	}
}

?>