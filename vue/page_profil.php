<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_profil.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
				$(".sup").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_profil.php', //envoie par post
					{
						modif : "supinstal",
						installation : this.id
					},
					function(data){ //recupere ce qui est envoye par le code php
						document.location.href="index.php?page=profil";
					},
					"text" //a mettre pour pouvoir recuperer du texte
					);
				});
			
			$("#confirmer").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_profil.php', //envoie par post
					{
						modif : "installation",
						mail : $("#mail").val(),
						titre : $("#titre1").val(),
						adresse : $("#adresse1").val(),
						type : $("#liste1").val(),
						temperature : $("#temperature1").is(":checked"),
						lumiere : $("#lumiere1").is(":checked"),
						mouvement : $("#mouvement1").is(":checked"),
						moteur : $("#moteur1").is(":checked"),
						lampe : $("#lampe1").is(":checked"),
						ventilateur : $("#ventilateur1").is(":checked")
					},
					function(data){ //recupere ce qui est envoye par le code php
						document.location.href="index.php?page=profil";
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$("#confirmerProf").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_profil.php', //envoie par post
					{
						modif : "profil",
						mail : $("#mail").val(),
						prenom : $("#prenom").val(),
						nom : $("#nom").val(),
						adresse : $("#adresse").val()
						
					},
					function(data){ //recupere ce qui est envoye par le code php
						document.location.href="index.php?page=profil";
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			$("#supCompte").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_profil.php', //envoie par post
					{
						modif : "supProfil",
						mail : $("#mail").val()
					},
					function(data){ //recupere ce qui est envoye par le code php
						document.location.href="index.php?page=profil";
						alert("Une demande de suppression a été envoyée à un administrateur et sera traitée rapidement.");
					},
					"text" //a mettre pour pouvoir recuperer du texte
					);
				});
			$("#confirmerMdp").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_profil.php', //envoie par post
					{
						mail : $("#mail").val(),
						modif : "mdp",//transmet la nature du changement a effectuer au controlleur
						nouveauMdp : $("#nouveauMdp").val(),
						confNouveauMdp : $("#confNouveauMdp").val()
					},
					function(data){ //recupere ce qui est envoye par le code php
						if(data =="ok"){
							closeModalMdp();
						} else {
							$(".erreur").html(data);
						}
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
			setInterval(function(){
				$.post('controleur/ct_trame.php', //envoie par post au fichier controleur
							{
								
							},
							function(data){ //recupere ce qui envoye par le code php
								console.log(data);
							},
							"text" //a mettre pour pouvoir recuperer du texte
				);}
			, 10000);
		});
		</script>
	</head>
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
		<?php include("modele/connexion.php"); ?>
		<?php include("modele/requeteUtilisateur.php"); ?>
		<?php include("modele/requeteInstallation.php"); ?>
	</header>	
	<input style="display: none;" id="mail"value="<?php echo $_SESSION['mail']; ?>">
	<?php
		$prenom = recupereInfo($bdd, $_SESSION['mail'], 'prenom'); 
		$nom = recupereInfo($bdd, $_SESSION['mail'], 'nom');
		$adresse = recupereInfo($bdd, $_SESSION['mail'], 'adresse');
	?>
	<body>
		<div class="container">
			<div id="col1">
				<?php include("vue/elem/elem_menu.php"); ?>
			</div>
			<div id="col2">
				<div id="messageBienvenue">
					<span>Bienvenue </span>
					<?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?>
				</div>
				<div id="infoPerso">
					<h3>Vos informations personnelles</h3>
					<p>Mail : <?php echo $_SESSION['mail']; ?></p>
					<p>Prenom : <?php echo $prenom ?></p>
					<p>Nom : <?php echo $nom ?></p>
					<p>Adresse : <?php echo $adresse ?></p>
				</div>
					<input class="btnModif" type="button" onclick="modifProfil();" value="Modifier mes informations">
					<div class="modal" id="modalProfil">
						<div class="interieurModal">
							<span class="close" onclick="closeModalProfil();">&times;</span>
							<h3>Modifier vos informations personnelles</h3>
							<div id=conteneurProfil>
								<input type="text" id="prenom" placeholder="Prenom" value="<?php echo $prenom ?>">
								<input type="text" id="nom" placeholder="Nom" value="<?php echo $nom ?>">
								<input type="text" id="adresse" placeholder="Adresse" value="<?php echo $adresse ?>">
							</div>
							<input id="confirmerProf" value="Confirmer" type="button">
						</div>
					</div>
					<input class="btnModif" onclick="modifMdp();" type="button" value="Modifier mon mot de passe">
					<div class="modal" id="modalMdp">
						<div class="interieurModal">
							<h3>Changement de mot de passe</h3>
							<span class="close" onclick="closeModalMdp();">&times;</span>
							<div id=conteneurMdp>
								<!-- contient le formulaire ajouté par js-->
							</div>
							<input id="confirmerMdp" value="Confirmer" type="button">
							<div class="erreur"></div>
						</div>
					</div>
					<input class = "btnModif" id="supCompte" type="button" value="Supprimer mon compte">
				<br>
			</div>
				<div id="col3">
					<div id="installations">
						<?php if(nbInstallations($bdd, $_SESSION['mail']) == 0): ?>
							<h3>Vous n'avez pas encore d'installation</h3>
						<?php elseif (nbInstallations($bdd, $_SESSION['mail']) == 1): ?>
							<h3>Votre installation</h3>
							<div class="installation">
									<?php $numero = recupereInfoInstall($bdd, $_SESSION['mail'], "n°installation",0); ?>
									<?php echo recupereInfoInstall($bdd, $_SESSION['mail'], "nom",0); ?>
									<p>Capteurs : <?php recupereCapteurInstall($bdd, $numero); ?></p>
									<p>Actionneurs : <?php recupereActionneurInstall($bdd, $numero); ?></p>
									<p>Adresse : <?php echo recupereInfoInstall($bdd, $_SESSION['mail'], "adresse",0); ?></p>
									
						
									<input class="sup" type="button" value="Supprimer" id="<?php echo $numero; ?>">
							</div>
						<?php else :?>
							<h3>Vos installations</h3>
							<?php for($i=0; $i<nbInstallations($bdd, $_SESSION['mail']); $i++): ?>
								<div class="installation">
									<?php $numero = recupereInfoInstall($bdd, $_SESSION['mail'], "n°installation",$i); ?>
									<?php echo recupereInfoInstall($bdd, $_SESSION['mail'], "nom",$i); ?>
									<p>Capteurs : <?php recupereCapteurInstall($bdd, $numero); ?></p>
									<p>Actionneurs : <?php recupereActionneurInstall($bdd, $numero); ?></p>
									<p>Adresse : <?php echo recupereInfoInstall($bdd, $_SESSION['mail'], "adresse",$i); ?></p>
									
									<input class="sup" type="button" value="Supprimer" id="<?php echo $numero; ?>">
								</div>
							<?php endfor ?>
						<?php endif ?>
					</div>
					<br>
					<form>
					<div class="modal" id="modal">
						<div class="interieurGrandModal">
							<h3>Ajout d'une installation</h3>
							<div id=conteneur>
								<!-- contient le formulaire ajouté par js-->
							</div>
							<input id="confirmer" value="Confirmer" type="button">
							<div class="erreur"></div>
						</div>
			</div>
						<input type="button" value="ajouter une installation" onclick="conteneur.appendChild(creerChamps(1, 'profil'));">  
					</form>
				</div>
		</div>
		
	</body>
	<script src="vue/script/script_inscription.js"></script>
	<script src="vue/script/script_profil.js"></script>
	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>
