<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_actualite.css"/>
		<link rel = "stylesheet" href = "style/style_admin_actu.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){ //attend que tout le reste soit chargé
				$("#btnSearch").click(function(e){
					e.preventDefault(); //empeche de recherarger la page
					$.post('../controleur/ct_actualiteSearch.php', //envoie par post au fichier controleur
						{
							id : $("#id").val()
						},
						function(data){ //recupere ce qui envoye par le code php
							$("#rep").html(data);
						},
						"text" //a mettre pour pouvoir recuperer du texte
					);
				});
			});
		</script> 

	</head>
	<header>
		<?php include("../controleur/ct_actualite.php"); ?>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2"> 
			<?php
				include ("../modele/connexion.php");
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
							Titre: <br><input type="text" name="nom" id="nom"> <br>
							Description: <br><textarea rows="6" cols="50" name="desc" id="desc" ></textarea><br>
						</form> 
						<button class="btn" id="buttonImg">Image</button>
						<button class="btn" id="buttonPub">Publier</button>
						<form >
							Ref: <input type="text" name="ref" id="ref">
						</form> 
						<button class="btn" id="buttonSupp">Supprimer article</button>
					</div>
					<div id="modif">
						<form >
							Ref: <input type="text" name="ref" id="ref">
						</form> 
						<button class="btn" id="buttonSupp">Chercher article</button>
						<form>
							Titre: <br><input type="text" name="nom" id="nom"> <br>
							Description: <br><textarea rows="6" cols="50" name="desc" id="desc" ></textarea><br>
						</form> 
						<button class="btn" id="buttonImgM">Image</button>
						<button class="btn" id="buttonPubM">Publier</button>

					</div>
					<div id="rep"></div>
				</div>	
			</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>