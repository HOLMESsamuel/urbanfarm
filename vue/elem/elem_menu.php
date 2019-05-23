<?php if (basename($_SERVER['PHP_SELF'])== 'index.php?page=accueil' || !isset($_SESSION['mail'])): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$("#confirmer").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_accueil.php', //envoie par post au fichier controleur
					{
						mail : $("#mail").val(),
						mdp : $("#mdp").val()
					},
					function(data){ //recupere ce qui envoye par le code php
						if(data != 'client' && data != 'admin'){
							$(".erreur").html(data);
						} else if (data == 'client'){
							document.location.href="index.php?page=profil";
						} else {
							document.location.href="index.php?page=admin_stat";
						}
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$("#nouvelUtilisateur").click(function(e){
				e.preventDefault();
				document.location.href = "index.php?page=inscription";
			});
		});
</script>
<div id="nav">
	<h3 id="connexion" onclick="menuConnexion();">Se connecter
	<div id ="formulaire">
	<form>
		<p>
			<input type="text" id ="mail" name="mail" placeholder="E-mail"/>
			<br/>
			<input type="password" id="mdp" name="mdp" placeholder="Mot de passe"/>
			<br/>
			<input name="valider" id="confirmer" class="entree" type="submit" value="Valider"/>
		</p>
		<p class="erreur">
		</p>
	</form>
	<br/>
	<form  action="index.php?page=inscription" method="get">
		<input type="submit" id="nouvelUtilisateur" name="nouvelUtilisateur" class="entree" value="Nouvel Utilisateur">
	</form>
	</div>
	</h3>
	<script src="vue/script/script_connexion.js"></script>
</div>


<?php 
elseif (isset($_SESSION['mail']) && substr($_SESSION['mail'], -9)!= "@urban.fr"): ?>
<div id ="menu">
	<a href="index.php?page=profil" class="bouton">Profil</a>
	<a href="index.php?page=commande" class="bouton">Commande</a>
	<a href="index.php?page=consommation" class="bouton">Consommation</a>

</div>

<?php elseif (isset($_SESSION['mail']) && substr($_SESSION['mail'], -9)== "@urban.fr" ): ?>
<div id ="menu">
	<a href="index.php?page=admin_stat" class="bouton">Statistiques</a>
	<a href="index.php?page=admin_gestionUtilisateurs" class="bouton">Gestion des inscriptions</a>

</div>
<?php endif ?>