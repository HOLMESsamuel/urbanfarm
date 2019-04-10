<?php

include("../modele/connexion.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");


try {
    $mail = htmlspecialchars($_POST['mail']);
    $titre = htmlspecialchars($_POST['titre']);
    $type = htmlspecialchars($_POST['type']);
    $adresse = htmlspecialchars($_POST['adresse']);
    ajoutInstallation($bdd, $titre, $type, $adresse, $mail);
    $derniereInstallation = derniereInstallation($bdd);
    if($_POST['temperature'] == "true"){
        ajoutCapteur($bdd, 'temperature', 'on', $derniereInstallation);
    }
    if($_POST['lumiere'] == "true"){
        ajoutCapteur($bdd, 'lumiere', 'on', $derniereInstallation);
    }
    if($_POST['mouvement'] == "true"){
        ajoutCapteur($bdd, 'mouvement', 'on', $derniereInstallation);
    }
    if($_POST['moteur'] == "true"){
        ajoutActionneur($bdd, 'moteur', 'off', $derniereInstallation);
    }
    if($_POST['lampe'] == "true"){
        ajoutActionneur($bdd, 'lampe', 'off', $derniereInstallation);
    }
    if($_POST['ventilateur'] == "true"){
        ajoutActionneur($bdd, 'ventilateur', 'off', $derniereInstallation);
    }
    echo "ok";
} catch (Exception $e) {
    echo $e;
}
    



?>

