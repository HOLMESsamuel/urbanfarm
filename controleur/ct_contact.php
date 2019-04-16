<?php 
session_start();

include("../modele/requeteContact.php");

$prenom = htmlspecialchars($_POST['prenom']); 

if(isset($_SESSION['mail'])){
    $titre = htmlspecialchars($_POST['titre']); 
    $titre = htmlspecialchars($_POST['date']);
    $texte = htmlspecialchars($_POST['texte']); 
    $mail = htmlspecialchars($_POST['mail']);;
} 

if(!empty($_POST['mail']) AND !empty($_POST['titre']) AND !empty($_POST['texte'])){
    if(!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        echo "Adresse mail incorrecte";
    }
    else {
        try {
            envoiMessage($bdd, $mail, $titre, $texte);
        } catch (Exception $e) {
            echo $e;
        }
    }

} else {
echo "tous les champs doivent être remplis";
}
}
?>