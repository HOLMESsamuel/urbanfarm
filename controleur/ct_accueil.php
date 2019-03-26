<?php
include("../modele/connexion.php");

if(isset($_POST['valider'])){
	$mail = htmlspecialchars($_POST['mail']);
	$mdp = sha1($_POST['mdp']);

	if(empty($_POST['mail']) OR empty($_POST['mdp'])){
		$erreur = "certains champs ne sont pas remplis";
	} else {
		$req = $bdd->prepare("SELECT * FROM utilisateur WHERE email=? AND motdepasse=?");
		$req->execute(array($mail,$mdp));
		$exist = $req->rowCount();
		if($exist == 1){
			header('Location: page_profil.php');
		} else {
			$erreur = "Le mail ou le mot de passe est incorect";
		}
	}
}

?>