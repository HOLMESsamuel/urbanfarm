
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