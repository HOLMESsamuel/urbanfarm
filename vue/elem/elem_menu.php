<?php if (basename($_SERVER['PHP_SELF'])== 'page_accueil.php' || !isset($_SESSION['mail'])): ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$("#confirmer").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('../controleur/ct_accueil.php', //envoie par post au fichier controleur
					{
						mail : $("#mail").val(),
						mdp : $("#mdp").val()
					},
					function(data){ //recupere ce qui envoye par le code php
						if(data != 'client' && data != 'admin'){
							$(".erreur").html(data);
						} else if (data == 'client'){
							document.location.href="vue/page_profil.php";
						} else {
							document.location.href="vue/page_admin_stat.php";
						}
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
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
	<form action="page_inscription.php">
		<input type="submit" class="entree" value="Nouvel Utilisateur">
	</form>
	</div>
	</h3>
	<script src="vue/script/script_connexion.js"></script>
</div>


<?php 
elseif (isset($_SESSION['mail']) && substr($_SESSION['mail'], -9)!= "@urban.fr"): ?>
<div id ="menu">
	<a href="vue/page_profil.php" class="bouton">Profil</a>
	<a href="vue/page_commande.php" class="bouton">Commande</a>
	<a href="vue/page_consommation.php" class="bouton">Consommation</a>

</div>

<?php elseif (isset($_SESSION['mail']) && substr($_SESSION['mail'], -9)== "@urban.fr" ): ?>
<div id ="menu">
	<a href="vue/page_admin_stat.php" class="bouton">Statistiques</a>
	<a href="vue/page_admin_message.php" class="bouton">Messages</a>
	<a href="vue/page_admin_gestionUtilisateurs.php" class="bouton">Gestion des inscriptions</a>

</div>
<?php endif ?>