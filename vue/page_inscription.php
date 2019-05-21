<!DOCTYPE HTML>

<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title> 
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_inscription.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$("#btnValider").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_inscription.php', //envoie par post
					{
						prenom : $("#prenom").val(), //recupere les valueurs par id
						nom : $("#nom").val(),
						adresse : $("#adresse").val(),
						mail : $("#mail").val(),
						confmail : $("#confmail").val(),
						mdp : $("#mdp").val(),
						confmdp : $("#confmdp").val(),
						cgu : $("#cgu").is(":checked"),
						civilite : $("#civilité1").is(":checked"),
						titre1 : $("#titre1").val(),
						adresse1 : $("#adresse1").val(),
						type1 : $("#liste1").val(),
						temperature1 : $("#temperature1").is(":checked"),
						lumiere1 : $("#lumiere1").is(":checked"),
						mouvement1 : $("#mouvement1").is(":checked"),
						moteur1 : $("#moteur1").is(":checked"),
						lampe1 : $("#lampe1").is(":checked"),
						ventilateur1 : $("#ventilateur1").is(":checked")
					},
					function(data){ //recupere ce qui envoye par le code php
						if(data != 'ok'){
							$("#erreurForm").html(data);
						//} else if (substr($mail, -9) == '@urban.fr') {
						//	document.location.href="page_admin_stat.php";
						} else {
							document.location.href="index.php";
						}
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
		});
		</script>
	</head>
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
	</header>	
	
	
	<body>
		<h1>Inscription</h1>
		<form>
			<div class="container">
			<div id="modalInfo">
				<div class="interieurModal">
					<span class="close" onclick="closeModalInfo();">&times;</span>
					<p>Les infos</p>
				</div>

			</div>
			<div id="modalCgu">
				<div class="interieurModal">
					<span class="close" onclick="closeModalCgu();">&times;</span>
					<p>Le modal</p>
				</div>
			</div>
			<div id="col1">
					<h2>Vos informations personnelles</h2>
						
						<input type="text" placeholder="prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) {echo $prenom;}?>"/>	
						<input type="text" placeholder="nom" id="nom" name="nom" value="<?php if(isset($nom)) {echo $nom;}?>"/>
						<input type="text" placeholder="Adresse" id="adresse" name="adresse" value="<?php if(isset($adresse)) {echo $adresse;}?>"/>
						<br>
						<div id=civilite>
							<p id="p1">
								<input type="radio" id="civilité1" name="civilité" value="M" checked/>
								<label for="civilité1">M</label>
							</p>
							<p id="p2">
								<input type="radio" id="civilité2" name="civilité" value="Mme"/>
								<label for="civilité2">Mme</label>
							</p>
						</div>
						<br>
						<input type="mail" placeholder="mail" id="mail" name="mail" value="<?php if(isset($mail)) {echo $mail;}?>"/>
						<input type="mail" placeholder="confirmer le mail" id="confmail" name="confmail" value="<?php if(isset($confmail)) {echo $confmail;}?>"/>
						<input type="password" placeholder="mot de passe" id="mdp" name="mdp" oninput="testMdp();"/>
						<div class="erreur" id="erreurMdp">
						</div>
						<input type="password" placeholder="confirmer le mot de passe" id="confmdp" name="confmdp" oninput="testConfMdp();"/>
						<div class="erreur" id="erreurConfMdp">
						</div>
						<br>
						<div id="checkboxCgu">
							<p>
								<input type="checkbox" id="cgu" name="cgu">
								<label for="cgu">J'accepte les </label><span id="conditions" onclick="openModalCgu();"> conditions generales d'utilisation</span>
							</p>
						</div>
						<input type="submit" id="btnValider" name="inscription" value="Confirmer"/>
						<p class="erreur" id=erreurForm>
						 
						</p>
				
				</div>
				<div id="col2">
					<h2>Votre installation  <span id="lienInfo" onclick="openModalInfo();">  ?  </span></h2>
					
						<div id=conteneur>
							
						</div>
						<input type="button" value="ajouter une installation" onclick="ajouterChamps();">
					
		

				</div>
		    
			</div>
		</form>
	</body>
	<script src="vue/script/script_inscription.js"></script>
	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>