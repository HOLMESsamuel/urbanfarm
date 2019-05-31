<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_discussion.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){ //attend que tout le reste soit chargé
                $(".button").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_discussion.php', //envoie par post au fichier controleur
                        {
                            id_annonce : this.id,
                            com: $("#com"+this.id).val(),
                            mail : $("#email").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=discussion";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
                $("#btnSujet").click(function(e){
                    e.preventDefault(); //empeche de recherarger la page
                    $.post('controleur/ct_discussion.php', //envoie par post au fichier controleur
                        {
                            com: $("#suj").val(),
                            mail : $("#email").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=discussion";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
        </script>
        
	</head>
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
		<?php include("modele/requeteDiscussion.php"); ?>
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
    <input style="display: none;" id="email"value="<?php if (isset($_SESSION['mail'])): echo $_SESSION['mail']; endif ?>">
    
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("vue/elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				
			    <?php 
                    include ("modele/connexion.php");
                    $req=$bdd->prepare("SELECT * FROM annonce ORDER BY id DESC ");
                    $req->execute(array());   
                while ($row=$req->fetch()): ?>
                    <button class="accordion"><p><?php recupereSujet($bdd, $row['id'])?></p></button>
                    <div class="panel">
                        <p><?php recupereCom($bdd, $row['id'])?></p>
                        <?php if (isset($_SESSION['mail'])): ?>
                            <form>
                                <input type="text" name="com" id="com<?php echo $row['id'];?>"> 
                                <button id="<?php echo $row['id'];?>" class="button">Poster ce commentaire</button>
                            </form> 
                        <?php endif ?>
                    </div>
                <?php endwhile ?>
                <!-- Rajouter un boutton seulment si la personne est connecté !-->
                <?php if (isset($_SESSION['mail'])): ?>
                    <form>
                        <input type="text" name="suj" id="suj"> 
                    </form> 
                    <button id="btnSujet">Poster ce sujet</button>
                <?php endif ?>
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
    <?php if (isset($_SESSION['mail'])):?>
        <?php if (substr($_SESSION['mail'], -9)== "@urban.fr"):?>
		    <?php include("vue/elem/elem_admin_pied.php"); ?>
        <?php else : ?>
            <?php include("vue/elem/elem_pied.php"); ?>
        <?php endif ?>
    <?php else : ?>
		<?php include("vue/elem/elem_pied.php"); ?>
    <?php endif ?>
	</footer>
</html>