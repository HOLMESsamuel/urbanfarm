
<?php if (basename($_SERVER['PHP_SELF'])== 'page_accueil.php'): ?>

<div id ="nav">
<form method="post" action="page_commande.php">
	<p>
		<input type="text" name="pseudo" placeholder="Nom d'utilisateur"/>
		<br/>
		<input type="password" name="mot de passe" placeholder="mot de passe"/>
		<br/>
		<input type="submit" value="valider"/>
	</p>
</form>
<br/>
<form action="page_inscription.php">
	<input type="submit" value="Nouvel Utilisateur">
</form>
</div>

<?php else: ?>

<nav>
<ul>
	<li> <a href="page_profil.php">Profil</a> </li>
	<li> <a href="page_commande.php">Commande</a> </li>
	<li> <a href="page_consomation.php">Consommation</a> </li>
	<li> <a href="page_accueil.php">Déconnexion</a> </li>
</ul>
</nav>

<?php endif ?>