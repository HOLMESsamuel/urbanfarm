
<!DOCTYPE HTML>
<html>
	<head> <meta charset = utf-8>
		<title> Urban Farm</title>
		<link rel = "stylesheet" href = "vue/style/style.css"/>
		<link rel = "stylesheet" href = "vue/style/style_admin_actu.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){ //attend que tout le reste soit chargé
			$(".btn").click(function(e){
				e.preventDefault(); //empeche de recherarger la page
				$.post('controleur/ct_conf.php', //envoie par post
					{
						input_mail : $("#input_mail").val(), //recupere les valueurs par id
						code : $("#code").val()
					},
					function(data){ //recupere ce qui envoye par le code php
						$("#rep").html(data);
						//document.location.href="index.php";
					},
					"text" //a mettre pour pouvoir recuperer du texte
				);
			});
		});
		</script>
    </head>
	
	<header>
		<?php include("vue/elem/elem_entete.php"); ?>
	</header>
	<?php include("vue/elem/elem_menu.php"); ?>
	<body>
        <div style="width : 60%; margin : auto;">
            <br><p>Validation de votre adresse mail</p><br>
            <form>
                Votre mail : <br><input type="text" name="input_mail" id="input_mail"> <br>
                Code reçu : <br><input type="text" name="code" id="code"><br>
            </form> 
            <div id="rep"><br></div>
            <button class="btn">Confimer</button><br><br>
        </div>
	</body>

	<footer>
		<?php include("vue/elem/elem_pied.php"); ?>
	</footer>
</html>
