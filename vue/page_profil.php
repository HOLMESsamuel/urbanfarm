<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_profil.css"/>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
		<?php include("../modele/connexion.php"); ?>
		<?php include("../modele/requeteUtilisateur.php"); ?>
	</header>	
	
	<body>
		<div class="container">
			<div id="col1">
				<?php include("./elem/elem_menu.php"); ?>
			</div>
			<div id="col2">
				<div id="messageBienvenue">
					<span>Bienvenue </span>
					<?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?>
				</div>
				<div id="infoPerso">
					<h3>Vos informations personnelles</h3>
					<p>Mail : <?php echo $_SESSION['mail']; ?></p>
					<p>Prenom : <?php echo recupereInfo($bdd, $_SESSION['mail'], "prenom"); ?></p>
					<p>Nom : <?php echo recupereInfo($bdd, $_SESSION['mail'], "nom"); ?></p>
					<p>Adresse : <?php echo recupereInfo($bdd, $_SESSION['mail'], "adresse"); ?></p>
				</div>
					<input class="btnModif" type="button" onclick="modifProfil();" value="Modifier mes informations">
					<div class="modal" id="modalProfil">
						<div class="interieurModal">
							<span class="close" onclick="closeModalProfil();">&times;</span>
							<h3>Modifier vos informations personnelles</h3>
							<div id=conteneurProfil>
								<!-- contient le formulaire ajouté par js-->
							</div>
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
						</div>
					</div>
				<br>
			</div>
				<div id="col3">
					<div id="installations">
						<?php
							if(nbInstallations($bdd, $_SESSION['mail']) == 0){
								echo "<h3>Vous n'avez pas encore d'installation</h3>";
							} elseif (nbInstallations($bdd, $_SESSION['mail']) == 1) {
								echo "<h3>Votre installation</h3>";
							} else {
								echo "<h3>Vos installations</h3>";
							}
						?>
					</div>
					<br>
					<form>
					<div class="modal" id="modal">
						<div class="interieurModal">
							<h3>Ajout d'une installation</h3>
							<div id=conteneur>
								<!-- contient le formulaire ajouté par js-->
							</div>
						</div>
			</div>
						<input type="button" value="ajouter une installation" onclick="ajouterChamps('profil');">
					</form>
				</div>
		</div>
		
	</body>
	<script src="script/script_inscription.js"></script>
	<script src="script/script_profil.js"></script>
	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>
