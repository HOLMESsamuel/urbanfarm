<!DOCTYPE HTML>
<html>
    <head> <meta charset = utf-8>
        <title> Urban Farm</title>
        <link rel = "stylesheet" href = "vue/style/style.css"/>
        <link rel = "stylesheet" href = "vue/style/style_message.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       
    </head>
    <header>
        <?php include("vue/elem/elem_entete.php"); ?>
        <?php include("modele/requeteAdminMessage.php"); ?>
        <?php 
        if(isset($_SESSION['mail'])): ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 4fr;
                grid-template-columns: 1fr 4fr;
            }
            </style>
        <?php else: ?>
            <style>
            .container {
                min-height: 06%;
                margin: 15px;
                display: -ms-grid;
                display: grid;
                -ms-grid-columns: 1fr 150fr ;
                grid-template-columns: 1fr 150fr;
                }
            </style>
        <?php endif ?>
    </header>
		
    <body>
    <div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				
			    <?php 
                    include ("modele/connexion.php");
                    $req=$bdd->prepare("SELECT DISTINCT email_utilisateur
                        FROM messages WHERE admin = 'oui' ORDER BY date DESC ");
                    $req->execute(array());   
                while ($row=$req->fetch()): ?>
                    <button class="accordion"><p><?php recupereNom($bdd, $row["email_utilisateur"])?></p></button>
                    <div class="panel">
                        <p><?php recupereMsg($bdd, $row["email_utilisateur"])?></p>
                        <form>
                            <input type="text" name="com" id="com<?php echo $row['email_utilisateur'];?>"> 
                            <button id="<?php echo $row['email_utilisateur'];?>" class="button">Envoyer ce message</button>
                        </form> 
                    </div>
                <?php endwhile ?>
                
			</div>		
		</div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;
            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>


    </body>

    <footer>
        <?php include("vue/elem/elem_pied.php"); ?>
    </footer>
</html>