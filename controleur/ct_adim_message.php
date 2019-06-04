<?php

include("../modele/connexion.php");
include("../modele/requeteAdminMessage.php");

$mail = $com = "";

if (!empty($_POST["mail"])) {
    $mail = test_input($_POST["mail"]);
}
if (!empty($_POST["com"])) {
        $com = test_input($_POST["com"]);
}

var_dump($mail, $com);

if (empty($_POST["com"])){
    echo '<script language="javascript">';
    echo 'alert("Merci de rentrer du texte")';
    echo '</script>';
} elseif (!empty($_POST["id_annonce"])) {
    addMsg($bdd, $id_annonce, $com, $mail);
} 


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
