<?php

include("../modele/connexion.php");
include("../modele/requeteDiscussion.php");

$id_annonce = $com = "";

if (!empty($_POST["id_annonce"])) {
    $id_annonce = test_input($_POST["id_annonce"]);
}
if (!empty($_POST["com"])) {
        $com = test_input($_POST["com"]);
}
if (!empty($_POST["mail"])) {
        $mail = test_input($_POST["mail"]);
}


if (empty($_POST["com"])){
    echo '<script language="javascript">';
    echo 'alert("Merci de rentrer du texte")';
    echo '</script>';
} elseif (!empty($_POST["id_annonce"])) {
    postCom($bdd, $id_annonce, $com, $mail);
} else {
    postSuj($bdd, $com, $mail);
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
