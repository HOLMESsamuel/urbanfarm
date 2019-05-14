<?php

include("../modele/connexion.php");
include("../modele/requeteAdminForum.php");

$reponse = $ques = $ref = "";

if (!empty($_POST["reponse"])) {
    $reponse = test_input($_POST["reponse"]);
}
if (!empty($_POST["ques"])) { 
    $ques = test_input($_POST["ques"]);
}
if (!empty($_POST["ref"])) {
        $ref = test_input($_POST["ref"]);
}

if(!empty($_POST["reponse"]) AND !empty($_POST["ques"])){
    addVal($bdd, $ques, $reponse);
} elseif (!empty($_POST["ref"])){
    if(is_numeric($ref)){
        suppVal($bdd, $ref);
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