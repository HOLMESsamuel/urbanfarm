<?php
include("../modele/connexion.php");
include("../modele/requeteUtilisateur.php");

if(isset($_POST['valider'])){
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);

	if(empty($_POST['mail']) OR empty($_POST['mdp'])){
		$erreur = "certains champs ne sont pas remplis";
	} else {
		if(estInscrit($bdd, $mail, $mdp)){
			session_start();
			$_SESSION['mail'] = $mail;
			if(estAdmin($bdd, $mail)){
				header('Location: page_admin.php');
			} else {
				header('Location: page_profil.php');
			}
			
		} else {
			$erreur = "Le mail ou le mot de passe est incorect";
		}
	}
}

?>