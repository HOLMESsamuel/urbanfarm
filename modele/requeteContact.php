<?php
function envoiMessage(PDO $bdd, String $mail, String $titre, String $texte){
    $req = $bdd->prepare('INSERT INTO message(mail, titre, texte) VALUES (?,?,?)');
    $req->execute(array($mail,$titre,$texte));
}
?>