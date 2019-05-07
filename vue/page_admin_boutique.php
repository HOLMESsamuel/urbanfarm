<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_boutique.css"/>
		<style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #777777;
            }
        </style>
				<script>
					function myFunction() {
							$requete=$bdd->prepare("INSERT INTO produit(type, description, prix) VALUES (?, ?, ?)");
									$requete->execute(array($nom, $description, $prix));
							}
				</script>
	</head>
	<header>
		<?php include("elem/elem_entete.php"); ?>
    <?php include("../controleur/ct_boutique.php"); ?>
	</header>	
	
	<body>
		
		<?php
					// define variables and set to empty values
					$nom = $ref = $desc = $prix = "";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
							if (!empty($_POST["nom"])) {
									$nom = test_input($_POST["nom"]);
							}
							if (!empty($_POST["ref"])) {
									$ref = test_input($_POST["ref"]);
							}
							if (!empty($_POST["desc"])) {
									$desc = test_input($_POST["desc"]);
							}
							if (!empty($_POST["prix"])) {
									$prix = test_input($_POST["prix"]);
							}
					}

					function test_input($data) {
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
					}
			?>

		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
			
					<?php
					include ("../modele/connexion.php");
					include ("../modele/requeteAdminBoutique.php");
					$req=$bdd->prepare("SELECT * FROM produit ");
					$req->execute(array());
					?>
					<table class="striped">
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
									echo "<td>".$row[3]."</td>";
									echo "</tr>";
							}

						?>
					</table>

					<form action="/action_page.php">
						Nom: <input type="text" name="nom" id="nom"> <br>
						Description: <input type="text" name="desc" id="desc"><br>
						Prix: <input type="text" name="prix" id="prix">
					</form> 
					<button onclick="myFunction()">Ajouter produit</button>

		</div>
	</body>

	<footer>
		<?php include("elem/elem_admin_pied.php"); ?>
	</footer>
</html>