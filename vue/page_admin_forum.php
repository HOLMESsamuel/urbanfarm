<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_admin_forum.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){ //attend que tout le reste soit chargé
                $("#button").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('../controleur/ct_admin_forum.php', //envoie par post au fichier controleur
                        {
                            ques: $("#ques").val(),
                            reponse: $("#reponse").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="page_admin_forum.php";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#buttonSupp").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('../controleur/ct_admin_forum.php', //envoie par post au fichier controleur
                        {
                            ref: $("#ref").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="page_admin_forum.php";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
        </script>
	</head>
	<header>
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
				$req=$bdd->prepare("SELECT * FROM questions ");
				$req->execute(array());
				?>
				<table >
					<tr class="header">
						<td>Ref. </td>
						<td>Question </td>
						<td>Réponse </td>
					</tr>
					<?php
						while ($row=$req->fetch()) {
								echo "<tr>";
								echo "<td>".$row[0]."</td>";
								echo "<td>".$row[1]."</td>";
								echo "<td>".$row[2]."</td>";
								echo "</tr>";
						}
					?>
				</table>

				<div id="inputZone">
					<div id="add">
						<form>
							Question: <br><textarea rows="2" cols="50" name="ques" id="ques" ></textarea><br>
							Reponse: <br><textarea rows="4" cols="50" name="reponse" id="reponse" ></textarea><br>
						</form> 
						<button id="button">Ajouter question</button>
					</div>
					<div id="supp">
						<form >
							Ref: <input type="text" name="ref" id="ref">
						</form> 
						<button id="buttonSupp">Supprimer question</button>
					</div>
					<div id="rep"></div>
				</div>
			</div>
			
	    	</div>
		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>