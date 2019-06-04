<!DOCTYPE HTML>
<html>
    <head> <meta charset = utf-8>
        <title> Urban Farm</title>
        <link rel = "stylesheet" href = "vue/style/style.css"/>
        <link rel = "stylesheet" href = "vue/style/style_message.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){ //attend que tout le reste soit chargé
                $(".button").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_admin_message.php', //envoie par post au fichier controleur
                        {
                            mail : this.id,
                            com: $("#comelise.gabilly@gmail.com").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=admin_message";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
        </script>
       
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
                    $req=$bdd->prepare("SELECT * FROM conversation");
                    $req->execute(array());  
                while ($row=$req->fetch()): ?>
                    <button class="accordion"><p><?php recupereNom($bdd, $row["mail_utilisateur"])?></p></button>
                    <div class="panel">
                        <p><?php recupereMsg($bdd, $row["id"])?></p>
                        <form>
                            <input type="text" name="com" id="com<?php echo $row['mail_utilisateur'];?>"> 
                            <button id="<?php echo "comelise.gabilly@gmail.com";?>" class="button">Envoyer ce message</button>
                        </form> 
                    </div>
                <?php endwhile ?>

                <div id="rep"></div>
                
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