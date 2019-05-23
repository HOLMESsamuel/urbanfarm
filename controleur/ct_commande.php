<?php 
include("../modele/connexion.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");
include("ct_trame.php");
$numero = $_POST['numero'];
$etat = $_POST['etat'];
$mail = $_POST['mail'];
$type = $_POST['type'];

if($type == "actionneur"){
    $id = recupereInfoActionneur($bdd, $mail, "n°actionneur", $numero);
    changeStateActionneur($bdd, $etat, $id);
    $nouvelEtat = recupereInfoActionneur($bdd, $mail, "etat", $numero);
    if($nouvelEtat == "off"){
        envoieTrame("1G10E1a".$id."0000");
    } else {
        envoieTrame("1G10E1a".$id."1111");
    }
}else{
    $id = recupereInfoCapteur($bdd, $mail, "n°capteur", $numero);
    changeStateCapteur($bdd, $etat, $id);
    $typeCapteur = recupereInfoCapteur($bdd, $mail, "type", $numero);
    $nouvelEtat = recupereInfoCapteur($bdd, $mail, "etat", $numero);
    if($nouvelEtat == "off"){
        if($typeCapteur == "temperature"){
            envoieTrame("1G10E13".$id."0000");
        }
        if($typeCapteur == "mouvement"){
            envoieTrame("1G10E11".$id."0000");
        }
        if($typeCapteur == "lumiere"){
            envoieTrame("1G10E15".$id."0000");
        }
    } else {
        if($typeCapteur == "temperature"){
            envoieTrame("1G10E13".$id."1111");
        }
        if($typeCapteur == "mouvement"){
            envoieTrame("1G10E11".$id."1111");
        }
        if($typeCapteur == "lumiere"){
            envoieTrame("1G10E15".$id."1111");
        }
    }
}


try {
    echo $id;
} catch(Exception $e){
    echo $e;
}
?>