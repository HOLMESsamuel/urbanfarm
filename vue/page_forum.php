<!DOCTYPE HTML>
<html>
    <head> <meta charset = utf-8>
        <title> Urban Farm</title>
        <link rel = "stylesheet" href = "style/style.css"/>
        <link rel = "stylesheet" href = "style/style_forum.css"/>
    </head>
    <header>
        <?php include("elem/elem_entete.php"); ?>
    </header>
	<div>
	<?php
    $conn = mysql_connect("localhost","root","");
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET utf8");
    if(!$conn){
        die('La connexion a échoué'mysql_error());
    }
    mysql_select_db("testurbanfarm",$conn);
?>
	</div>

    <body>
        <div class="container">
         <div id="col1">
                 <?php include("elem/elem_menu.php"); ?>
        </div>
         <div id="col2">
                        <h2>Aide et Support</h2>
                        <br>
                        <form method=post action="">
                            <input type="text" name="keywords" size=40 maxlength=400
                             placeholder='Entrez question ici...'>
                        <input type="submit" name=gcrech value="Recherchez"/>
                        </form>
                        <br>

						<?php
						$keywords=$_POST['keywords'];
						$sql="SELECT * FROM questions WHERE contenu LIKE '%keywords%' ";
						$result= mysql_query($conn,$sql);
						if (!%result){
							die('La connexion a échoué'mysql_error());
						}
						?>
						
                        <div id="questionlist">
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>1.Question1?</h4>
                                        <p>Réponse1.</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>2.Question2?</h4>
                                        <p>Réponse2.</p>
                                    </div> 
                            </div> 
                            <br>

                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>3.Question3?</h4>
                                        <p>Réponse3.</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>4.Question4?</h4>
                                        <p>Réponse4.</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>5.Question5?</h4>
                                        <p>Réponse5.</p>
                                    </div> 
                            </div> 
                            <br>
                           
                            <div style="border-style:solid;border-width:1px">
                            <div class="content">
                                        <h4>6.Question6?</h4>
                                        <p>Réponse6.</p>
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