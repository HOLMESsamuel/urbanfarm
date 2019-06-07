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
                    $.post('controleur/ct_message.php', //envoie par post au fichier controleur
                        {
						    mail : $("#email").val(),
                            com: $("#com").val()
                        },
                        function(data){ //recupere ce qui envoye par le code php
                            $("#rep").html(data);
							document.location.href="index.php?page=message";
                        },
                        "text" //a mettre pour pouvoir recuperer du texte
                    );
                });
            });
        </script>
       
    </head>
    <header>
        <?php include("vue/elem/elem_entete.php"); ?>
        <?php include("modele/requeteMessage.php"); ?>
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
                <?php include("vue/elem/elem_menu.php");
                include ("modele/connexion.php"); ?>
        </div>

        <div id="col2">
            <form>
                <input type="text" name="com" id="com"> 
                <button id="btn" class="button">Envoyer ce message</button>
            </form> 
            <?php  afficheMsg($bdd, $_SESSION["mail"]); ?>
                    
            <div id="rep"></div>

        </div>


    </body>

    <footer>
        <?php include("vue/elem/elem_pied.php"); ?>
    </footer>
</html>