<?php 
session_start();
if(isset($_SESSION['mail'])){
    $mail = htmlspecialchars($_POST['mail']);
    $titre = htmlspecialchars($_POST['titre']); 
    $texte = htmlspecialchars($_POST['texte']); 
} else {
    echo "Il faut être connecté pour envoyer un message";
}
?>