<?php 
include ("../modele/connexion.php");
include ("../modele/requeteUtilisateur.php");
$commande = $_POST["commande"];
$mail = $_POST["mail"];
try{
    if($commande == "confirmation"){
        confirmation($bdd, $mail);
    } else {
        supression($bdd, $mail);
    }
    
    echo "ok";
} catch(Exception $e){
    echo $e;
}

?>