<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_admin_boutique.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){ //attend que tout le reste soit chargé
                $("#button").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_boutique.php', //envoie par post au fichier controleur
                        {
                            nom: $("#nom").val(),
                            desc: $("#desc").val(),
                            prix: $("#prix").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=admin_boutique";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#buttonSupp").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_boutique.php', //envoie par post au fichier controleur
                        {
                            ref: $("#ref").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=admin_boutique";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
        </script>
	</head>

	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
    <?php include("controleur/ct_boutique.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
			
				<?php
				include ("modele/connexion.php");
				$req=$bdd->prepare("SELECT * FROM produit ");
				$req->execute(array());
				?>
				<table >
					<tr class="header">
						<td>Ref. </td>
						<td>Nom </td>
						<td>Description </td>
						<td>Prix </td>
					</tr>
					<?php
						while ($row=$req->fetch()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "<td>".$row[3]."€</td>";
								echo "</tr>";
						}
					?>
				</table>

				<div id="inputZone">
					<div id="add">
						<form>
							Nom: <br><input type="text" name="nom" id="nom"> <br>
							Description: <br><textarea rows="4" cols="50" name="desc" id="desc" ></textarea><br>
							Prix: <br><input type="text" name="prix" id="prix">
						</form> 
						<button id="button">Ajouter produit</button>
					</div>
					<div id="supp">
						<form >
							Ref: <input type="text" name="ref" id="ref">
						</form> 
						<button id="buttonSupp">Supprimer produit</button>
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