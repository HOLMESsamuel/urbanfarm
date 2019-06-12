<?php
include("../modele/connexion.php");
include("../modele/requeteConf.php");
include("../modele/requeteUtilisateur.php");

if (!empty($_POST["input_mail"])) {
    $input_mail = test_input($_POST["input_mail"]);
}
if (!empty($_POST["code"])) {
    $code = test_input($_POST["code"]);
}

if(!empty($_POST['input_mail']) AND !empty($_POST['code'])){
	valMail ($bdd, $input_mail, $code);
} else {
	echo "Tous les champs doivent être remplis";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
