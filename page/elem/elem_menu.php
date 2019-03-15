
<?php if (basename($_SERVER['PHP_SELF'])== 'page_accueil.php'): ?>
<?php
try {
	$bdd = new PDO('mysql:host=localhost;dbname=urbanfarm;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}

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
<div id ="nav">
<form method="post" action="">
	<p>
		<input type="text" name="mail" placeholder="E-mail"/>
		<br/>
		<input type="password" name="mdp" placeholder="Mot de passe"/>
		<br/>
		<input name="valider" type="submit" value="Valider"/>
	</p>
	<?php
	if(isset($erreur)){
		echo $erreur;
	}  
	?>
</form>
<br/>
<form action="page_inscription.php">
	<input type="submit" value="Nouvel Utilisateur">
</form>
</div>

<?php elseif (basename($_SERVER['PHP_SELF']) != 'page_inscription.php'): ?>

<div id ="menu">
<form method="post" action="page_profil.php">
	<p>
		<input type="submit" value="Profil"/>
		<br/>
	</p>
</form>
<br/>
<form method="post" action="page_commande.php">
	<p>
		<input type="submit" value="Commande"/>
		<br/>
	</p>
</form>
<br/>
<form method="post" action="page_consomation.php">
	<p>
		<input type="submit" value="Consommation"/>
		<br/>
	</p>
</form>
<br/>
<form method="post" action="page_accueil.php">
	<p>
		<input type="submit" value="Accueil"/>
		<br/>
	</p>
</form>
<br/>
</div>

<?php endif ?>