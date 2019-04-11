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
    
    mysql_select_db("testurbanfarm",$conn);
?>
	</div>

<<<<<<< HEAD
	<body>
		<div class="container">
	    	<div id="col1">
			    	<?php include("elem/elem_menu.php"); ?>
    		</div>
		    <div id="col2">
				/
	

<body>
  <div id="questionlist">
	<div id="header">
		<h1>questions</h1>
	</div>
	<div class="content">
	
				<h3>1.Question1?</h3>
				<p>Réponse1.</p>

				<h3>2.Question2?</h3>
				<p>Réponse2.</p>
		
				<h3>3.Question3?</h3>
				<p>Réponse3.</p>

				<h3>4.Question4?</h3>
				<p>Réponse4.</p>

				<h3>5.Question5?</h3>
				<p>Réponse5.</p>

				<h3>6.Question6?</h3>
				<p>Réponse6.</p>
			</div>					
  </div>
</body>
</html>
/	
=======
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
>>>>>>> 9b2404bba090a3a34a3e4f90da00db834baca4bc

						<?php
						$keywords=$_POST['keywords'];
						$sql="SELECT * FROM questions WHERE contenu LIKE '%keywords%' ";
						$result= mysql_query($conn,$sql);
						
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