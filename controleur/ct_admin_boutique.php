<?php

include("../modele/connexion.php");
include("../modele/requeteAdminBoutique.php");

$nom = $ref = $desc = $prix = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nom"])) {
                $nom = test_input($_POST["nom"]);
        }
        if (!empty($_POST["desc"])) {
                $desc = test_input($_POST["desc"]);
        }
        if (!empty($_POST["prix"])) {
                $prix = test_input($_POST["prix"]);
        }
}
if (!empty($_POST["ref"])) {
        $ref = test_input($_POST["ref"]);
}

if(!empty($_POST["nom"]) AND !empty($_POST["desc"]) AND !empty($_POST["prix"])){
    if(is_numeric($prix)){
        addVal($bdd, $nom, $desc, $prix);
    } else {
        echo '<script language="javascript">';
        echo 'alert("Le prix doit etre numerique.")';
        echo '</script>';
    }
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