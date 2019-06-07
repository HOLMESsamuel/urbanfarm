<?php

include("../modele/connexion.php");
include("../modele/requeteMessage.php");

$mail = $com = "";

if (!empty($_POST["mail"])) {
    $mail = test_input($_POST["mail"]);
}
if (!empty($_POST["com"])) {
    $com = test_input($_POST["com"]);
}

$date = date('Y/m/d', time());

if (empty($_POST["com"])){
    echo '<script language="javascript">';
    echo 'alert("Merci de rentrer du texte")';
    echo '</script>';
} else {
    nvMsg($bdd, $mail, $com, $date);
} 


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
