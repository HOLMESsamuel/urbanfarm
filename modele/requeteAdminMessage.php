<?php
function recupereNom(PDO $bdd, String $mail){
    echo "<br>";
    echo "Utilisateur ".recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail, 'prenom');
}

function recupereMsg(PDO $bdd, String $id) {
    $requete = $bdd->prepare("SELECT * FROM messages WHERE id_conv=? ORDER BY date DESC");
    $requete->execute(array($id));

    while ($row=$requete->fetch()){
        if ($row["admin"]=="oui"){
            echo "Adnimistrateur : ";
        } else {
            echo "Reponse de : ".recupereInfo($bdd, $mail, 'nom')." ".recupereInfo($bdd, $mail, 'prenom');
        }
        echo '<br>';
        echo $row['texte'];
        echo '<br><br>';
    }
}

function addMsg (PDO $bdd, String $mail, String $texte, String $date){
    $req = $bdd->prepare("INSERT INTO `messages` (`texte`, `admin`, `email_utilisateur`, `lu`, `date`) 
    VALUES (?, 'oui', ?, 'oui', ?);");
        $req->execute(array($texte, $mail, $date));
}



