<?php
function recupereNom(PDO $bdd, String $mail){
    echo "<br>";
    echo "Utilisateur ".$mail; 
}

function recupereMsg(PDO $bdd, String $email_utilisateur) {
    $requete = $bdd->prepare("SELECT * FROM messages WHERE email_utilisateur=? ORDER BY date DESC");
    $requete->execute(array($email_utilisateur));

    while ($row=$requete->fetch()){
        if ($row["admin"]=="oui"){
            echo "Adnimistrateur : ";
        } else {
            echo "Reponse de : ".$row['prenom'];
        }
        echo '<br>';
        echo $row['texte'];
        echo '<br><br>';
    }
}



