<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "style/style.css"/>
		<link rel = "stylesheet" href = "style/style_actualite.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<header>
		<?php include("../controleur/ct_actualite.php"); ?>
		<?php include("elem/elem_entete.php"); ?>
	</header>	
	
	<body>
		<div class="container">
	    <div id="col1">
			  <?php include("elem/elem_menu.php"); ?>
				
				<?php

					// php search data in mysql database using PDO
					// set data in input text

					$world = "";

					if(isset($_POST['Find']))
					{
									// connect to mysql
							try {
									$pdoConnect = new PDO("mysql:host=localhost;dbname=test_db","root","");
							} catch (PDOException $exc) {
									echo $exc->getMessage();
									exit();
							}
							
							// id to search
							$id = $_POST['id'];
							
							// mysql search query
							$pdoQuery = "SELECT * FROM users WHERE id = :id";
							
							$pdoResult = $pdoConnect->prepare($pdoQuery);
							
							//set your id to the query id
							$pdoExec = $pdoResult->execute(array(":id"=>$id));
							
							if($pdoExec)
							{
											// if id exist 
											// show data in inputs
									if($pdoResult->rowCount()>0)
									{
											foreach($pdoResult as $row)
											{
													$word = $row['word'];
											}
									}
											// if the id not exist
											// show a message and clear inputs
									else{
											echo 'No Data With This word';
									}
							}else{
									echo 'ERROR Data Not Inserted';
							}
					}
					?>

					<form action="php_search_in_mysql_database_using_pdo.php" method="post">
						Word To Search : <input type="text" name="word" value="<?php echo $word;?>"><br><br>
						<input type="submit" name="Find" value="Find Data">
					</form>

			</div>

			<div id="col2">
				<h2> 
					<?php afficheDernierTitre($bdd); ?>
				</h2>
				<div class="article">
					<?php afficheDernierArticle($bdd); ?>
				</div>
	    </div>
		
			<div id="col3">
				<h3> Les dernières Actualités </h3>
				<div id="article">
					<?php recupereTitre($bdd);	?>
				</div>
			</div>

		  
	  </div>
		<script>
			nouvelleActu(){
				console.log("ok");
			}
		</script>
	</body>

	<footer>
		<?php include("elem/elem_pied.php"); ?>
	</footer>
</html>