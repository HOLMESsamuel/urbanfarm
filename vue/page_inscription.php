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
				<div class="InterieurInfo">
					<span class="close" onclick="closeModalInfo();">&times;</span>
					<p>Configurez vos informations</p>
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
					<div id="modalCgu">
						<div class="interieurModal" style="text-align: left;">
							<span class="close" onclick="closeModalCgu();">&times;</span>
					<p> 
						<h2 style="text-align: center;"><strong>Conditions Générales d'utilisation</strong></h2>
						<br>
						Le contrat de CGU encadre juridiquement les rapports et les conflits pouvant naître entre l'éditeur du site et le visiteur.Dans le cadre de la loi pour la confiance dans l'économie numérique en date du 21 juin 2004 les CGU  suivantes reproduisent les mentions légales de l'entreprise Urban farm. <br>
						<a href="https://www.legifrance.gouv.fr/affichTexte.do?cidTexte=JORFTEXT000000801164"> lien sur la loi du 21 juin 2004. <a>
						<br>
						<br>
						<h3><strong>Arcticle 1 :  Objet des conditions générales</strong></h3>
						<br>
						Les présentes "conditions générales d'utlisation" ont pour objet l'encadrement juridique des modalités mises à disposition par la pltaeforme de gestion de ferme conncetée <strong>Urban Farm</strong>et leur utilisation par<strong>l'utilisateur</strong>
						<br>
						Les conditions générales ci-après doivent être acceptées par tout utilisateur souhaitant accéder au site. Elles constituent le contrat entre Urban farm et l'utilisateur. L'accès au site par l'utilisateur signifie son acceptation des présetes conditions générales d'utilisation.
						<br>
						<br>

						<h3><strong>Arcticle 2 : Mentions légales</strong></h3>
						<br>
						L'édition du site <strong>Urban Farm</strong> est assurée par la société Domisep (SARL) au capital de 1 000 000 $ dont le siège social est situé 26 rue notre dame des champs Paris.
						<br>
						<br>

						<h3><strong>Arcticle 3: Définitions</strong></h3>
						<br>
						La présente clause a pour objet de définir les différents termes essentiels du contrat :
						<br>
						<br>
						<ul style="margin: auto 10%;">
							<li>Utilisateur : ce terme désigne toute personne qui utilise le site ou l'un des services proposés par le site (le visiteur et les services auxquels il a accés sont aussi compris) .</li>
							<li>Contenu utilisateur : ce sont les données transmises par l'utilisateur au sein du site.</li>
							<li>Membre : L'utilisateur devient membre lorsqu'il est identifié sur le site.</li> 
							<li>Identifiant et mot de passe : c'est l'ensemble des informations nécessaires à l'identification d'un Utilisateur sur le site. l'identifiant et le mot de passe permettent à l'utilisateur d'accéder à des services reservés aux membres du site. Le mot de passe est confidentiel et sécurisé par cryptage numérique par Urban Farm</li>
						</ul> 
						<br>
						<br>
						<h3><strong>Article 4 : Accés aux services</strong></h3>
						<br>
						Le site permet à l'utilisateur un accès gratuit aux services suivants:
						<br>
						<br>
						<ul style="margin: auto 10%;">
							<li>Articles d'information</li>
							<li>Boutique</li>
							<li>Contact</li>
							<li>Discussion</li>
							<li>Forum</li>
						</ul>
						<br>
						Le site est accessible gratuitement en tout lieu à tout utilisateur ayant un accès à internet. Tous les frais supportés par l'utilisateur pour accéder au service (matériel informatique,logiciels,connexion Internet..) sont à sa charge.
						Tout evenment dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n'engage pas la responsabilité d'Urban farm. L'accès aux services du site peut à tout moment faire l'objet d'une interruption, d'une suspension, d'une modification sans préavis pour une maintenance ou pour tout autre cas. l'utilisateur s'oblige à ne réclamer aucune indemnisation suite à l'interruption, à la suspension ou à la modification du présent contrat. L'utilisateur a la possibilité de contacter le site grâce à la rubrique contact du site.
						<br>
						<br>
						<h3><strong>Article 5 : Propriété intellectuelle</strong></h3>
						<br>
						La structure générale du site, ainsi que les textes, graphiques, images, sons et vidéos le composant, sont la propriété <strong>d'Urban Farm</strong> et de ses partenaires. Toute représentation et/ou reproduction et/ou exploitation partielle ou totale des contenus et services proposés par Urban Farm, par quelque procédé que ce soit, sans l'autorisation préalable et par écrit de la société Urban Farm et de ses partenaires est strictement interdite et serait susceptible de constituer une contrefaçon au sens <strong>des articles L 335-2</strong> et suivants du Code de la propriété intellectuelle.
						De plus tout contenu mis en ligne par l'utilisateur est de sa seule responsabilité.L'utilisateur s'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre <strong>Urban Farm</strong> sera pris en charge par l'utilisateur à l'origine du préjudice.
						En cas de non respect des conditions d'utilisation le contenu de l'utilisateur peut être à tout moment retiré de la platerforme Urban Farm.
						<br>
						<br>
						<h3><strong>Article 6 : Données personnelles</strong> </h3>
						<br>
						Les informations demandées à l'inscription au site sont nécessaires et obligatoires pour la création du compte de l'utilisateur.<strong>Urban Farm</strong> assure à l'utilisateur une collecte et un traitement d'informations personnelles dans le respect de la vie privée conformément à <strong>la loi n°78-17 du 6 janvier 1978</strong>relative à l'informatique, aux fichiers et aux libertés.
						De plus en vertu des <strong>articles 39 et 40</strong> de la loi en date du 6 janvier 1978, l'utilisateur dispose d'un droit d'accès, de rectification, de suppression de ses données personnelles.
						<br>
						L'utilisateur exerce ce droit via:
						<br>
						<br>
						<ul style="margin: auto 10%;">
							<li>Son epace profil </li>
							<li>un formulaire de contact dans la rubrique contact du site Urban Farm</li>
						</ul> 
						<br>
						<br>
						<h3><strong>Artcile 7 : Responsabilité et force majeure</strong></h3>
						<br>
						Les sources des informations diffusées sur le site sont réputées fiables. Toutefois, <strong>Urban Farm</strong> et DomISEP se réservent la faculté d'une non garantie de la fiabilité de ces sources.Ainsi l'utilisateur assume seul l'entière responsabilité de l'utilisation des informations et contenu provenant d'Urban Farm.<br>
						Une garantie optimale de la sécurité et de la confidentialité des données transmises n'est pas assurée par le site. Toutefois, le site s'engage à mettre en oeuvre tous les moyens nécessaires afin de garantir au mieux la sécurité et la confidentialité des données. 
						<br>
						<br>
						<h3><strong>Article 8 : liens hypertextes</strong></h3>
						<br>
						Quelques liens hypertextes sont présents sur le site, cependant les pages web ou mènent ces liens n'engagent en rien la responsabilité d'<strong>Urban Farm</strong>qui n'a pas le controle de ces liens.
						<br>
						<br>
						<h3><strong>Article 9 : Evolution du contrat</strong></h3>
						<br>
						Urban Farm se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.
						<br>
						<br>
						<h3><strong>Artcile 10 : Durée</strong></h3>
						<br>
						La durée du présent contrat est inderterminée. Le contrat prend effet dès que l'utilisateur utilise les services <strong>Urban Farm</strong>.
						<br>
						<br>
						<div style="margin-left: 60%;">La direction d'Urban farm</p>
						<p><em>Dernière mise à jour des CGU : 20/05/2019</em></p>
					</div>
					</p>
				</div>
			</div>
		

				</div>
		    
			</div>
		</form>
	</body>
	<script src="vue/script/script_inscription.js"></script>
	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>
