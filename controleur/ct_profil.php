<?php

include("../modele/connexion.php");
include("../modele/requeteInstallation.php");
include("../modele/requeteCapteur.php");
include("../modele/requeteUtilisateur.php");

$modif = $_POST['modif'];

if($modif == "installation"){
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
} elseif ($modif == "profil") {
    $mail = htmlspecialchars($_POST['mail']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    modifProfil($bdd, $mail, $prenom, $nom, $adresse);
    echo "ok";
} elseif ($modif == "supinstal"){
    $installation = $_POST['installation'];
    supprimerCapteur($bdd, $installation);
    supprimerActionneur($bdd, $installation);
    supprimerInstallation($bdd, $installation);
    echo "ok";
} elseif ($modif == "supProfil"){
    $mail = htmlspecialchars($_POST['mail']);
    demandeSuppression($bdd, $mail);
    echo "ok";
} else {
    $mail = htmlspecialchars($_POST['mail']);
    $nouveauMdp = sha1($_POST['nouveauMdp']);
    $confNouveauMdp = sha1($_POST['confNouveauMdp']);
    if($nouveauMdp == $confNouveauMdp){
        modifMdp($bdd, $mail, $nouveauMdp);
        echo "ok";
    } else {
        echo "Les mots de passe ne correspondent pas";
    }
}

    



?>

