<?php 
include ("../modele/connexion.php");
include ("../modele/requeteUtilisateur.php");
$commande = $_POST["commande"];
$mail = $_POST["mail"];
try{
    if($commande == "confirmation"){
        $header = "MIME-Version: 1.0\r\n";
		$header.='From:"urbanfarm.fr"<sam@urban.fr>'."\n";
		$header.='Content-Type:text/html; charset="utf-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

			$message='
			<html>
			<body>
			<div align="center">
			Votre compte est prêt !
			<br>
			</div>
			</body>
			</html>
			';

            mail($mail, "confirmation", $message, $header);
            confirmation($bdd, $mail);
    } else {
        supression($bdd, $mail);
    }
    echo "ok";
} catch(Exception $e){
    echo $e;
}

?>