<?php

include("../modele/connexion.php");
include("../modele/requeteAdminMessage.php");

$id_conv = $com = "";

if (!empty($_POST["id"])) {
    $id_conv = test_input($_POST["id"]);
}
if (!empty($_POST["com"])) {
    $com = test_input($_POST["com"]);
}

$date = date('Y/m/d', time());

if (empty($_POST["com"])){
    echo '<script language="javascript">';
    echo 'alert("Merci de rentrer du texte")';
    echo '</script>';
} else if ($com="read") {
    readMsg($bdd, $id_conv);
} else {
    addMsg($bdd, $id_conv, $com, $date);
} 


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
