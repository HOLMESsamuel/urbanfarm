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

var_dump($ref);

if(!empty($_POST["nom"]) AND !empty($_POST["desc"]) AND !empty($_POST["prix"])){
    addVal($bdd, $nom, $desc, $prix);
} elseif (!empty($_POST["ref"])){
    suppVal($bdd, $ref);
}

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

?>