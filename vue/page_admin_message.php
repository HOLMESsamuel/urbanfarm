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
                            id : this.id,
                            com: $("#com"+this.id).val()
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
                    $req=$bdd->prepare("SELECT DISTINCT id_conv FROM messages ORDER BY id DESC");
                    $req->execute(array());  
                while ($nb=$req->fetch()): 
                    $req2=$bdd->prepare("SELECT * FROM conversation WHERE id=?");
                    $req2->execute(array($nb['id_conv'])); 
                    $row= $req2->fetch();
                    ?>
                    <button class="accordion"><p><?php recupereNom($bdd, $row["mail_utilisateur"])?></p></button>
                    <div class="panel">
                        <p><?php recupereMsg($bdd, $row["id"], $row["mail_utilisateur"])?></p>
                        <form>
                            <input type="text" name="com" id="com<?php echo $row['id'];?>"> 
                            <button id="<?php echo $row['id'];?>" class="button">Envoyer ce message</button>
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