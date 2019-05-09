<!DOCTYPE HTML>
<html>
    <head> <meta charset = utf-8>
        <title> Urban Farm</title>
        <link rel = "stylesheet" href = "style/style.css"/>
        <link rel = "stylesheet" href = "style/style_forum.css"/>
        
    </head>
    <header> 
        <?php include("elem/elem_entete.php"); ?>
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
                 <?php include("elem/elem_menu.php"); ?>
        </div>
         <div id="col2">
                        <h2>Aide et Support</h2>
                        <br>
                        <script src="../vue/script/script_recherche.js"></script>
                        <form method=post action="">
                            <input type="text" name="keywords" size=40 maxlength=400
                             placeholder='Entrez question ici...'
                             onkeyup="xmlhttp(this.value)"/>
                        <input type="submit" name=gcrech value="Recherchez" />
                        </form>
                        <br>
                        <p><span id="urbanfarm.sql"></span></p>

                        <div id="questionlist">
                            <div style="border-style:solid;border-width:1px">
								<div class="content">
								
									 <h4>Qu'est-ce que Urbanfarm?</h4>
									 <p>Nous sommes le fournisseur de services intelligent sur Internet pour Urbanfarm.</p>
								</div>
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>Que pouvez-vous faire sur notre site?</h4>
                                        <p>Vous pouvez surveiller en ligne les dernières opérations de Urbanfarm et obtenir la bonne analyse de données., obtenir les dernières nouvelles interactives et participer.</p>
                                    </div> 
                            </div> 
                            <br>

                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>Que puis-je obtenir en m'inscrivant sur le site?</h4>
                                        <p>Vous pouvez obtenir les dernières nouvelles de l'événement et obtenir des avantages spéciaux qui ne sont ouverts aux membres qu'en enregistrant votre abonnement, rejoignez-nous!</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>J'ai acheté le site Web environ, combien de temps puis-je le recevoir?</h4>
                                        <p>Nous expédions les marchandises dans les meilleurs délais pour vous garantir la meilleure expérience d'achat possible (délai de livraison général: 2 à 5 jours).</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>Puis-je participer à des interactions dans d'autres régions internationales?</h4>
                                        <p>Nous sommes toujours les bienvenus pour participer à notre interaction hors ligne, mais veuillez noter que nos achats en ligne sont ouverts uniquement à l'île-de-France.</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>Quel est le contenu de l'interaction hors ligne?</h4>
                                        <p>Il peut y avoir des expériences écologiques, des réunions de famille, des visites pour explorer l’écologie intelligente la plus moderne, et bien sûr, un dîner spécial avec un arrangement spécial.</p>
                                    </div> 
                            </div>         
                        </div>

                        <br>
                        <form method=get action="http://www.google.com/search" name=gcrech2 target="_blank">
                            <input type=text name=q size=40 maxlength=255
                            
                                 placeholder="N'avez pas trouvé la réponse?">
                            <input type=submit name=btnG value="Recherchez par Google"/>
                        </form>
            </div>
        </div>
    </body>

    <footer>
        <?php include("elem/elem_pied.php"); ?>
    </footer>
</html>