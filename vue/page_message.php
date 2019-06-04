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
		
    <body>
        <div class="container">
         <div id="col1">
                 <?php include("vue/elem/elem_menu.php"); ?>
        </div>
         <div id="col2">
                        <br>
                        
                        <div id="questionlist">
                            <?php
                            include ("modele/connexion.php");
                            $req=$bdd->prepare("SELECT * FROM questions ");
                            $req->execute(array());   
                        while ($row=$req->fetch()): ?>
                            <button class="accordion"><p><?php shownom($bdd, $row['n_question'])?></p></button>
                            <div class="panel">
                                <p><?php showcontenu($bdd, $row['n_question'])?></p>

                            </div>
                        <?php endwhile ?>
                        <div id="rep"></div>
                        </div>

            </div>
        </div>


    </body>

    <footer>
        <?php include("vue/elem/elem_pied.php"); ?>
    </footer>
</html>