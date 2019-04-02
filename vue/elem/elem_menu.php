<?php session_start(); ?>
<?php if (basename($_SERVER['PHP_SELF'])== 'page_accueil.php' || !isset($_SESSION['mail'])): ?>
<?php include("../controleur/ct_accueil.php"); ?>
<div id ="nav">
<form method="post" action="">
	<p>
		<input type="text" name="mail" placeholder="E-mail"/>
		<br/>
		<input type="password"  name="mdp" placeholder="Mot de passe"/>
		<br/>
		<input name="valider" class="entree" type="submit" value="Valider"/>
	</p>
	<?php
	if(isset($erreur)){
		echo $erreur;
	}  
	?>
</form>
<br/>
<form action="page_inscription.php">
	<input type="submit" class="entree" value="Nouvel Utilisateur">
</form>
</div>

<?php elseif (isset($_SESSION['mail']) && basename($_SERVER['PHP_SELF'])== 'page_profil.php'): ?>
<div id ="menu">
	<a href="page_profil.php" class="bouton">Profil</a>
	<a href="page_commande.php" class="bouton">Commande</a>
	<a href="page_consommation.php" class="bouton">Consommation</a>
	<a href="page_accueil.php" class="bouton">Deconnexion</a>

</div>

<?php elseif (isset($_SESSION['mail']) && basename($_SERVER['PHP_SELF'])== 'page_admin.php'): ?>
<div id ="menu">
	<a href="page_profil.php" class="bouton">jhsbdvlqjedv</a>
	<a href="page_commande.php" class="bouton">Commande</a>
	<a href="page_consommation.php" class="bouton">Consommation</a>
	<a href="page_accueil.php" class="bouton">Deconnexion</a>

</div>
<?php endif ?>