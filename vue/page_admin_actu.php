<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_actualite.css"/>
		<link rel = "stylesheet" href = "vue/style/style_admin_actu.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
            $(document).ready(function(){ //attend que tout le reste soit chargé
                $("#btnPub").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_actu.php', //envoie par post au fichier controleur
                        {
                            titre: $("#titre").val(),
                            cont: $("#cont").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#btnSupp").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_actu.php', //envoie par post au fichier controleur
                        {
                            ref: $("#ref").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#btnMod").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_actu.php', //envoie par post au fichier controleur
                        {
                            titreM: $("#titreM").val(),
                            contM: $("#contM").val(),
                            refM: $("#refM").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#btnCher").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_actu.php', //envoie par post au fichier controleur
                        {
                            refM: $("#refM").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							$("#titreM").html("azertyuio");
							$("#contM").html(data.split("&&")[1]);
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
		</script> 

	</head>
	<header>
		<?php include("controleur/ct_actualite.php"); ?>
		<?php include("vue/elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2"> 
			<?php
				include ("modele/connexion.php");
				$req=$bdd->prepare("SELECT * FROM article ");
				$req->execute(array());
				?>
				<table >
					<tr class="header">
						<td>N° </td>
						<td>Titre </td>
						<td>Contenu </td>
						<td>Date </td>
					</tr>
					<?php
						while ($row=$req->fetch()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".substr($row[2],0,100)."...</td>";
								echo "<td>".$row[3]."</td>";
								echo "</tr>";
						}
					?>
				</table>

				<div id="inputZone">
					<div id="addAndSupp">
						<form>
							Titre : <br><input type="text" name="titre" id="titre"> <br>
							Contenu : <br><textarea rows="6" cols="50" name="cont" id="cont" ></textarea><br>
						</form> 
						<button class="btn" id="btnImg">Image</button>
						<button class="btn" id="btnPub">Publier</button>
						<form >
							Ref : <input type="text" name="ref" id="ref">
						</form> 
						<button class="btn" id="btnSupp">Supprimer article</button>
					</div>
					<div id="modif">
						<form >
							Ref : <input type="text" name="refM" id="refM">
						</form> 
						<button class="btn" id="btnCher">Chercher article</button>
						<form>
							Titre : <br><input type="text" name="titreM" id="titreM"> <br>
							Contenu : <br><textarea rows="6" cols="50" name="contM" id="contM" ></textarea><br>
						</form> 
						<button class="btn" id="btnImg">Image</button>
						<button class="btn" id="btnMod">Modifier</button>

					</div>
					<div id="rep"></div>
				</div>	
			</div>
		</div>
	</body>

	<footer>
		<?php include("vue/elem/elem_admin_pied.php"); ?>
	</footer>
</html>