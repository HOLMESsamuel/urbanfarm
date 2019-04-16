<?php
function envoiMessage(PDO $bdd, String $mail, String $titre, String $texte, Date $date){
    $req = $bdd->prepare('INSERT INTO message(mail, titre, texte, date) VALUES (?,?,?,?)');
    $req->execute(array($mail,$titre,$texte,$date));
}
?>