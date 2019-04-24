<?php 
include("../modele/connexion.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");
$numero = $_POST['numero'];
$etat = $_POST['etat'];
$mail = $_POST['mail'];
$type = $_POST['type'];

if($type == "actionneur"){
    $id = recupereInfoActionneur($bdd, $mail, "n°actionneur", $numero);
    changeStateActionneur($bdd, $etat, $id);
}else{
    $id = recupereInfoCapteur($bdd, $mail, "n°capteur", $numero);
    changeStateCapteur($bdd, $etat, $id);
}


try {
    echo $id;
} catch(Exception $e){
    echo $e;
}
?>