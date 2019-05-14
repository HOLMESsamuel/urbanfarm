<?php

function addVal(PDO $bdd, String $ques, String $reponse) {
    $requete=$bdd->prepare("INSERT INTO questions(nom, contenu) VALUES (?, ?)");
    $requete->execute(array($ques, $reponse));
}

function suppVal(PDO $bdd, String $ref) {
    $requete=$bdd->prepare("DELETE FROM questions WHERE n_question=?");
    $requete->execute(array($ref));
}
    
?>