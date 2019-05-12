<?php

include("../modele/connexion.php");
include("../modele/requeteAdminActu.php");

if (!empty($_POST["titre"])) {
    $titre = test_input($_POST["titre"]);
}
if (!empty($_POST["cont"])) {
    $cont = test_input($_POST["cont"]);
}
if (!empty($_POST["ref"])) {
    $ref = test_input($_POST["ref"]);
}
if (!empty($_POST["titreM"])) {
    $titreM = test_input($_POST["titreM"]);
}
if (!empty($_POST["contM"])) {
    $contM = test_input($_POST["contM"]);
}
if (!empty($_POST["refM"])) {
    $refM = test_input($_POST["refM"]);
}

$date = date('Y/m/d', time());


if(!empty($_POST["titre"]) AND !empty($_POST["cont"]) ){
    addVal($bdd, $titre, $cont, $date);
} elseif (!empty($_POST["ref"])){
    if(is_numeric($ref)){
        suppVal($bdd, $ref);
    } else {
        echo '<script language="javascript">';
        echo 'alert("La reference doit etre numerique.")';
        echo '</script>';
    }
} elseif (!empty($_POST["refM"])){
    if(is_numeric($refM)){
        cherVal($bdd, $refM);
    } else {
        echo '<script language="javascript">';
        echo 'alert("La reference doit etre numerique.")';
        echo '</script>';
    }
} elseif(!empty($_POST["refM"]) AND !empty($_POST["titreM"]) AND !empty($_POST["contM"]) ){
    if(is_numeric($refM)){
        modVal($bdd, $refM, $titreM, $contM);
    } else {
        echo '<script language="javascript">';
        echo 'alert("La reference doit etre numerique.")';
        echo '</script>';
    }
} else {
    echo '<script language="javascript">';
    echo 'alert("Tout les champ doivent être remplis")';
    echo '</script>';
}

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

?>